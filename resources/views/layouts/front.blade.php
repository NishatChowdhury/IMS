<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Title-->
    <title>Complete education theme for School, College, University, E-learning</title>

    <!-- SEO Meta-->
    <meta name="description" content="Education theme by EchoTheme">
    <meta name="keywords" content="HTML5 Education theme, responsive HTML5 theme, bootstrap 4, Clean Theme">
    <meta name="author" content="education">

    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico">
    <link rel="shortcut icon" href="assets/img/favicon/114x114.png">
    <link rel="apple-touch-icon-precomposed" href="assets/img/favicon/96x96.png">


    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/fonts/themify-icons/css/themify-icons.css">


    <!-- stylesheet-->
    <link rel="stylesheet" href="assets/css/vendors.bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

{{--<nav class="ec-nav bg-white">--}}
    {{--@include('front.inc.header')--}}
{{--</nav> <!-- END ec-nav -->--}}

<header class="site-header bg-dark text-white-0_5">
    @include('front.inc.info-bar')
</header><!-- END site header-->



<nav class="ec-nav sticky-top bg-white">
    @include('front.inc.menu')
</nav> <!-- END ec-nav -->

{{--<div class="site-search">--}}
    {{--<div class="site-search__close bg-black-0_8"></div>--}}
    {{--<form class="form-site-search" action="#" method="POST">--}}
        {{--<div class="input-group">--}}
            {{--<input type="text" placeholder="Search" class="form-control py-3 border-white" required="">--}}
            {{--<div class="input-group-append">--}}
                {{--<button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div> <!-- END site-search-->--}}






@yield('content')


<footer class="site-footer">
    @include('front.inc.footer-top')
    @include('front.inc.footer-bottom')
</footer> <!-- END site-footer -->


<div class="scroll-top">
    <i class="ti-angle-up"></i>
</div>

<script src="assets/js/vendors.bundle.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>