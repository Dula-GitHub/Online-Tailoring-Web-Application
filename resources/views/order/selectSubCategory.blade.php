@extends('layouts.app')

@section('content')

    <div style="padding: 20px" class="row">
    
        @if($sub_categories)
            @foreach($sub_categories as $category)
                <div style="padding: 50px">
                    @if($category->image_url)
                        <img src="../images/sub_categories/{{$category->image_url}}" style="width: 300px; height: 300px" />
                    @else
                        <img src="../images/no_image.jpg" style="width: 300px; height: 300px" />
                    @endif
                    <p style="text-align: center; margin-top: 20px"><b>{{ $category->name }}</b></p>
                    <form action="order" method="post">
                        @csrf
                        <input type="hidden" value="{{ $category->category_id }}" name="parent_category" />
                        <input type="hidden" value="{{ $category->id }}" name="sub_category" />
                        <button class="btn btn-success btn-sm" type="submit">Order</button>
                    </form>
                </div>
            @endforeach
        @else
            <div style="padding: 50px; width: 100%">

                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                        </div>
                    </div>
                @endif
                
                <form action="order" enctype="multipart/form-data" method="post">
                    @csrf
                    <h3>Upload Your Custom Design Here</h3>
                    <p>Remember To Upload Your Custom Design With Proper Illustration of the measurements (Clear drawings and other images are accepted)</p>
                    <input type="file" class="form-control col-sm-5" name="image" id="image"/>
                    <br>
                    
                    <div class="form-group row">
                        <label class="control-label col-sm-1" for="date">Requested Date</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" name="requested_date" id="requested_date" style="width: 75%" value="{{ old('requested_date') }}"/>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success btn-sm" type="submit">Order</button>
                </form>
            </div>
        @endif

    </div>

@endsection

