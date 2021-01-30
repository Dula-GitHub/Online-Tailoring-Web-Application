@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><strong>Show Order "{{ $order->id }}"</strong></div>
                <div class="card-body">


                    @if(Session::has('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            </div>
                        </div>
                    @endif

                    
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3"><h6><b>ID :</b></h6></div>
                            <div class="col-sm-5"><p><b>{{ $order->id }}</b></p></div>
                            <div class="col-sm-4">
                                <?php $id = $order->id ?>
                                @if($order->status == 'pending' && Auth::user()->user_role == 'admin')
                                    <form style="display: inline-block" action="{{ URL::to('order/' . $order->id . '/reject') }}" method="post">
                                        @csrf
                                        <a style="color: white" type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to reject this order?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Reject') }}
                                        </a>
                                    </form>
                                    <form style="display: inline-block" action="{{ URL::to('order/' . $order->id . '/approve') }}" method="post">
                                        @csrf
                                        <a style="color: white" type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to approve this order?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Approve') }}
                                        </a>
                                    </form>
                                    <a style="color: white" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-order">{{ __('Edit & Approve') }}</a>
                                @endif
                                @if($order->status == 'approved' && Auth::user()->user_role == 'admin')
                                    <form style="display: inline-block" action="{{ URL::to('order/' . $order->id . '/complete') }}" method="post">
                                        @csrf
                                        <a style="color: white" type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to complete this order?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Complete') }}
                                        </a>
                                    </form>
                                @endif
                                @if($order->status == 'waiting' && Auth::user()->user_role == 'user')
                                    <form style="display: inline-block" action="{{ URL::to('order/' . $order->id . '/approve') }}" method="post">
                                        @csrf
                                        <a style="color: white" type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to approve this order?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Approve') }}
                                        </a>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <div class="modal fade" id="edit-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit and Approve Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ URL::to('edit-and-approve-order/'.$order->id) }}" method="get">
                                        @csrf
                                        <div class="modal-body">
                                            <label>Requested Date</label>
                                            <input type="date" class="form-control" value="{{ $order->requested_date->format('Y-m-d') }}" name="requested_date" />
                                            <br>
                                            @if($order->design_image)
                                                <label>Cost</label>
                                                <input type="number" class="form-control" value="{{ $order->cost}}" min="0" step=".01" name="cost" />
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Approve Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if($order->status == 'pending')
                            <td><span class="badge badge-warning">Pending</span></td>
                        @elseif($order->status == 'approved')
                            <td><span class="badge badge-success">Approved</span></td>
                        @elseif($order->status == 'rejected')
                            <td><span class="badge badge-danger">Rejected</span></td>
                        @else
                            <td><span class="badge badge-primary">Waiting</span></td>
                        @endif
                        <br><br>
                        @if($order->design_image) 
                            <img src="../../images/custom_orders/{{$order->design_image}}" style="width: 300px; height: 300px" />
                        @endif
                        <br><br>
                        @if($order->user)
                            <div class="row">
                                <div class="col-sm-8 row">
                                    <div class="col-sm-3"><p><b>Customer Name</b></p></div>
                                    <div class="col-sm-9"><p><b>:</b> {{ $order->user->first_name }} {{ $order->user->last_name }}</p></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 row">
                                    <div class="col-sm-3"><p><b>Contact Number</b></p></div>
                                    <div class="col-sm-9"><p><b>:</b> {{ $order->user->contact_number }}</p></div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            @if($order->category)
                                <div class="col-sm-8 row">
                                    <div class="col-sm-3"><p><b>Category</b></p></div>
                                    <div class="col-sm-9"><p><b>:</b> {{ $order->category->name }}</p></div>
                                </div>
                            @endif
                            @if($order->subCategory)
                                <div class="col-sm-4 row">
                                    <div class="col-sm-6"><p><b>Sub Category</b></p></div>
                                    <div class="col-sm-6"><p><b>:</b> {{ $order->subCategory->name }}</p></div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if($order->material)
                                <div class="col-sm-8 row">
                                    <div class="col-sm-3"><p><b>Material</b></p></div>
                                    <div class="col-sm-9"><p><b>:</b> {{ $order->material->name }}</p></div>
                                </div>
                            @endif
                            <div class="col-sm-4 row">
                                <div class="col-sm-6"><p><b>Amount of Clothes Needed</b></p></div>
                               <div class="col-sm-6"><p><b>:</b> @if($order->amount_of_cloth){{ $order->amount_of_cloth }} m @endif</p></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 row">
                                <div class="col-sm-3"><p><b>Created At</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->created_at->format('Y-m-d') }}</p></div>
                            </div>
                            <div class="col-sm-4 row">
                                <div class="col-sm-6"><p><b>Last Update At</b></p></div>
                                <div class="col-sm-6"><p><b>:</b> {{ $order->updated_at->format('Y-m-d') }}</p></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 row">
                                <div class="col-sm-3"><p><b>Cost</b></p></div>
                                <div class="col-sm-9"><p><b>:</b>@if($order->cost) Rs. {{ $order->cost }} @endif</p></div>
                            </div>
                            <div class="col-sm-4 row">
                                <div class="col-sm-6"><p><b>Requested Date</b></p></div>
                                <div class="col-sm-6"><p><b>:</b> {{ $order->requested_date->format('Y-m-d') }}</p></div>
                            </div>
                        </div>
                        <br>
                        <h5>Measurements</h5>
                        <br>
                        <?php 
                            $measurements = explode(", ", $order->measurements);
                            $measure = implode("\n\n", $measurements); 
                        ?>
                        <div class="col-sm-12 row">
                            <div class="col-sm-12"><pre><b>{{$measure}}</b></pre></div>
                        </div>
                        <!-- @if($order->neck_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Neck Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->neck_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->chest_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Chest Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->chest_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->waist_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Waist Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->waist_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->hip_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Hip Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->hip_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->bicep_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bicep Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bicep_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->first_forearm_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>First Forearm Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->first_forearm_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->wrist_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Wrist Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->wrist_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder_slope_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder Slope Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder_slope_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->sleeve_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Sleeve Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->sleeve_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->breast_height)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Breast Height</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->breast_height }} "</p></div>
                            </div>
                        @endif
                        @if($order->shirt_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shirt Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shirt_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->neck_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Neck Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->neck_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->length_to_the_hip)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Length to the Hip</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->length_to_the_hip }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->waist_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Waist Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->waist_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->upper_hip_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Upper Hip Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->upper_hip_circumference }} "</p></div>
                            </div>
                        @endif

                        @if($order->lower_hip_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Lower Hip Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->lower_hip_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->waist_to_lower_hip)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Waist to Lower Hip</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->waist_to_lower_hip }} "</p></div>
                            </div>
                        @endif
                        @if($order->skirt_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Skirt Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->skirt_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder_to_waist)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder to Waist</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder_to_waist }} "</p></div>
                            </div>
                        @endif
                        @if($order->upper_bust)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Upper Bust</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->upper_bust }} "</p></div>
                            </div>
                        @endif
                        @if($order->bust)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bust</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bust }} "</p></div>
                            </div>
                        @endif
                        @if($order->under_bust)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Under Bust</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->under_bust }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder_to_apex)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder to Apex</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder_to_apex }} "</p></div>
                            </div>
                        @endif
                        @if($order->upper_arm)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Upper Arm</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->upper_arm }} "</p></div>
                            </div>
                        @endif
                        @if($order->apex_to_apex)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Apex to Apex</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->apex_to_apex }} "</p></div>
                            </div>
                        @endif
                        @if($order->sleeve_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Sleeve Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->sleeve_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->bust_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bust Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bust_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->bodice_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bodice Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bodice_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->back_width)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Back Width</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->back_width }} "</p></div>
                            </div>
                        @endif
                        @if($order->armpit_girth)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Armpit Girth</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->armpit_girth }} "</p></div>
                            </div>
                        @endif
                        @if($order->hip_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Hip Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->hip_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->neckline_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Neckline Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->neckline_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->armhole_circumference)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Armhole Circumference</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->armhole_circumference }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder_width)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder Width</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder_width }} "</p></div>
                            </div>
                        @endif
                        @if($order->bust_height)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bust Height</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bust_height }} "</p></div>
                            </div>
                        @endif
                        @if($order->tunic_front_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Tunic Front Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->tunic_front_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->tunic_back_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Tunic Back Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->tunic_back_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->neckline_drop)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Neckline Drop</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->neckline_drop }} "</p></div>
                            </div>
                        @endif
                        @if($order->collar)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Collar</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->collar }} "</p></div>
                            </div>
                        @endif
                        @if($order->chest)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Chest</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->chest }} "</p></div>
                            </div>
                        @endif
                        @if($order->shirt_waist)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shirt Waist</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shirt_waist }} "</p></div>
                            </div>
                        @endif
                        @if($order->hip)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Hip</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->hip }} "</p></div>
                            </div>
                        @endif
                        @if($order->bicep)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bicep</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bicep }} "</p></div>
                            </div>
                        @endif
                        @if($order->cuff)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Cuff</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->cuff }} "</p></div>
                            </div>
                        @endif
                        @if($order->yoke)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Yoke</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->yoke }} "</p></div>
                            </div>
                        @endif
                        @if($order->back_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Back Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->back_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->waist)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Waist</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->waist }} "</p></div>
                            </div>
                        @endif
                        @if($order->pants_out_seam)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Pants out Seam</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->pants_out_seam }} "</p></div>
                            </div>
                        @endif
                        @if($order->inseam)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Inseam</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->inseam }} "</p></div>
                            </div>
                        @endif
                        @if($order->thigh)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Thigh</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->thigh }} "</p></div>
                            </div>
                        @endif
                        @if($order->knee)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Knee</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->knee }} "</p></div>
                            </div>
                        @endif
                        @if($order->bottom)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Bottom</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->bottom }} "</p></div>
                            </div>
                        @endif
                        @if($order->crotch)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Crotch</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->crotch }} "</p></div>
                            </div>
                        @endif
                        @if($order->jacket_waist)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Jacket Waist</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->jacket_waist }} "</p></div>
                            </div>
                        @endif
                        @if($order->front_length)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Front Length</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->front_length }} "</p></div>
                            </div>
                        @endif
                        @if($order->shoulder)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Shoulder</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->shoulder }} "</p></div>
                            </div>
                        @endif
                        @if($order->around_the_neck)
                            <div class="col-sm-12 row">
                                <div class="col-sm-3"><p><b>Around the Neck</b></p></div>
                                <div class="col-sm-9"><p><b>:</b> {{ $order->around_the_neck }} "</p></div>
                            </div>
                        @endif -->
                        @if($order->status == 'pending')
                            <a href="/orders" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        @elseif($order->status == 'approved')
                            <a href="/approved-orders" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        @elseif($order->status == 'rejected')
                            <a href="/rejected-orders" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        @else
                            <a href="/waiting-orders" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection