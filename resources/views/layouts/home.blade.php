<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link href="//apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components') }}/bootstrap/dist/css/bootstrap.css">
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
<body>
<header style="margin-top: 2px">
    <div class="navbar navbar-info ">
        <div class="container-fluid margin">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="javascript:void(0)">Littlest</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:void(0)">Blog</a></li>
                    <li><a href="javascript:void(0)">Toys</a></li>
                    <li><a href="javascript:void(0)">Message<span class="badge">3</span></a></li>
                    <li><a href="javascript:void(0)">About me</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="disabled">
                        <a href="javascript:void(0)">
                            @if(Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html"
                           data-target="#" class="dropdown-toggle" data-toggle="dropdown">More...
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Github</a></li>
                            <li><a href="javascript:void(0)">Sina Weibo</a></li>
                            <li><a href="javascript:void(0)">Segmentfault</a></li>
                            <li><a href="{{ action('Auth\AuthController@login') }}">Login</a></li>
                            <li><a href="{{ action('Auth\AuthController@logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control col-sm-8" placeholder="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<div class="row">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="active"><a href="{{ url('home') }}">功能</a></li>
            <li><a href="{{ url('articles/create') }}  ">撰写文章</a></li>
            <li><a href="javascript:void(0)">文章列表</a></li>
            <li><a href="javascript:void(0)">文章列表</a></li>
        </ul>

    </div>
    <div class="col-md-9">@yield('content')</div>
</div>


<button style="display: none" id="btn" type="button" class="btn btn-default"
        data-content="我只想让他弹出来玩一玩,没有其他的意思😂" data-toggle="snackbar" data-timeout="0">Show snackbar
</button>
<script src="{{ asset('bower_components') }}/jquery/dist/jquery.js"></script>
<script src="{{ asset('bower_components') }}/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('bower_components') }}/bootstrap-material-design/dist/js/material.js"></script>
<script src="{{ asset('bower_components') }}/bootstrap-material-design/dist/js/ripples.js"></script>
<script src="{{ asset('bower_components') }}/snackbarjs/dist/snackbar.min.js"></script>
<script src="{{ asset('bower_components') }}/nprogress/nprogress.js"></script>
<script src="{{ asset('bower_components') }}/nprogress/nprogress.js"></script>
<script !src="">
    $(document).ready(function () {
        NProgress.start();
    });
    window.onload = function () {
        NProgress.done(false);
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
@yield('scriptbottom')
@yield('scriptcode')
</body>
</html>