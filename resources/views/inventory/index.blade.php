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
                <strong>Inventory</strong>
                <a style="float: right" href="/inventories/create" class="btn btn-success btn-sm">Add Inventory Items</a>
            </div>
            <div class="card-body">


                @if(Session::has('status'))
                <div class="row">
                    <div class="col-12">
                        @if(Session::get('status') == 'Please Enter the Inventory Level Name' || Session::get('status') == 'This Inventory Level already exists')
                            <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                        @else
                            <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                        @endif
                    </div>
                </div>
            @endif


                <ul class="nav nav-tabs">
                    @foreach($inventory_levels as $inventory_level)
                        @if($inventory_level->id == $id)
                            <li class="nav-item"><a class="nav-link active" href="/inventories-items/{{ $inventory_level->id }}">{{ $inventory_level->item_name }}</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/inventories-items/{{ $inventory_level->id }}">{{ $inventory_level->item_name }}</a></li>
                        @endif
                    @endforeach
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New</button>
                </ul>
                
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">                    
                        <div class="modal-content">
                            <form action="/level/create" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Level of Inventory</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group row col-sm-12">
                                        <label class="control-label col-sm-5" for="date">Level of Inventory</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="item_name" value="{{ old('item_name') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
                
                <br>
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Unit Price (Rs.)</th>
                            <th>Available Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$inventories->isEmpty())
                            @foreach($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->id }}</td>
                                    <td>{{ $inventory->name }}</td>
                                    <td>{{ $inventory->unit_price }}</td>
                                    <td>{{ $inventory->stock }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5" style="text-align: center">No Records Found</td></tr>
                        @endif
                    </tbody>
                </table>
                <ul class="pagination">
                    {{ $inventories->links() }}
                </ul>
            </div>
        </div>
    </div>

@endsection