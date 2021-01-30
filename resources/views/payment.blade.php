<style>

.css-q90btw {
    color: white !important
}


</style>


<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
<!-- Required. Replace SB_CLIENT_ID with your sandbox client ID. -->
<script src="https://www.paypal.com/sdk/js?client-id=AQ-IzU3diyZVyoBNk0IHWpU1G--ZOoZJRs3C61PHmAPYlG-7HcZv-Hzj8enRzSL3HlQByOnihPgRWkNb"></script>


@extends('layouts.app')


@section('content')

    <div style="margin: 20px">
        @if(Session::has('status'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">

                <div class="card-body">
                    <div id = "msg"></div>
                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback {{ $errors->has('name') ? ' has-danger ' : '' }}">
                            {!! Form::label('cost', 'Cost (Rs.)', array('class' => 'col-md-3 control-label')); !!}
                            {!! Form::text('cost', $cost, array('id' => 'cost', 'class' => 'form-control', 'disabled')) !!}
                            {!! Form::hidden('order_id', $order_id, array('id' => 'order_id', 'class' => 'form-control', 'disabled')) !!}
                        </div>
                    </div>
                    <div id="paypal-button-container"></div>
                    <input type = "hidden" id = "transaction_id" name = "transaction_id" />
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')

    <script type = "text/javascript">

        $(document).ready(function() {
            var cost = $('#cost').val();
            console.log('cost');
            paypal.Buttons({
                style: {
                    layout:  'vertical',
                    color:   'gold',
                    shape:   'rect',
                    label:   'pay',
                    height:  50,
                    tagline: false
                },
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: cost
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        console.log(details);
                        if (details.error === 'INSTRUMENT_DECLINED') {
                            return actions.restart();
                        }
                        else {
                            $("#transaction_id").val(data.orderID);
                            // Call your server to save the transaction
                            $.ajax({
                                type: 'post',
                                url: '/make-payment',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    order_id: $("#order_id").val(),
                                    payment_status: details.status,
                                    amount: details.purchase_units[0].amount.value
                                },
                                dataType: 'json',
                                success: function(data) {
                                    $(".alert").hide();
                                    $("#msg").css("position", "relative");
                                    $("#msg").css("padding", "0.9rem 1.25rem");
                                    $("#msg").css("margin-bottom", "1rem");
                                    $("#msg").css("border-radius", "0.2857rem");
                                    $("#msg").css("color", "#fff");
                                    if(data.message == 'Transaction Completed') {
                                        $("#msg").css("background-color", "#00bf9a");
                                        $("#msg").html(data.message + ' by ' + details.payer.name.given_name);
                                        setTimeout(function(){ window.location.href = '/place-order'; }, 3000);
                                    }
                                    else if(data.message == 'Transaction Pending') {
                                        $("#msg").css("background-color", "#ffc107");
                                        $("#msg").html(data.message);
                                        setTimeout(function(){ window.location.href = '/place-order'; }, 3000);
                                    }
                                    else {
                                        $("#msg").css("background-color", "#dc3545");
                                        $("#msg").html(data.message);
                                    }
                                },
                                error: function(error) {
                                    console.log('error');
                                }
                            });
                        }
                    });
                },
                onError: function (err) {
                    $("#msg").css("position", "relative");
                    $("#msg").css("padding", "0.9rem 1.25rem");
                    $("#msg").css("margin-bottom", "1rem");
                    $("#msg").css("border-radius", "0.2857rem");
                    $("#msg").css("background-color", "#dc3545");
                    $("#msg").html('There is an error. Please try again');
                }
            }).render('#paypal-button-container');
        });

    </script>

@endsection
