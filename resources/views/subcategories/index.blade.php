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
                <strong>Sub Categories</strong>
            </div>
            <div class="card-body">

                @if(Session::has('status'))
                    <div class="row">
                        <div class="col-12">
                            @if(Session::get('status') == 'Results Not Found' || Session::get('status') == 'Sub Categories Not Exist')
                                <div class="alert alert-danger" role="alert">{{ Session::get('status') }}</div>
                            @else
                                <div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
                            @endif
                        </div>
                    </div>
                @endif

                
                <div class="col-sm-12">
                    <a href="/sub-categories/create" class="btn btn-success">Create New Sub Category</a>
                </div>
                <br>
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Tailor Cost (Rs.)</th>
                            <th>Amount of Clothes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$subcategories->isEmpty())
                            @foreach($subcategories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ \App\Category::find($category->category_id)->name }}</td>
                                    <td>{{ $category->tailor_cost }}</td>
                                    <td>{{ $category->amount_of_cloth }}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm" href="{{ URL::to('sub-categories/' . $category->id) }}">
                                            {{ __('View') }}
                                        </a>
                                        <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('sub-categories/' . $category->id . '/edit') }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <?php $id = $category->id ?>
                                        <form style="display: inline-block" action="{{ URL::route('sub-categories.destroy', $category->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a style="color: white" type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to approve this sub category?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $subcategories->links() }}
                </ul>
            </div>
        </div>
    </div>

@endsection