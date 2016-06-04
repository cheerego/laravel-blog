<div class="row">

    <div class="col-md-8">


        <div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <span>{{ $detail->title }}</span>
                    @if(Auth::check())
                        <span style="float: right">
                            Category:{{ $detail->category->name }}
                            @if(is_null($detail->deleted_at))
                                <a href="{{ url('articles/softdelete/'.$detail->id) }}" class=" btn-link " >Delete</a>
                            @else
                                <a href="{{ url('articles/reactivate/'.$detail->id) }}" class=" btn-link " >{{ $detail->deleted_at->diffForHumans() }}</a>
                            @endif

                            <a href="{{ url('articles/'.$detail->id.'/edit') }}" class="btn-link">Edit</a>
                        </span>
                    @endif
                </div>


            </div>
            <div class="panel-body">
                {!! $detail->html !!}
            </div>
            <div class="panel-footer">
                <p>
                    <span style="float: right">Author:{{ $detail->author }}</span>
                    &nbsp;&nbsp;
                    <span style="float: left">Created At:{{ $detail->created_at->diffForHumans() }}</span>

                </p>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        @include('layouts.articlesilder',['articles'=>$articles,'categorys'=>$categorys])
    </div>
</div>