<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use File;
use Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
                'name' => 'unique:categories'
            ],
            [
                'name.required'=> 'Please Enter the Category Name',
                'name.unique' => 'Category already exists'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/categories/';
            $public_path = '/images/categories/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = null;
            $public_path = null;
        }

        $category = Category::create([
            'name'  =>  $request->input('name'),
            'image_url' =>  $image_name
        ]);
        $category->save();

        $msg = 'Category Successfully Created';

        return redirect('categories')->withStatus(__($msg));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'name' => 'unique:categories,name,' .$category->id
            ],
            [
                'name.required'=> 'Please Enter the Category Name',
                'name.unique' => 'Category already exists'
            ]
        );

        if ($validator->fails()) {
            $msg = $validator->messages()->first();
            return back()->withStatus(__($msg))->withInput();
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.'. $image->getClientOriginalExtension();
            $save_path = public_path() . '/images/categories/';
            $public_path = '/images/categories/'. $image_name;
            File::makeDirectory($save_path, $mode = 0755, true, true);
            $image->move($save_path, $image_name);
        }
        else{
            $save_path = null;
            $image_name = $category->image_url;
            $public_path = null;
        }

        $category->name  =  $request->input('name');
        $category->image_url =  $image_name;
        $category->save();

        $msg = 'Category Successfully Updated';

        return redirect('categories')->withStatus(__($msg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $msg = 'Category Successfully Deleted';

        return redirect('categories')->withStatus(__($msg));
    }
}
