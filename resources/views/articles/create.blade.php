@extends('layouts.home')

@section('scripttop')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/simditor/styles/simditor.css"/>
    <link rel="stylesheet" href=" {{ asset('bower_components') }}/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components') }}/simditor-emoji/styles/simditor-emoji.css"/>
    <script type="text/javascript" src="{{ asset('bower_components') }}/jquery/dist/jquery.min.js"></script>
@endsection

@section('content')
    <form action="{{ action('ArticlesController@store') }}" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Title" class="form-control" name="title" required value="{{ old('title') }}">

        <label for="" class="label label-success">Categorise:</label>
        <select class="form-control" name="category" id="">
            @foreach($categorys as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea id="editor" placeholder="Balabala" autofocus required name="html"
                  value="">{{ old('content') }}</textarea>
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <label for="" class="label label-success">Tags:</label>
        <select id="select" class=" form-control" multiple>
            <option value="1">1</option>
            <option value="2">1</option>
            <option value="3">1</option>
            <option value="4">1</option>
        </select>
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

    <script type="text/javascript" src="{{ asset('bower_components') }}/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-module/lib/module.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-hotkeys/lib/hotkeys.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simple-uploader/lib/uploader.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simditor/lib/simditor.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}/simditor-emoji/lib/simditor-emoji.js"></script>
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
        $('#select').select2({
                    placeholder: "Select ",
                }
        );
    </script>


@endsection



