<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script>
    $("document").ready(function (){
        setTimeout(function (){
            $('.alert').fadeOut('slow');
        },3000);
    });
</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
{{--<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>--}}
