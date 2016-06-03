@extends('layouts.layout')
@section('content')
    @include('index.pdetail',['articles' => $articles, 'categorys' => $categorys,'detail'=>$detail])
@endsection
