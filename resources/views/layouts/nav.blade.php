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
                <a class="navbar-brand" href="{{ url('/') }}">Littlest</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="pjax" href="{{ url('blog') }}" >Blog</a></li>
                    <li><a class="pjax" href="javascript:void(0)">Toys</a></li>
                    <li><a class="pjax" href="javascript:void(0)">Message<span class="badge">3</span></a></li>
                    <li><a class="pjax" href="{{ url('aboutme') }}">About me</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @if(Auth::check())
                        <a href="{{ url('/dashboard') }}">
                            {{ Auth::user()->name }}
                        </a>
                        @endif
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)"
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