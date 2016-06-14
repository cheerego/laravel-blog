@extends('layouts.home')
@section('content')
    <div id="container">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <button class="btn btn-raised btn-lg" data-toggle="modal" data-target="#myModal">
            Add Images
        </button>
        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Add Image
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('images') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div class="form-group">
                                <input type="file" id="inputFile4"  name="image" >
                                <div class="input-group">
                                    <input type="text" readonly=""  class="form-control" placeholder="choose image and upload">
                                    <span class="input-group-btn input-group-sm">
                                    </span>
                                </div>
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
                <th>Path</th>
                <th>Image</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->path }}</td>
                    <td><img src="{{ $image->path }}" width="300"></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {!! $images->render() !!}
        </div>
    </div>
@endsection

@section('scriptbottom')
@endsection

@section('scriptcode')

@endsection