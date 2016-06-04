@extends('layouts.layout')

@section('content')
 @include('index.pblog',['particles'=>$particles,'articles'=>$articles,'categorys'=>$categorys])
@endsection