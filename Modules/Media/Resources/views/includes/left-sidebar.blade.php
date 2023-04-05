<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano" id="style-1">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/') }}" class="d-block">{{ siteConfig('title') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
{{--            <li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">--}}
{{--                <a href="{{ action('Backend\DashboardController@index') }}" class="nav-link {{ isActive(['dashboard*','/']) }}">--}}
{{--                    <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                    <p> --}}
{{--                        Dashboard--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}

            <!-- Home -->
            <li class="nav-item has-treeview">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>

            <!------------------------------- Notice, Diary, Events --------------------------------------->
            @can('middleware-passed', 'notice.index')
                @if (in_array('notice.index', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/notice*', 'admin/event*','admin/diary-list','admin/events']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/notice*', 'admin/event*','admin/diary-list','admin/events']) }}">
                            <i class="fas fa-bullhorn"></i>
                            <p>
                                Notice
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @can('middleware-passed', 'notice.index')
                                @if (in_array('notice.index', auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('notice.index') }}"
                                           class="nav-link {{ isActive('admin/notices') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Notice & News</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                                @can('middleware-passed', 'notice-category.index')
                                    @if (in_array('notice-category.index', auth()->user()->permissions))
                                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ route('notice-category.index') }}"
                                               class="nav-link {{ isActive('admin/notice/category') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Notice Category</p>
                                            </a>
                                        </li>
                                    @endif
                                @endcan

                                @can('middleware-passed', 'diary.index')
                                    @if (in_array('diary.index', auth()->user()->permissions))
                                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ route('diary.index') }}" class="nav-link {{ isActive('admin/diary-list') }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Dairy List</p>
                                            </a>
                                        </li>
                                    @endif
                                @endcan
                                @can('middleware-passed', 'event.index')
                                    @if (in_array('event.index', auth()->user()->permissions))
                                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ route('event.index') }}"
                                               class="nav-link {{ isActive(['admin/events']) }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Upcoming Events</p>
                                            </a>
                                        </li>
                                    @endif
                                @endcan
                        </ul>
                    </li>
                @endif
            @endcan

            <!------------------------------- Syllabus --------------------------------------->
            @can('middleware-passed', 'syllabus.index')
                @if (in_array('syllabus.index', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/syllabus*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/syllabus*']) }}">
                            <i class="fas fa-book"></i>
                            <p>
                                Syllabus
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @can('middleware-passed', 'syllabus.index')
                                @if (in_array('syllabus.index', auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('syllabus.index') }}"
                                           class="nav-link {{ isActive('admin/syllabus/syllabus') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Syllabus Management</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                        </ul>
                    </li>
                @endif
            @endcan

            <!------------------------------- Communication --------------------------------------->
            <li class="nav-item has-treeview {{ isActive(['admin/communication*','admin/subscriber/list']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/communication*','admin/subscriber/list']) }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Communication
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('subscriber.list') }}"
                           class="nav-link {{ isActive('admin/subscriber/list') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Subscribers') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('communication.quick') }}"
                           class="nav-link {{ isActive('admin/communication/quick') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Quick SMS') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('communication.staff') }}"
                           class="nav-link {{ isActive('admin/communication/staff') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Staff SMS') }}</p>
                        </a>
                    </li>
                    @can('middleware-passed', 'communication.history')
                        <li class="nav-item">
                            <a href="{{ route('communication.history') }}"
                               class="nav-link {{ isActive('admin/communication/history') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMS History</p>
                            </a>
                        </li>
                    @endcan
                    @can('middleware-passed', 'communication.apiSetting')
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{ route('communication.apiSetting') }}"
                               class="nav-link {{ isActive('admin/communication/apiSetting') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> API Settings</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>