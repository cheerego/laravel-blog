<div class="row">

    <div class="col-md-8">


        <div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <ul class="nav nav-pills">
                        <li class="disabled"><a class="btn btn-sm">{{ $detail->title }}</a></li>
                        <li class="navbar-right">
                            @if(Auth::check())
                                <span style="float: right">
                            @if(is_null($detail->deleted_at))
                                        <a class="btn btn-sm" href="{{ url('articles/softdelete/'.$detail->id) }}" >Delete</a>
                                    @else
                                        <a class="btn btn-sm" href="{{ url('articles/reactivate/'.$detail->id) }}" >{{ $detail->deleted_at->diffForHumans() }}</a>
                                    @endif

                                    <a href="{{ url('articles/'.$detail->id.'/edit') }}" class="btn btn-sm">Edit</a>
                        </span>
                            @endif
                        </li>
                    </ul>

                </div>


            </div>
            <div class="panel-body">
                {!! $detail->html !!}
            </div>
            <div class="panel-footer">
                <p>
                    <span style="float: right"><i class="fa fa-user" aria-hidden="true"> {{ $detail->author }}</i></span>
                    &nbsp;&nbsp;
                    <span style="float: left">
                            <i class="fa fa-clock-o"> {{$detail->created_at->diffForHumans()}}</i>
                        @foreach($detail->tags as $tag )
                            <i class="fa fa-tag">{{$tag->name}}</i>
                        @endforeach
                            <i class="fa fa-folder"> {{$detail->category->name}}</i>
                        </span>

                </p>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        @include('layouts.articlesilder',['articles'=>$articles,'categorys'=>$categorys])
    </div>
</div>