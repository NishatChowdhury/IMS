<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WPM Office </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        .bx {
            text-align: center;
            border-radius: 14px;
            display: inline-block;
            justify-content: center;
            align-items: center;
            transition: .5s;
            padding: 0 4rem;
        }

        .bx:hover {
            /*background-color: #25252d;*/
            opacity: .3;
        }

        .torquise {
            background-color: #1abc9c;
            cursor: pointer;
        }

        .emerald {
            background-color: #2ecc71;
            cursor: pointer;
        }

        .peter-river {
            background-color: #3498db;
            cursor: pointer;
        }

        .amethyst {
            background-color: #9b59b6;
            cursor: pointer;
        }

        .wet-asphalt {
            background-color: #34495e;
            cursor: pointer;
        }

        .sun-flower {
            background-color: #f1c40f;
            cursor: pointer;
        }
        .carrot {
            background-color: #e67e22;
            cursor: pointer;
        }
        .alizarin {
            background-color: #e74c3c;
            cursor: pointer;
        }

        .city-light {
            background-color: #075f84;
            cursor: pointer;
        }

        .concrete {
            background-color: #95a5a6;
            cursor: pointer;
        }

        .fusion-red{
            background-color: #fc5c65;
            cursor: pointer;
        }

        .bx .icon {
            font-size: 65px;
        }

        .icon i {
            color: white;
        }

        .boxText {
            color: white;
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .bx{
                width: 450px;
                height: 250px;
                text-align: center;
                border-radius: 14px;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: .5s;
                margin-left: 30px;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="navbar navbar-expand bg-dark navbar-light border-bottom">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <img src="{{ asset('assets/img/logo-white.png') }}" width="100" alt="">
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown" style="margin-top:4px;">
                <a href="#" class="user dropdown-toggle" data-toggle="dropdown" style="margin:10px;">

                    <img src="{{ asset('dist/img/user.png') }}" style="height:33.33px; margin-right:5px;" class="img-circle elevation-2" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="background-color: #ffffff; padding: 5px; border-radius: 10px">
                    <li class="user-header">
                        <img class="user-hd-img"  src="{{ asset('dist/img/user.png') }}" class="img-cir" alt="User Image" style="text-align: center; max-height: 80px; margin:12px 31px 8px 37px;">
                        <p class="user-hd-text">
                            {{ strtoupper(Auth::user()->name) }} <br>
                            {{ Auth::user()->role_id }} <br>
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a class="text-white" href="#">Followers</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a class="text-white" href="#">Sales</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-4 text-center">--}}
                        {{--<a class="text-white" href="#">Friends</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left" style="margin: 10px 3px;">
                            <a href="{{ route('user.profile') }}" class="btn btn-success btn-flat">Profile</a>
                        </div>
                        <div class="pull-right" style="margin: 10px -2px;">
                            <a class="btn btn-danger btn-flat" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>--}}
{{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <section class="content">
        <div class="col-md-12">
            <div class="row">
                @foreach($apps as $app)
                    {{--                @can('apps','domain')--}}
                    <div class="col-md-2 d-flex justify-content-center" style="color:{{$app->color}};background:{{$app->background}}">
                        <a href="{{ route($app->prefix) }}">
                            <div class="bx">
                                <div class="icon">
                                    <i class="{{ $app->icon }}"></i>
                                </div>
                                <div class="boxText"><p><b>{{ $app->name }}</b></p></div>
                            </div>
                        </a>
                    </div>
                    {{--                @endcan--}}
                @endforeach
            </div>
        </div>
    </section>
    <!-- /.content-wrapper -->

    <footer class="main-footer m-0" style="position:fixed;bottom: 0;width: 100%">
        <strong>Copyright &copy; 2021-2022 <a href="https://adminlte.io">Web Point Limited</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>


    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- select 2 -->

@yield('script')
</body>

</html>