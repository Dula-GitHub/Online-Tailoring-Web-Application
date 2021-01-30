<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Mail;
use File;

use App\Category;
use App\SubCategory;
use App\Measurement;
use App\Order;
use App\Material;
use App\Mail\PlaceOrder;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function view() {

        $categories = Category::all();
        return view('order.order', compact('categories'));

    }


    public function getSubCategories(Request $request) {

        if($request->input('id') == 0) {
           $sub_categories = null;
            

        }
        else {
            $sub_categories = SubCategory::where('category_id', $request->input('id'))->get();
        }
        return view('order.selectSubCategory', compact('sub_categories'));

    }


    public function placeOrder(Request $request) {

        $measurements_array = [];
        $materials_array = [];
        $category_id = $request->input('parent_category');
        $sub_category_id = $request->input('sub_category');
        
        if($category_id) {
            $category_name = Category::find($category_id);
        }
        else {
            $category_name = null;
        }
        if($sub_category_id) {
            $sub_category_name = SubCategory::find($sub_category_id);
            $measurements = Measurement::with('sub_categories')->get();
            $materials = Material::with('sub_categories')->where('inventory_level', 1)->where('stock', '>=', $sub_category_name->amount_of_cloth)->get();
            
            foreach($measurements as $measure) {
                if($measure->sub_categories) {
                    foreach($measure->sub_categories as $sub_categorymeasure) {
                        if($sub_categorymeasure->pivot->sub_category_id == $sub_category_id) {
                            $measurement = Measurement::where('id', $sub_categorymeasure->pivot->measurement_id)->first();
                            array_push($measurements_array, $measurement);
                        }
                    }
                }
            }

            foreach($materials as $material) {
                if($material->sub_categories) {
                    foreach($material->sub_categories as $sub_categorymaterial) {
                        if($sub_categorymaterial->pivot->sub_category_id == $sub_category_id) {
                            $material_data = Material::where('id', $sub_categorymaterial->pivot->material_id)->first();
                            array_push($materials_array, $material_data);
                        }
                    }
                }
            }

            return view('order.placeOrder', compact('category_name', 'sub_category_name', 'measurements_array', 'materials_array'));
        }
        else {
            $validator = Validator::make($request->all(), 
                [
                    'requested_date' => 'required',
                ],
                [
                    'requested_date.required'=> 'Please Enter the Requested Date',
                ]
            );

            if ($validator->fails()) {
                $msg = $validator->messages()->first();
                return back()->withStatus(__($msg))->withInput();
            }

            $sub_category_name = null;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $image_name = time() . '.'. $image->getClientOriginalExtension();
                $save_path = public_path() . '/images/custom_orders/';
                $public_path = '/images/custom_orders/'. $image_name;
                File::makeDirectory($save_path, $mode = 0755, true, true);
                $image->move($save_path, $image_name);
            }
            else{
                $msg = 'Please Upload Your Design';
                return back()->withStatus(__($msg))->withInput();
            }

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'design_image' => $image_name,
                'requested_date' => $request->input('requested_date')
            ]);
            $order->save();

            $msg = 'Order placed Successfully ! Your Refernce Number is '. $order->id;

            return redirect('place-order')->withStatus(__($msg));
            
        }
        
        
    }


    public function getDetailsToCalculateCost(Request $request) {
        $material_id = $request->input('material_id');
        $sub_category_id = $request->input('sub_category_id');
        $days = $request->input('days');

        $get_material = Material::where('id', $material_id)->first();
        $get_sub_category = SubCategory::where('id', $sub_category_id)->first();

        $length_for_cost = 1;
        $margin_measurement_val = $request->input('margin_val');

        if($margin_measurement_val) {
            if($margin_measurement_val < $get_sub_category->length_for_cost) {
                $length_for_cost = 0.5;
            }
        }

        if($get_material && $get_sub_category) {
            $material_cost = $get_material->unit_price;
            $amount_of_materials = ($get_sub_category->amount_of_cloth) * $length_for_cost;
            if($days < 1) {
                $tailor_cost = ($get_sub_category->tailor_cost) * 2;
            }
            else if($days < 2) {
                $tailor_cost = ($get_sub_category->tailor_cost) * 1.5;
            }
            else{
                $tailor_cost = $get_sub_category->tailor_cost;
            }
            $cost = number_format((float)(($material_cost * $amount_of_materials) + $tailor_cost), 2, '.', '');

            return response()->json(['cost' => $cost, 'amount_of_cloth' => $amount_of_materials]);   
        }

        return response()->json(['msg'=>'Something went wrong. Please try again.']);   
    }


    public function getMaterialImage(Request $request) {
        $material_id = $request->input('material_id');
        $image_url = Material::where('id', $material_id)->first()->image_url;
        return response()->json(['image_url' => $image_url]);
    }


    public function placeMyOrder(Request $request) {

        $validator = Validator::make($request->all(), 
            [
                'material_id' => 'required',
                'requested_date' => 'after:today'
            ],
            [
                'material_id.required'=> 'Please Select the Material',
                'requested_date.after' => 'Requested Date must be after today'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        Order::create($request->all());

        $order_id = Order::latest('created_at')->first()->id;

        $sendEmail = Mail::to(Auth::user()->email)->send(new PlaceOrder($order_id, $request->all(), Category::where('id', $request->input('category_id'))->first()->name, SubCategory::where('id', $request->input('sub_category_id'))->first()->name, Material::where('id', $request->input('material_id'))->first()->name));

        $msg = 'Order placed Successfully ! Your Refernce Number is '. $order_id;
        $cost = $request->input('cost');
        return view('payment', compact('cost', 'order_id'))->withStatus(__($msg));    
    }


    public function makePayment(Request $request) {
        $order = Order::find($request->input('order_id'));
        $order->paid_amount = $request->input('amount');
        if($order->cost > $request->input('amount')) {
            $order->payment_status = 'part payment';
        }
        else {
            $order->payment_status = $request->input('payment_status');
        }
        $order->save();

        return response()->json(['message' => 'Transaction Completed']);
    }


}
