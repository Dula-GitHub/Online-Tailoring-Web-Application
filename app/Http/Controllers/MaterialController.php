<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Material;
use App\InventoryLevel;

use Validator;
use File;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::paginate(10);
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventorylevels = InventoryLevel::all();
        return view('materials.create', compact('inventorylevels'));
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
                'name' => 'required|unique:materials',
                'price' => 'required'
            ],
            [
                'name.required'=> 'Please Enter the Material Name',
                'name.unique' => 'Material already exists',
                'price.required' => 'Please Enter the Unit Price'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/materials/';
            $public_path = '/images/materials/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = null;
            $public_path = null;
        }

        $material = Material::create([
            'name'  =>  $request->input('name'),
            'unit_price' => $request->input('price'),
            'inventory_level' => $request->input('inventory_level'),
            'image_url' =>  $image_name
        ]);
        $material->save();

        $msg = 'Material Successfully Created';

        return redirect('materials')->withStatus(__($msg));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        $inventorylevels = InventoryLevel::all();
        return view('materials.edit', compact('material', 'inventorylevels'));
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
        $material = Material::find($id);

        $validator = Validator::make($request->all(), 
            [
                'name' => 'required|unique:materials,name,' .$material->id,
                'price' => 'required'
            ],
            [
                'name.required'=> 'Please Enter the Material Name',
                'name.unique' => 'Material already exists',
                'price.required' => 'Please Enter the Unit Price'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/materials/';
            $public_path = '/images/materials/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = $material->image_url;
            $public_path = null;
        }

        $material->name  =  $request->input('name');
        $material->unit_price = $request->input('price');
        $material->inventory_level = $request->input('inventory_level');
        $material->image_url =  $image_name;
        $material->save();

        $msg = 'Material Successfully Updated';

        return redirect('materials')->withStatus(__($msg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();

        return back()->withStatus('Material deleted Successfully');
    }
}
