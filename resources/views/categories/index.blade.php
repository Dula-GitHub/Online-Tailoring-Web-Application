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
                <strong>Categories</strong>
            </div>

            <div class="card-body">
                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Please Enter the Category Name' || Session::get('status') == 'Category already exists')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif


                <div class="col-sm-12">
                    <a href="/categories/create" class="btn btn-success">Create New Category</a>
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
                        @if(!$categories->isEmpty())
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('categories/' . $category->id) }}">
                                            {{ __('View') }}
                                        </a>
                                        <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('categories/' . $category->id . '/edit') }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <?php $id = $category->id ?>
                                        <form style="display: inline-block" action="{{ URL::route('categories.destroy', $category) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a style="color: white" type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9" style="text-align: center">No Records Found</td></tr>
                        @endif
                    </tbody>
                </table>
                <ul class="pagination">
                    {{ $categories->links() }}
                </ul>
            </div>
        </div>
    </div>

@endsection