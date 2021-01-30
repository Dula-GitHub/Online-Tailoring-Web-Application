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

    <div style="padding: 20px" class="row">
        @if($categories)
            @foreach($categories as $category)
                <div style="padding: 50px">
                    @if($category->image_url)
                        <img src="../images/categories/{{$category->image_url}}" style="width: 300px; height: 300px" />
                    @else
                        <img src="../images/no_image.jpg" style="width: 300px; height: 300px" />
                    @endif
                    <p style="text-align: center; margin-top: 20px">
                        <b>{{ $category->name }}</b> &nbsp;&nbsp;
                        <form action="sub-category">
                            <input type="hidden" value="{{ $category->id }}" name="id" />
                            <button class="btn btn-success btn-sm" type="submit">Order</button>
                        </form>
                    </p>
                </div>
            @endforeach
        @endif

        <div style="padding: 50px">
            <img src="../images/no_image.jpg" style="width: 300px; height: 300px" />
            <p style="text-align: center; margin-top: 20px">
                <b>Custom Design</b> &nbsp;&nbsp;
                <form action="sub-category">
                    <input type="hidden" value="0" name="id" />
                    <button class="btn btn-success btn-sm" type="submit">Order</button>
                </form>
            </p>
        </div>

    </div>

@endsection

