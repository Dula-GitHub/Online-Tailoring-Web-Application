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
                <strong>Add Inventory Items</strong>
            </div>
            <div class="card-body">


                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Items Added to the Inventory Successfully' || Session::get('status') == 'Inventory Level Successfully Created')
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <div class="col-sm-12 row">
                    <div class="col-sm-6">
                        <form action="{{ route('inventories.store') }}" method="post">
                            @csrf
                            <div class="col-sm-12 row form-group">
                                <div class="col-sm-4"><label>Item Name</label></div>
                                <div class="col-sm-8">
                                    <select class="form-control" name="material">
                                        <option selected disabled> -- Please Select Item -- </option>
                                        @foreach($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 row form-group">
                                <div class="col-sm-4"><label>Item Quantity</label></div>
                                <div class="col-sm-8"><input type="number" name="qty" step=".01" class="form-control" required/></div>
                            </div>
                            <button class="btn btn-sm btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection