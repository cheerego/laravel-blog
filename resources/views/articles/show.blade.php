@extends('layouts.home')
@section('content')
    <div id="container"></div>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Html</th>
            <th>Author</th>
            <th>Category</th>
            <th>CreatedAt</th>
            <th>UpdatedAt</th>
            <th>DeletedAt</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->article_id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ str_limit($article->html,20) }}</td>
                <td>{{ $article->author }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $article->created_at }}</td>
                <td>{{ $article->updated_at }}</td>
                <td>{{ $article->deleted_at or '未删除' }}</td>
                <td><a href="{{ url("articles/".$article->article_id.'/edit') }}" class="btn btn-raised btn-danger btn-xs">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center">
        {!! $articles->render() !!}
    </div>

@endsection

@section('scriptbottom')
    <script type="text/javascript" src="{{ asset('bower_components') }}/pjax/src/jquery.pjax.js"></script>
@endsection

@section('scriptcode')
    <script !src="">
//        alert(document.querySelector('.pagination>li>a').getAttribute('href'));
    $.pjax({
           selector: '.pagination>li>a',
           show: 'fade',
           container: '#container',
            cache: true,
            storage: true,
            titleSuffix: '#',
            filter: function () {
            },
             callback: function () {
             }
         })
    </script>
@endsection
