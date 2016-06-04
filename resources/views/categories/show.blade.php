@extends('layouts.home')

@section('content')
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <button class="btn btn-raised btn-lg" data-toggle="modal" data-target="#myModal">
        Add Category
    </button>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Add Category
                    </h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('categories') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group label-floating">
                            <label class="control-label" for="focusedInput2">Category Name</label>
                            <input class="form-control" name="name" id="focusedInput2" type="text">
                            <p class="help-block">为了统一格式,建议首字母大写😂</p>
                        </div>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Total</th>
            <th>Delete||Activate</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pcategories as $category)
            <tr class="active">
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ count($category->articles) }}</td>
                <td>
                    @if(empty($category->deleted_at))
                        <a href="{{ url("categories/softdelete/".$category->id) }}" class="btn btn-raised btn-warning btn-xs">
                            Delete
                        </a>
                    @else
                        <a href="{{ url("categories/reactivate/".$category->id) }}" class="btn btn-raised btn-info btn-xs">
                            {{ $category->deleted_at->diffForHumans() }}
                        </a>
                    @endif
                </td>
                <td>
                    <button class="btn" data-toggle="modal" data-target="#{{$category->name}}">
                        Rename
                    </button>

                    <div class="modal fade" id="{{$category->name}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Add Category
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('categories',[$category->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="focusedInput2">Rename</label>
                                            <input class="form-control" name="name" id="focusedInput2" type="text">
                                            <p class="help-block">为了统一格式,建议首字母大写😂</p>
                                        </div>
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $pcategories->render() !!}
@endsection