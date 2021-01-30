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
            @if(request()->segment(count(request()->segments())) == 'rejected-orders')
                <strong>Rejected Orders List</strong>
            @elseif(request()->segment(count(request()->segments())) == 'approved-orders')
                <strong>Approved Orders List</strong>
            @elseif(request()->segment(count(request()->segments())) == 'waiting-orders')
                <strong>Waiting Orders List</strong>
            @else
                <strong>Pending Orders List</strong>
            @endif
            </div>
            <div class="card-body">


                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Orders Do Not Exist')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Product</th>
                            <th>Requested Date</th>
                            <th>Material</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Paid Amount</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$orders->isEmpty())
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    @if($order->user)
                                        <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                        <td>{{ $order->user->contact_number }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif

                                    @if($order->subCategory)
                                    
                                    <td>{{ $order->subCategory->name }}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    
                                    <td>{{ $order->requested_date->format('Y-m-d') }}</td>
                                    @if($order->material)<td>{{ $order->material->name }}</td>@else<td></td>@endif
                                    @if($order->cost)
                                        <td>Rs. {{ $order->cost }}</td>
                                    @else
                                        <td></td>
                                    @endif

                                    @if($order->status == 'pending')
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    @elseif($order->status == 'approved')
                                        <td><span class="badge badge-success">Approved</span></td>
                                    @elseif($order->status == 'rejected')
                                        <td><span class="badge badge-danger">Rejected</span></td>
                                    @else
                                        <td><span class="badge badge-primary">Waiting</span></td>
                                    @endif

                                    <td>Rs. {{ $order->paid_amount }}</td>
                                    @if($order->payment_status == 'PENDING' || $order->payment_status == 'pending')
                                        <td><span class="badge badge-warning">PENDING</span></td>
                                    @elseif($order->payment_status == 'COMPLETED')
                                        <td><span class="badge badge-success">COMPLETED</span></td>
                                    @else
                                        <td><span class="badge badge-primary">{{ $order->payment_status }}</span></td>
                                    @endif
                                    
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('order/' . $order->id) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp{{ __('View') }}
                                        </a>
                                        <?php $id = $order->id ?>
                                        @if($order->status == 'pending' && Auth::user()->user_role == 'admin')
                                            <form style="display: inline-block" action="{{ URL::to('order/' . $id . '/reject') }}" method="post">
                                                @csrf
                                                <a style="color: white" type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to reject this order?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Reject') }}
                                                </a>
                                            </form>
                                            <form style="display: inline-block" action="{{ URL::to('order/' . $id . '/approve') }}" method="post">
                                                @csrf
                                                <a style="color: white" type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to approve this order?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Approve') }}
                                                </a>
                                            </form>
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
                                            <form style="display: inline-block" action="{{ URL::to('order/' . $id . '/approve') }}" method="post">
                                                @csrf
                                                <a style="color: white" type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to approve this order?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Approve') }}
                                                </a>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9" style="text-align: center">No Records Found</td></tr>
                        @endif
                    </tbody>
                </table>
                <ul class="pagination">
                    {{ $orders->links() }}
                </ul>
            </div>
        </div>
    </div>

@endsection