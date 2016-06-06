<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">--}}
    {{--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">--}}

    <link href="//cdn.bootcss.com/animate.css/3.5.1/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components') }}/bootstrap/dist/css/bootstrap.css">
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components') }}/bootstrap-material-design/dist/css/bootstrap-material-design.css">
    <link rel="stylesheet" href="{{ asset('bower_components') }}/bootstrap-material-design/dist/css/ripples.css">
    <link href="{{ asset('bower_components') }}/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components') }}/nprogress/nprogress.css">

    @yield('scripttop')
    <style>
        body {
            width: 1210px;
            margin: 0 auto;
            background-color: white;
        }
    </style>
</head>
<body style="background-image:url({{ asset('image').'/bg.jpg' }});background-position:center; background-repeat:repeat">
@include('layouts.nav')
<div id="container">
<div class="row">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="active"><a href="{{ url('dashboard') }}">功能</a></li>
            <li><a href="{{ url('articles/create') }}">撰写文章</a></li>
            <li><a href="{{ url('articles/show') }}">文章列表</a></li>
            <li><a href="{{ url('categories/show') }}">分类列表</a></li>
            <li><a href="{{ url('tags') }}">标签列表</a></li>
        </ul>

    </div>
    <div class="col-md-9">@yield('content')</div>
</div>


<button style="display: none" id="btn" type="button" class="btn btn-default"
        data-content="我只想让他弹出来玩一玩,没有其他的意思😂" data-toggle="snackbar" data-timeout="0">Show snackbar
</button>
</div>
<script src="{{ asset('bower_components') }}/jquery/dist/jquery.js"></script>
<script src="{{ asset('bower_components') }}/jquery-pjax/jquery.pjax.js"></script>
{{--<script type="text/javascript" src="{{ asset('bower_components') }}/pjax/src/jquery.pjax.js"></script>--}}
<script src="{{ asset('bower_components') }}/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('bower_components') }}/bootstrap-material-design/dist/js/material.js"></script>
<script src="{{ asset('bower_components') }}/bootstrap-material-design/dist/js/ripples.js"></script>
<script src="{{ asset('bower_components') }}/snackbarjs/dist/snackbar.min.js"></script>
<script src="{{ asset('bower_components') }}/nprogress/nprogress.js"></script>
<script src="{{ asset('bower_components') }}/nprogress/nprogress.js"></script>

@yield('scriptbottom')
@include('layouts.pjax')
<script !src="">
    $(document).ready(function () {
        NProgress.start();
    });
    window.onload = function () {
        NProgress.done();
    };
    $(function () {
        $.material.init();
        var jokes = [
            "我只想让他弹出来玩一玩,没有其他的意思😂",
            "My heart is almost collapsed at the moment.😂",
            "My fault?",
            "Important things are to be repeated for 3 times.😂",
            "But it is of no damn use.",
            "F**k off your sleep, rock up and let's have fun!😂",
            "The ugly are asleep, while the handsome are awake.😂",
            "He wastes his beautiful face by making a living by his talent.😂",
        ];
        var seed = Math.floor(Math.random() * 6)
        btn.setAttribute('data-content', jokes[seed]);
        btn.click();
    });
</script>

@yield('scriptcode')
</body>
</html>