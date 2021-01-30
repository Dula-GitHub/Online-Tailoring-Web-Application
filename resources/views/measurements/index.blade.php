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
                <strong>Measurements</strong>
            </div>
            <div class="card-body">
                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Measurement Successfully Updated' || Session::get('status') == 'Measurement Successfully Deleted')
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="col-sm-12">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Create New Measurement</button>
                </div>
                <br>
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$measurements->isEmpty())
                            @foreach($measurements as $measurement)
                                <tr>
                                    <td>{{ $measurement->id }}</td>
                                    <td>{{ $measurement->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editMyModal{{$measurement->id}}">Edit</button>
                                        <?php $id = $measurement->id ?>
                                        <form style="display: inline-block" action="{{ URL::route('measurements.destroy', $measurement->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a style="color: white" type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to delete this measurement?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editMyModal{{$measurement->id}}" role="dialog">
                                    <div class="modal-dialog">                    
                                        <div class="modal-content">
                                            <form action="{{ route('measurements.update', $measurement->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">New Measurement</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row col-sm-12">
                                                        <label class="control-label col-sm-5" for="date">Measurement Name</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="edit_name" id="edit_name{{$measurement->id}}" value="{{ $measurement->name }}" required/>
                                                            <input type="hidden" class="form-control" name="edit_slug" id="edit_slug{{$measurement->id}}" value="{{ $measurement->label }}" required/>
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
                            @endforeach
                        @else
                            <tr><td colspan="9" style="text-align: center">No Records Found</td></tr>
                        @endif
                    </tbody>
                </table>
                <ul class="pagination">
                    {{ $measurements->links() }}
                </ul>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">                    
                        <div class="modal-content">
                            <form action="{{ route('measurements.store') }}" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Measurement</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group row col-sm-12">
                                        <label class="control-label col-sm-5" for="date">Measurement Name</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required/>
                                            <input type="hidden" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" required/>
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

            </div>
        </div>
    </div>

@endsection


@section('javascript')

    <script type="text/javascript">
        $('#name').keyup(function() {
            $('#slug').val($('#name').val().replace(/ /g, "_").toLowerCase());
        });

        $(document).on('keyup', "[id^=edit_name]", function(){
            var id = this.id.replace(/[^\d]+/, '');
            $('#edit_slug'+id).val($('#edit_name'+id).val().replace(/ /g, "_").toLowerCase());
        });
    </script>

@endsection