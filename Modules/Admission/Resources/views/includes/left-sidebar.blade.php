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

            <!------------------------------------- Admission  --------------------------------------------------->
            @can('middleware-passed', 'online.onlineApplyIndex')
                @if (in_array('online.onlineApplyIndex', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/admission*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/admission*']) }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                {{ __('Admission') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admission.exams')}}" class="nav-link {{ isActive('admission/exams') }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Examinations</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            @can('middleware-passed', 'online.onlineApplyIndex')
                                <li class="nav-item">
                                    <a href="{{ url('admin/admission/create') }}"
                                       class="nav-link {{ isActive('*/admission/create') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Create Admission') }}</p>
                                    </a>
                                </li>
                            @endif
                            @can('middleware-passed', 'online-admission.index')
                                <li class="nav-item">
                                    <a href="{{ url('admin/admission/applicant') }}"
                                       class="nav-link {{ isActive('admin/admission/applicant') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Applicants (School)') }}</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('admission.browseMeritList') }}"
                                   class="nav-link {{ isActive('admin/admission/browse-merit-list') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Browse Merit List') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admission.uploadMeritList') }}"
                                   class="nav-link {{ isActive('admin/admission/upload-merit-list') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Upload Merit List') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endcan


            <!------------------------------------- Admission Register  ------------------------------------------>
            <li class="nav-item has-treeview {{ isActive(['admin/user*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/user*']) }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Admission register
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{ route('regligion-wise.report') }}"
                           class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Religion-wise Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('group-wise.report') }}"
                           class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Group-wise Report</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('create-custom.table') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p> Create Custome Table</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>