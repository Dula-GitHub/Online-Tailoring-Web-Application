@extends('layouts.app')

<style>
    body, html {
        height: 100%;
        margin: 0;
    }
</style>

@section('content')

    <div style="margin-top: -100px; background-image: url('../images/bg.jpg'); height: 120%; background-position: center; background-repeat: no-repeat; background-size: cover;">
        <a href="/place-order" class="btn btn-primary btn-lg;" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 200px;">Place an Order</a>
    </div>

@endsection
