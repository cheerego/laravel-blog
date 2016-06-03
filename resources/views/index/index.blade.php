@extends('layouts.layout')

@section('content')
    <div class="row">
        <!--1-->
        <div class="col-md-4">
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><strong>Welcome!</strong></h4>
                <p>Hope this can help you!</p>
            </div>

            <div class="alert alert-dismissible alert-inverse">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><strong>Simple Introduction:</strong></h4>
                <p>This blog focuses on web technology.</p>
                <p><strong>Include:</strong></p>
                <p>Php & Php Framework & C for PHP Extension</p>
                <p>Lamp Lnmp</p>
                <p>Javascript</p>
            </div>

            <div class="alert alert-dismissible alert-primary">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4><strong>Hope & Wish:</strong></h4>
                <p><strong>First:</strong></p>
                <p>Writing this blog well by Laravel</p>
                <p><strong>Second:</strong></p>
                <p>Studying English is a important thing for me!</p>
                <p><strong>Third:</strong></p>
                <p>Writing a beautiful web,improving Javascrip & Css !(Without framework I am a noob,the web is very
                    ugly)</p>
                <p><strong>Fourth:</strong></p>
                <p>Front end is important, MV* & Task Runner too. </p>
            </div>
        </div>
        <!--1-->

        <!--2-->
        <div class="col-md-4">

            @include('layouts.articlesilder',['articles'=>$articles,'categorys'=>$categorys])
        </div>
        <!--2-->

        <!--3-->
        <div class="col-md-4">

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">About me</h3>
                </div>
                <div class="panel-body">
                    <p>I'm majoring in Computer Science & Technology,I love this subject.</p>
                    <p>As Linus said,code for fun,I love to code and try.</p>
                    <p>Laruence is my idol.</p>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Weibo</h3>
                </div>
                <div class="panel-body">
                    <iframe width="100%" height="250" class="share_self" frameborder="0" scrolling="no"
                            src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=250&fansRow=1&ptype=1&speed=0&skin=9&isTitle=1&noborder=1&isWeibo=1&isFans=1&uid=1767872324&verifier=9062046f&dpc=1"></iframe>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Follow me</div>
                <div class="panel-body text-center">
                    <a href="http://www.baidu.com"><i class="fa fa-github fa-3x fa-spin"></i></a>
                    <a href=""><i class="fa fa-weibo fa-3x fa-spin"></i></a>
                </div>
            </div>
            <!--3-->
        </div>
    </div>
@endsection

