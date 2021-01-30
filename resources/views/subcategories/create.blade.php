@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <strong>Create New Sub Category</strong>
            </div>
            <div class="card-body">

                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Sub Category Successfully Created')
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <form action="{{ route('sub-categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Sub Category Name</label></div>
                            <div class="col-sm-8"><input type="text" class="form-control" name="name" required/></div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Tailor Cost</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="tailor_cost" required/></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Category Name</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="category_id">
                                    <option selected disabled>-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Amount of Clothes</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="amount_of_cloth" required/></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Materials</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="material_ids[]" multiple>
                                    <option selected disabled>-- Select Materials --</option>
                                    @foreach($materials as $material)
                                        <option value="{{$material->id}}">{{ $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Measurements</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="measurements_ids[]" multiple>
                                    <option selected disabled>-- Select Measurements --</option>
                                    @foreach($measurements as $measurement)
                                        <option value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Measurement for Margin</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="margin_measurement">
                                    <option selected disabled>-- Select Margin Measurement --</option>
                                    @foreach($measurements as $measurement)
                                        <option value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Margin value for Children</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="length_for_cost" required/></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <div class="col-sm-4"><label>Sub Category Image</label></div>
                            <div class="col-sm-8"><input type="file" class="form-control" name="image" id="image" required/></div>
                        </div>
                    </div>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <button type="submit" class="btn btn-success">Save Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection