<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Material;
use App\InventoryLevel;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Material::all();
        return view('inventory.add', compact('materials'));
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
                'material' => 'required',
                'qty' => 'required'
            ],
            [
                'material.required'=> 'Please Select the Item Name',
                'qty.required' => 'Please Enter The Quantity'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        $material = Material::find($request->input('material'));
        $quty = $material->stock;

        $material->stock = $quty + $request->input('qty');
        $material->save();

        return back()->withStatus('Items Added to the Inventory Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function listItems($id) {
        $inventories = Material::where('inventory_level', $id)->paginate(10);
        $inventory_levels = InventoryLevel::all();
        return view('inventory.index', compact('inventories', 'id', 'inventory_levels'));
    }



    public function addLevel(Request $request) {
        $validator = Validator::make($request->all(), 
            [
                'item_name' => 'required|unique:inventory_level',
            ],
            [
                'item_name.required'=> 'Please Enter the Inventory Level Name',
                'item_name.unique' => 'This Inventory Level already exists'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        $level = InventoryLevel::create([
            'item_name' => $request->input('item_name')
        ]);
        $level->save();

        $msg = 'Inventory Level Successfully Created';
        return redirect('inventories-items/'.$level->id)->withStatus(__($msg));
    }

}
