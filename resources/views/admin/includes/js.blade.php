<!-- Bootstrap core JavaScript-->
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>--}}
{{--<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('backend/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('backend/js/demo/chart-pie-demo.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset(asset('backend/js/demo/datatables-demo.js')) }}"></script>

<!-- validator js -->
{{--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
<script src="{{ asset('backend/js/validate.min.js') }}"></script>

<!--Vue js -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
@stack('js')
