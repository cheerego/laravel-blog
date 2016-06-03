@extends('layouts.home')
@section('content')
    <div id="container">
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
                <th>Deleted||Activate</th>
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
                    <td style="text-align: center">
                        @if(isset($article->deleted_at))
                            <a href="{{ url("articles/reactivate/".$article->article_id) }}"
                               class="btn btn-raised btn-info btn-xs">{{ $article->deleted_at ? $article->deleted_at->diffForHumans() : '删除' }}</a>
                        @else
                            <a href="{{ url("articles/softdelete/".$article->article_id) }}"
                               class="btn btn-raised btn-info btn-xs">{{ $article->deleted_at ? $article->deleted_at->diffForHumans() : '删除' }}</a>
                        @endif
                    </td>
                    <td><a href="{{ url("articles/".$article->article_id.'/edit') }}"
                           class="btn btn-raised btn-danger btn-xs">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {!! $articles->render() !!}
        </div>
    </div>
@endsection

@section('scriptbottom')
@endsection

@section('scriptcode')

@endsection
