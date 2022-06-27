
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
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
{{--                    {{ Auth::user()->role_id }} <br>--}}
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
                    <a href="{{ action('Backend\UserController@profile') }}" class="btn btn-success btn-flat">Profile</a>
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
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fas fa-th-large"></i></a>
    </li>
</ul>