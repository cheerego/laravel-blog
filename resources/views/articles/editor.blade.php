@extends('layouts.home')

@section('scripttop')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/simditor/styles/simditor.css"/>
    <script type="text/javascript" src="{{ asset('bower_components') }}/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-module/lib/module.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-hotkeys/lib/hotkeys.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-uploader/lib/uploader.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simditor/lib/simditor.js"></script>
@endsection

@section('content')
    <form action="{{ action('ArticlesController@store') }}" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Title" class="form-control" name="title" required value="{{ old('title') }}">
        <textarea id="editor" placeholder="Balabala" autofocus required name="content" value="{{ old('content') }}"></textarea>
        类别:
        <select class="form-control" name="category" id="">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
        </select>
        <input type="submit" value="Submit" class="btn btn-block btn-success btn-raised">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    </form>
@endsection


@section('scriptbottom')
@endsection


@section('scriptcode')
    <script !src="">
        var editor = new Simditor(
                {
                    textarea: $('#editor'),
                    pasteImage: true,
                    //optional options
                    params: {
                        _token: '{{  csrf_token() }}'
                    },
                    upload: {
                        url: '{{ action('ArticlesController@uploadimg') }}',
                        defaultImage: '{{ base_path().'/images/image.png' }}',
                        params: {
                            _token: '{{  csrf_token() }}'
                        },
                        fileKey: 'upload_file',
                        connectionCount: 3,
                        leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
                    }
                });
    </script>


@endsection



