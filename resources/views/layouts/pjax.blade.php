<script !src="">
    $(document).ready(function () {
//        $.pjax({
//            selector: '.pjax',
//            show: 'slide',
//            container: '#container',
//            cache: false,
//            storage: false,
//            titleSuffix: '😜',
//            filter: function () {
//            },
//            callback: function () {
//            }
//        })
//        $('#container').bind('pjax.start', function(){
//            NProgress.start();
//        })
//        $('#container').bind('pjax.end', function(){
//            NProgress.done();
//        })
        $(document).pjax('.pjax', '#container');
        $(document).on('pjax:send', function() {
            NProgress.start();
        })
        $(document).on('pjax:complete', function() {
            NProgress.done();
        })

    });
</script>