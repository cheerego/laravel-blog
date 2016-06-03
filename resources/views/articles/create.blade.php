@extends('layouts.home')

@section('scripttop')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/simditor/styles/simditor.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/simditor-emoji/styles/simditor-emoji.css"/>
    <script type="text/javascript" src="{{ asset('bower_components') }}/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-module/lib/module.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-hotkeys/lib/hotkeys.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-uploader/lib/uploader.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simditor/lib/simditor.js"></script>
    <script src="{{ asset('bower_components') }}/simditor-emoji/lib/simditor-emoji.js"></script>
@endsection

@section('content')
    <form action="{{ action('ArticlesController@store') }}" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Title" class="form-control" name="title" required value="{{ old('title') }}">
        类别:
        <select class="form-control" name="category" id="">
            @foreach($categorys as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea id="editor" placeholder="Balabala" autofocus required name="html" value="">{{ old('content') }}</textarea>
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="submit" value="Submit" class="btn btn-block btn-success btn-raised">
    </form>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
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
                    },
                    toolbar: [
                        'title',
                        'bold',
                        'italic',
                        'underline',
                        'strikethrough',
                        'fontScale',
                        'color',
                        'ol',
                        'ul',
                        'blockquote',
                        'code',
                        'table',
                        'link',
                        'image',
                        'hr',
                        'indent',
                        'outdent',
                        'alignment',
                        'emoji'
                    ],
                    emoji: {
                        imagePath: '{{ asset('bower_components') }}/simditor-emoji/images/emoji/'
                    }
                });
    </script>


@endsection



