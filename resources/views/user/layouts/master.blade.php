<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer - Start Bootstrap Theme</title>
    @include('user.includes.css')
</head>
<body id="page-top">
<!-- Navigation-->
@include('user.includes.nav')
<!-- Masthead-->
@include('user.includes.header')
<!-- Portfolio Section-->
@yield('content')
<!-- Footer-->
@include('user.includes.footer')



@include('user.includes.js')

</body>
</html>

