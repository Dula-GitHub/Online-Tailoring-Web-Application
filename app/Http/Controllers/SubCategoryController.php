<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;

use App\SubCategory;
use App\Category;
use App\Material;
use App\Measurement;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::paginate(10);
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        $measurements = Measurement::all();
        return view('subcategories.create', compact('categories', 'materials', 'measurements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'name' => 'unique:sub_categories',
                'tailor_cost' => 'required',
                'category_id' => 'required', 
                'amount_of_cloth' => 'required',
                'material_ids' => 'required',
                'measurements_ids' => 'required',
                'margin_measurement' => 'required',
                'length_for_cost' => 'required'
            ],
            [
                'name.required'=> 'Please Enter the Sub Category Name',
                'name.unique' => 'Sub Category already exists',
                'tailor_cost.required' => 'Please Enter the Tailor Cost',
                'category_id.required' => 'Please Select the Category',
                'amount_of_cloth.required' => 'Please enter Amount of Clothes',
                'material_ids.required' => 'Please Select Materials can be Used',
                'measurements_ids.required' => 'Please Select Measurements Need',
                'margin_measurement.required' => 'Please Select Margin Measurement',
                'length_for_cost.required' => 'Please Enter Margin value for Children'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/sub_categories/';
            $public_path = '/images/sub_categories/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = null;
            $public_path = null;
        }

        $subcategory = SubCategory::create([
            'name'  =>  $request->input('name'),
            'category_id'   =>  $request->input('category_id'),
            'tailor_cost'   =>  $request->input('tailor_cost'),
            'amount_of_cloth'   =>  $request->input('amount_of_cloth'),
            'length_for_cost'   =>  $request->input('length_for_cost'),
            'margin_measurement'  =>  $request->input('margin_measurement'),
            'image_url' =>  $image_name
        ]);
        $subcategory->save();

        $subcategory->measurements()->attach($request->input('measurements_ids'));
        $subcategory->materials()->attach($request->input('material_ids'));

        $msg = 'Sub Category Successfully Created';

        return redirect('sub-categories')->withStatus(__($msg));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::with('materials', 'measurements')->find($id);
        return view('subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::with('materials', 'measurements')->find($id);
        $categories = Category::all();
        $materials = Material::all();
        $measurements = Measurement::all();
        $material_subcategories = [];
        $measurements_subcategories = [];
        foreach($subcategory->materials as $material) {
            array_push($material_subcategories, $material->id);
        }
        foreach($subcategory->measurements as $measurement) {
            array_push($measurements_subcategories, $measurement->id);
        }
        return view('subcategories.edit', compact('subcategory', 'categories', 'materials', 'measurements', 'material_subcategories', 'measurements_subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'name' => 'unique:sub_categories,name,' .$id,
                'tailor_cost' => 'required',
                'category_id' => 'required', 
                'amount_of_cloth' => 'required',
                'material_ids' => 'required',
                'measurements_ids' => 'required',
                'margin_measurement' => 'required',
                'length_for_cost' => 'required'
            ],
            [
                'name.required'=> 'Please Enter the Sub Category Name',
                'name.unique' => ' Sub Category already exists',
                'tailor_cost.required' => 'Please Enter the Tailor Cost',
                'category_id.required' => 'Please Select the Category',
                'amount_of_cloth.required' => 'Please enter Amount of Clothes',
                'material_ids.required' => 'Please Select Materials can be Used',
                'measurements_ids.required' => 'Please Select Measurements Need',
                'margin_measurement.required' => 'Please Select Margin Measurement',
                'length_for_cost.required' => 'Please Enter Margin value for Children'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/sub_categories/';
            $public_path = '/images/sub_categories/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = $subcategory->image_url;
            $public_path = null;
        }

        $subcategory->name  =  $request->input('name');
        $subcategory->category_id   =  $request->input('category_id');
        $subcategory->tailor_cost   =  $request->input('tailor_cost');
        $subcategory->amount_of_cloth   =  $request->input('amount_of_cloth');
        $subcategory->length_for_cost   =  $request->input('length_for_cost');
        $subcategory->margin_measurement  =  $request->input('margin_measurement');
        $subcategory->image_url =  $image_name;

        $subcategory->save();

        $subcategory->measurements()->detach();
        $subcategory->materials()->detach();
        $subcategory->materials()->attach($request->input('material_ids'));
        $subcategory->measurements()->attach($request->input('measurements_ids'));

        $msg = 'Sub Category Successfully Updated';

        return redirect('sub-categories')->withStatus(__($msg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        $msg = 'Sub Category Successfully Deleted';

        return redirect('sub-categories')->withStatus(__($msg));
    }
}
