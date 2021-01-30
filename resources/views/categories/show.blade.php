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
                <strong>View Category - {{ $category->name }}</strong>
            </div>
            <div class="card-body">

                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Please Enter the Category Name' || Session::get('status') == 'Category already exists')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <div class="col-sm-12 row">
                    <div class="col-sm-6 row form-group">
                        <div class="col-sm-4"><label>Category Name</label></div>
                        <div class="col-sm-8">{{$category->name}}</div>
                    </div>
                </div>
                <div class="col-sm-12 row form-group">
                    <div class="col-sm-6 row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            @if($category->image_url)
                                <img src="../../images/categories/{{$category->image_url}}" style="width: 300px; height: 300px" />
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