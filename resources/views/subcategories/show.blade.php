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
                <strong>View Sub Category - {{ $subcategory->name }}</strong>
            </div>
            <div class="card-body">

                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Sub Category Name</label></div>
                        <div class="col-sm-7">{{$subcategory->name}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row form-group">
                    <div class="col-sm-6 row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7">
                            @if($subcategory->image_url)
                                <img src="../../images/sub_categories/{{$subcategory->image_url}}" style="width: 300px; height: 300px" />
                            @else
                                <img src="../../images/no_image_found.jpg" style="width: 300px; height: 300px" />
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 row">
                        <div class="col-sm-4"><label>Materials</label></div>
                        <div class="col-sm-8" style="margin-bottom: 25px">
                            @foreach($subcategory->materials as $material)
                                <li>{{ $material->name }}</li>
                            @endforeach
                        </div>
                        <div class="col-sm-4"><label>Measurements</label></div>
                        <div class="col-sm-8">
                            @foreach($subcategory->measurements as $measurement)
                                <li>{{ $measurement->name }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Category Name</label></div>
                        <div class="col-sm-7">{{App\Category::find($subcategory->category_id)->name}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Tailor Cost</label></div>
                        <div class="col-sm-7">Rs.{{$subcategory->tailor_cost}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Amount of Clothes</label></div>
                        <div class="col-sm-7">{{$subcategory->amount_of_cloth}} y</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Margin Length for Children</label></div>
                        <div class="col-sm-7">{{$subcategory->length_for_cost}}"</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-5"><label>Measurement for Margin Length</label></div>
                        <div class="col-sm-7">{{App\Measurement::find($subcategory->margin_measurement)->name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection