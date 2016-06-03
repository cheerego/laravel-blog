<script !src="">
    $(document).ready(function () {

        $(document).pjax('.pjax', '#container');
        $(document).pjax('a[rel=next]', '#container');
        $(document).on('pjax:send', function () {
            NProgress.start();
        })
        $(document).on('pjax:complete', function () {
            NProgress.done();
        })

    });
</script>