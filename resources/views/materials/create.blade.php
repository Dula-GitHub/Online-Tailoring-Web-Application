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
                <strong>Create New Material</strong>
            </div>
            <div class="card-body">


                @if(Session::has('status'))
                <div class="row">
                    <div class="col-12">
                        @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Material already exists' || Session::get('status') == 'Please Enter the Material Name' || Session::get('status') == 'Please Enter the Unit Price')
                            <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                        @else
                            <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                        @endif
                    </div>
                </div>
            @endif


                <form action="{{ route('materials.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Name</label></div>
                            <div class="col-sm-8"><input type="text" class="form-control" name="name" required/></div>
                        </div>
                    </div>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Unit Price</label></div>
                            <div class="col-sm-8"><input type="number" class="form-control" name="price" required/></div>
                        </div>
                    </div>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6 row form-group">
                            <div class="col-sm-4"><label>Inventory Level</label></div>
                            <div class="col-sm-8">
                                <select class="form-control" name="inventory_level" required>
                                    @foreach($inventorylevels as $level)
                                        <option value="{{ $level->id }}">{{ $level->item_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <div class="col-sm-4"><label>Image</label></div>
                            <div class="col-sm-8"><input type="file" class="form-control" name="image" id="image"/></div>
                        </div>
                    </div>
                    <div class="col-sm-12 row form-group">
                        <div class="col-sm-6 row">
                            <button type="submit" class="btn btn-success">Save Material</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection