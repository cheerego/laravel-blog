<div class="row">


    <div class="col-md-8">
        @foreach($particles as $a)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div>
                        <a class="pjax btn btn-sm" href="{{ url('detail',[$a->id]) }}">{{ $a->title }}</a>
                        <span>
                            <i class="fa fa-clock-o">{{$a->created_at->diffForHumans()}}</i>
                            <i class="fa fa-tag"></i>
                            <i class="fa fa-folder">{{$a->category->name}}</i>
                        </span>
                    </div>
                </div>
                <div class="panel-body">
                    @if(str_contains($a->html,'<img'))
                        <p style="display: none">{!! preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $a->html,$array) !!}</p>
                        <p>{!!   $array[0] !!}</p>
                        <p>{!!str_limit(strip_tags(preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i','',$a->html)),120) !!}</p>
                    @else
                        {{ str_limit(strip_tags($a->html),120) }}
                    @endif

                </div>
            </div>
        @endforeach
        {!! $particles->render() !!}
    </div>


    <div class="col-md-4">
        @include('layouts.articlesilder',['articles'=>$articles,'categorys'=>$categorys])

    </div>
</div>