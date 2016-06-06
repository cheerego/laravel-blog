@extends('layouts.home')
@section('content')
    <h3>尊敬的Vip用户 {{ Auth::user()->name }},您好!</h3>
    <h4>欢迎您来到Blog Dashboard!</h4>
    <p class="alert alert-danger">
        文章只要有了类别后才可以提交哦!
    </p>
@endsection

