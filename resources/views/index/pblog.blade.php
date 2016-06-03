<div class="row">
    <div class="col-md-8">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Panel danger</h3>
            </div>
            <div class="panel-body">
                hehe
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">近期文章</h3>
            </div>
            <div class="panel-body">
                @if(count($articles) == 0)
                    还没有文章!
                @else
                    @foreach($articles as $article)
                        <a href=""><span style="float: left;">{{ $article->title }}</span></a>
                        <span style="float: right;">{{ $article->created_at->diffForHumans() }}</span><br>
                    @endforeach
                @endif


            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">分类目录</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Panel warning</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
</div>