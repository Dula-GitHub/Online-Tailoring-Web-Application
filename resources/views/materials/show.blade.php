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
                <strong>View Material - {{ $material->name }}</strong>
            </div>
            <div class="card-body">


                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Materials Not Exist')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif

                
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-4"><label>Material Name</label></div>
                        <div class="col-sm-8">{{$material->name}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-4"><label>Unit Price</label></div>
                        <div class="col-sm-8">Rs. {{$material->unit_price}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-4"><label>Inventory Level</label></div>
                        <div class="col-sm-8">{{\App\InventoryLevel::find($material->inventory_level)->item_name}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row form-group">
                    <div class="col-sm-6 row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            @if($material->image_url)
                                <img src="../../images/materials/{{$material->image_url}}" style="width: 300px; height: 300px" />
                            @else
                                <img src="../../images/no_image_found.jpg" style="width: 300px; height: 300px" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection