{!! HTML::script("/js/toastr.min.js") !!}

<script>
    $(document).ready(function(){

        toastr.options.timeOut = 7000;

        $('.toastr-success').each(function(){
            toastr.success($(this).html())
        });

        $('.toastr-error').each(function(){
            toastr.error($(this).html())
        });

        $('.toastr-info').each(function(){
            toastr.info($(this).html())
        });

    });
</script>