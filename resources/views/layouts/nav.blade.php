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