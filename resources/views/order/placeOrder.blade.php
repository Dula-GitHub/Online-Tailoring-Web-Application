@extends('layouts.app')

@section('content')

    <div style="padding: 40px">
    
        <h3>Place Your Order for {{ $sub_category_name->name }}</h3>
        <br>
        <p style="color: rgb(5, 105, 116)">Tailor Cost including additional things : Rs. {{ $sub_category_name->tailor_cost }} (Excluding Material Cost)</p>
        <div class="col-12" id="validaiton-error"></div>

        @if(Session::has('status'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                </div>
            </div>
        @endif
        
        <form class="form-horizontal" action="/place-my-order">
            @csrf
            <div class="row col-sm-12">
                <div class="col-sm-6">
                    <h4>Enter Measurements in Inches</h4>
                    <br>
                    @foreach($measurements_array as $measurement)
                        <div class="form-group row col-sm-12">
                            <label class="control-label col-sm-3" id="label_{{ $measurement->label }}">{{ $measurement->name }}</label>
                            <input type="number" min="0" step=".01" name="{{ $measurement->label }}" id="{{ $measurement->label }}" class="form-control col-sm-9" value="{{ old($measurement->label) }}" required/>
                        </div>
                    @endforeach
                    <input type="hidden" name="measurements" id="measurements" />

                </div>
                <div class="col-sm-6">
                    <h4>Details</h4>
                    <br>
                    @if($category_name)
                        <div class="row">
                            <label class="control-label col-sm-3">Category Name</label>
                            <label class="control-label col-sm-9">: {{ $category_name->name }}</label>
                            <input type="hidden" value="{{ $category_name->id }}" name="category_id" />
                        </div>
                        <br>
                    @endif
                    @if($sub_category_name)
                        <div class="row">
                            <label class="control-label col-sm-3">Sub Category Name</label>
                            <label class="control-label col-sm-9">: {{ $sub_category_name->name }}</label>
                            <input type="hidden" value="{{ $sub_category_name->id }}" id="sub_category_id" name="sub_category_id" />
                            <input type="text" value="{{ \App\Measurement::find($sub_category_name->margin_measurement)->label }}" id="margin_measurement" />
                        </div>
                        <br>
                    @endif
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="material">Material</label>
                        <div class="col-sm-9">
                            <select name="material_id" id="material_id" class="form-control" style="width: 75%">
                                <option selected disabled> -- Please Select the Material -- </option>
                                @foreach($materials_array as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9" id="material-image"></div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="control-label col-sm-3" for="date">Requested Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="requested_date" id="requested_date" style="width: 75%" value="{{ old('requested_date') }}"/>
                        </div>
                    </div>
                    <input type="hidden" name="amount_of_cloth" id="amount_of_cloth" />
                    <input type="hidden" name="cost" id="cost" />
                </div>
            </div>
            <br>
            <button type="button" id="cal-cost" class="btn btn-success col-sm-12">Place Order</button>

            <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label id="cost-of-order"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection

@section('javascript')
    <script type="text/javascript">

        var measurements = '';
        $('#cal-cost').click(function() {
            $("#validaiton-error").empty();
            $('input[type="number"]').each(function(){
                if($(this).val() == ""){
                    $("#validaiton-error").empty();
                    $("#validaiton-error").append('<div class="alert alert-danger" role="alert">There are some empty inputs. Please Check Again.</div>');
                }
                else {
                    measurements = measurements.concat($('#label_'+$(this).attr('id')).text() + ':' + $(this).val() + ', ');
                    next();
                }
            });
        })

        function next() {
            if(!$('#material_id').val()) {
                measurements = '';
                $("#validaiton-error").empty();
                $("#validaiton-error").append('<div class="alert alert-danger" role="alert">Please select the material to be used.</div>');
            }
            else if(!$('#requested_date').val()) {
                measurements = '';
                $("#validaiton-error").empty();
                $("#validaiton-error").append('<div class="alert alert-danger" role="alert">Please select the requested date.</div>');
            }
            else {
                $('#measurements').val(measurements);
                $("#validaiton-error").empty();
                $requested_date = $('#requested_date').val();
                $diff = new Date($requested_date) - new Date();
                $days = $diff/1000/60/60/24;

                $sub_category = $('#sub_category_id').val();

                $margin_measurement = $('#margin_measurement').val();
                $margin_val = $('#'+$margin_measurement).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: 'cal-cost',
                    data: {
                        'material_id': $('#material_id').val(),
                        'sub_category_id': $('#sub_category_id').val(),
                        'margin_val': $margin_val,
                        'days': $days,
                    },
                    success: function(msg) {
                        $("#validaiton-error").empty();
                        $('#cost-of-order').empty();
                        $('#cost').val(msg['cost']);
                        $('#amount_of_cloth').val(msg['amount_of_cloth']);
                        $('#cost-of-order').append('Cost of the Order is Rs. ' + msg['cost'] + '. Are you sure you want to place the order ?');
                        $('#confirm').modal('show');
                    },
                    error: function(error) {
                        $("#validaiton-error").empty();
                        $("#validaiton-error").append('<div class="alert alert-danger" role="alert">Something went wrong. Please try again.</div>');
                        window.scrollTo(0, 0);
                    }
                })
            }
        }

        $('#material_id').change(function() {
            $("#validaiton-error").empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: 'get-material-image',
                data: {
                    'material_id': $('#material_id').val(),
                },
                success: function(msg) {
                    $("#material-image").empty();
                    $('#material-image').append('<img src="../images/materials/' + msg['image_url'] + '" style="width: 300px; height: 300px"/>');
                },
                error: function(error) {
                    $("#material-image").empty();
                }
            })
        })
    </script>
@endsection

