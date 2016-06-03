<div class="row">


    <div class="col-md-8">
        @foreach($particles as $a)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><a class="pjax"
                                               href="{{ url('detail',[$a->id]) }}">{{ $a->title }}</a></h3>
                </div>
                <div class="panel-body">
                    @if(str_contains($a->html,'<img'))
                        <p style="display: none">{!! preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', $a->html,$array) !!}</p>
                        <p>{!!   $array[0] !!}</p>
                        <p>{!! preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i','',$a->html)  !!}</p>
                    @else
                        {!! str_limit($a->html,100)  !!}
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