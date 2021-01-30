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
                <strong>Edit Sub Category</strong>
            </div>
            <div class="card-body">


                 @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Sub Category Successfully Updated')
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <form action="{{ route('sub-categories.update', $subcategory->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Sub Category Name</label></div>
                            <div class="col-sm-8"><input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" /></div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Tailor Cost</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="tailor_cost" value="{{ $subcategory->tailor_cost }}" /></div>
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
                                        @if($subcategory->category_id == $category->id)
                                            <option selected value="{{$category->id}}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Amount of Clothes</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="amount_of_cloth" value="{{ $subcategory->amount_of_cloth }}" /></div>
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
                                        @if(in_array($material->id, $material_subcategories))
                                            <option selected value="{{$material->id}}">{{ $material->name }}</option>
                                        @else
                                            <option value="{{$material->id}}">{{ $material->name }}</option>
                                        @endif
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
                                        @if(in_array($measurement->id, $measurements_subcategories))
                                            <option selected value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                        @else
                                            <option value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                        @endif
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
                                        @if($measurement->id == $subcategory->margin_measurement)
                                            <option selected value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                        @else
                                            <option value="{{$measurement->id}}">{{ $measurement->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Margin value for Children</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="length_for_cost" value="{{ $subcategory->length_for_cost }}" /></div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                @if($category->image_url)
                                    <img src="../../images/sub_categories/{{$subcategory->image_url}}" style="width: 300px; height: 300px" />
                                @else
                                    <img src="../../images/no_image_found.jpg" style="width: 300px; height: 300px" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <div class="col-sm-4"><label>Sub Category Image</label></div>
                            <div class="col-sm-8"><input type="file" class="form-control" name="image" id="image"/></div>
                        </div>
                    </div>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <button type="submit" class="btn btn-success">Update Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection