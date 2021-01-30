<?php

namespace App\Http\Controllers;

use Auth;
use Mail;

use App\Order;
use App\Category;
use App\SubCategory;
use App\Material;
use App\Mail\ApproveOrder;
use App\Mail\CompleteOrder;
use App\Mail\EditOrder;
use App\Mail\RejectOrder;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function listOrders(Request $request) {

        if(Auth::user()->user_role == 'admin') {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'pending')->latest()->paginate(10);
        }
        else {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'pending')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        }
        return view('admin.orderList', compact('orders'));

    }


    public function listApprovedOrders(Request $request) {

        if(Auth::user()->user_role == 'admin') {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'approved')->latest()->paginate(10);
        }
        else {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'approved')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        }
        return view('admin.orderList', compact('orders'));

    }


    public function listRejectedOrders(Request $request) {

        if(Auth::user()->user_role == 'admin') {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'rejected')->latest()->paginate(10);
        }
        else {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'rejected')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        }
        return view('admin.orderList', compact('orders'));

    }


    public function waitingOrders() {
        if(Auth::user()->user_role == 'admin') {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'waiting')->latest()->paginate(10);
        }
        else {
            $orders = Order::with('subCategory', 'material', 'user')->where('status', 'waiting')->where('user_id', Auth::user()->id)->latest()->paginate(10);
        }
        return view('admin.orderList', compact('orders'));
    }


    public function showOrder($id) {
        $order = Order::with('subCategory', 'material', 'user')->where('id', $id)->first();
        return view('admin.showOrder', compact('order'));
    }


    public function approveOrder($id) {
        $order = Order::find($id);
        $material_id = $order->material_id;
        $order->status = 'approved';
        $order->save();

        if($material_id){
            $material = Material::find($material_id);
            $quty = $material->stock;

            $material->stock = $quty - $order->amount_of_cloth;
            $material->save();

        }
        $customer_email = null;
        $customer_id = $order->user_id;
        if($customer_id){
            $customer = User::find($customer_id);
        if($customer)
          $customer_email = $customer->email;
        }
        if($customer_email)
        $sendEmail = Mail::to($customer_email)->send(new ApproveOrder($id));

        $msg = 'Order Approved Successfully';
        return redirect('orders')->withStatus(__($msg));
    }


    public function rejectOrder($id) {
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->save();

        $customer_email = null;
        $customer_id = $order->user_id;
        if($customer_id){
            $customer = User::find($customer_id);
        if($customer)
          $customer_email = $customer->email;
        }
        if($customer_email)
        $sendEmail = Mail::to($customer_email)->send(new RejectOrder($id));
        //$sendEmail = Mail::to(Auth::user()->email)->send(new RejectOrder($id));

        $msg = 'Order Rejected Successfully';
        return redirect('orders')->withStatus(__($msg));
    }


    public function editAndApproveOrder(Request $request, $id) {
        $order = Order::find($id);
        $order->cost = $request->input('cost');
        $order->requested_date = $request->input('requested_date');
        $order->status = 'waiting';
        $order->save();

        if($order->category_id) {
            $category_name = Category::where('id', $order->category_id)->first()->name;
        }
        else {
            $category_name = 'Custom Design';
        }
        if($order->material_id) {
            $material = Material::where('id', $order->material_id)->first()->name;
        }
        else {
            $material = 'Custom Material';
        }
        if($order->sub_category_id) {
            $sub_category_name = SubCategory::where('id', $order->sub_category_id)->first()->name;
        }
        else {
            $sub_category_name = 'Custom Design';
        }

        $customer_email = null;
        $customer_id = $order->user_id;

        if($customer_id){
            $customer = User::find($customer_id);
        if($customer)
          $customer_email = $customer->email;
        }
        if($customer_email)
        
        $sendEmail = Mail::to($customer_email)->send(new EditOrder($id, $request->all(), $category_name, $sub_category_name, $material, $request->input('cost')));

        // $sendEmail = Mail::to(Auth::user()->email)->send(new EditOrder($id, $request->all(), $category_name, $sub_category_name, $material, $request->input('cost')));

        $msg = 'Order Approved Successfully';
        return redirect('orders')->withStatus(__($msg));
    }


    public function completeOrder($id) {
        $order = Order::find($id);
        $order->status = 'completed';
        $order->save();

        $customer_email = null;
        $customer_id = $order->user_id;
        if($customer_id){
            $customer = User::find($customer_id);
        if($customer)
          $customer_email = $customer->email;
        }
        if($customer_email)
        $sendEmail = Mail::to($customer_email)->send(new CompleteOrder($id));
        // $sendEmail = Mail::to(Auth::user()->email)->send(new CompleteOrder($id));

        $msg = 'Order Completed Successfully';
        return redirect('orders')->withStatus(__($msg));
    }


}
