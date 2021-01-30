<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Measurement;

use Validator;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurements = Measurement::paginate(10);
        return view('measurements.index', compact('measurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //change code
     $validator = Validator::make($request->all(), 
     [
         'name' => 'required|unique:measurements,name,'  
     ],
     [
         'name.required'=> 'Please Enter the Measurement Name',
         'name.unique' => 'Measurement already exists',
     ]
 );

 if ($validator->fails()) {
     $msg = $validator->messages()->first();
     return back()->withStatus(__($msg))->withInput();
 }
      //chnage code

        $measurement = Measurement::create([
            'name' => $request->input('name'),
            'label' => $request->input('slug')
        ]);
        $measurement->save();

        $msg = 'Measurement Successfully Created';
        return redirect('measurements')->withStatus(__($msg));
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
        $measurement = Measurement::find($id);

        //change code
     $validator = Validator::make($request->all(), 
     [
         'name' => 'required|unique:measurements,name,'.$measurement->id,
     ],
     [
         'name.required'=> 'Please Enter the Measurement Name',
         'name.unique' => 'Measurement already exists',
     ]
 );

 if ($validator->fails()) {
     $msg = $validator->messages()->first();
     return back()->withStatus(__($msg))->withInput();
 }
      //change code
        
        $measurement->name = $request->input('edit_name');
        $measurement->label = $request->input('edit_slug');
        $measurement->save();

        $msg = 'Measurement Successfully Updated';
        return redirect('measurements')->withStatus(__($msg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measurement = Measurement::find($id);
        $measurement->delete();

        $msg = 'Measurement Successfully Deleted';
        return redirect('measurements')->withStatus(__($msg));
    }
}
