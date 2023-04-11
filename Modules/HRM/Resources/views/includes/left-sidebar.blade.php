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

            <!------------------------------------- Staff --------------------------------------------------->
            @can('middleware-passed', 'staff.teacher')
                @if (in_array('staff.teacher', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/staff*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/staff*']) }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Staff Mgmt
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @can('middleware-passed', 'staff.teacher')
                                @if (in_array('staff.teacher', auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('staff.teacher') }}"
                                           class="nav-link {{ isActive('admin/staff/teacher') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Teacher & Staff</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'staff.threshold')
                                @if (in_array('staff.threshold', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.threshold') }}"
                                           class="nav-link {{ isActive('admin/staff/threshold') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Threshold</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'staff.kpi')
                                @if (in_array('staff.kpi', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.kpi') }}" class="nav-link {{ isActive('admin/staff/kpi') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>kpi</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'staff.payslip')
                                @if (in_array('staff.payslip', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.payslip') }}"
                                           class="nav-link {{ isActive('admin/staff/payslip') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>PaySlip</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'staff.staff')
                                @if (in_array('staff.staff', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.staff') }}"
                                           class="nav-link {{ isActive('admin/staff/idCard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Design ID Card</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                        </ul>
                    </li>
                @endif
            @endcan


            <!----------------------------------- Student ---------------------------------------------------->
            @can('middleware-passed', 'student.list')
                <li class="nav-item has-treeview {{ isActive('admin/student*') }}">
                    <a href="#" class="nav-link {{ isActive('admin/student*') }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('middleware-passed', 'student.list')
                            <li class="nav-item">
                                <a href="{{ route('student.list') }}"
                                   class="nav-link {{ isActive('admin/students') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Students') }} </p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.testimonial')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.testimonial') }}"
                                   class="nav-link {{ isActive('admin/student/testimonial') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Testimonial</p>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.testimonial') }}"
                                   class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>TC</p>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.testimonial') }}"
                                   class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Concern Letter</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.transport')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.transport') }}"
                                   class="nav-link {{ isActive('admin/student/assign-transport') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Transport</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.designStudentCard')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.designStudentCard') }}"
                                   class="nav-link {{ isActive('admin/student/designStudentCard') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Design ID Card</p>
                                </a>
                            </li>
                            {{--                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                                <a href="{{ route('student.designStudentCard') }}"--}}
                            {{--                                   class="nav-link {{ isActive('admin/student/designStudentCard') }}">--}}
                            {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                    <p>Design ID Card 2</p>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                        @endcan
                        @can('middleware-passed', 'student.promotion')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.promotion') }}"
                                   class="nav-link {{ isActive('admin/student/promotion') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Promotion</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.tod')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.tod') }}"
                                   class="nav-link {{ isActive('admin/student/tod*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tod List</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.esif')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.esif') }}"
                                   class="nav-link {{ isActive('admin/student/esif*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>eSIF</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'student.images')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('student.images') }}"
                                   class="nav-link {{ isActive('admin/student/images*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Images</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <!---------------------------------- Attendance -------------------------------------------------->
            @can('middleware-passed', 'attendance.dashboard')
                @if (in_array('attendance.dashboard', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/attendance*','admin/holidays']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/attendance*','admin/holidays']) }}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Attendance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('middleware-passed', 'attendance.dashboard')
                                @if (in_array('attendance.dashboard', auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('attendance.dashboard') }}"
                                           class="nav-link {{ isActive('admin/attendance/dashboard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Dashboard') }}</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'leaveManagement.index')
                                <li class="nav-item">
                                    <a href="{{ route('leaveManagement.index') }}"
                                       class="nav-link {{ isActive('admin/attendance/leaveManagement') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Leave Management') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'leavePurpose.index')
                                <li class="nav-item">
                                    <a href="{{ route('leavePurpose.index') }}"
                                       class="nav-link {{ isActive('admin/attendance/leavePurpose') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Purpose</p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'attendance.holiday')
                                @if (in_array('attendance.holiday', auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('attendance.holiday') }}" class="nav-link {{ isActive('admin/holidays') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Calendar</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            <li class="nav-item has-treeview {{ isActive(['admin/attendance/setting','admin/attendance/weeklyOff']) }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Setting
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('middleware-passed', 'shift.index')
                                        @if (in_array('shift.index', auth()->user()->permissions))
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ route('shift.index') }}"
                                                   class="nav-link {{ isActive('admin/attendance/setting') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Attendance Setting</p>
                                                </a>
                                            </li>
                                        @endif
                                    @endcan
                                    @can('middleware-passed', 'weeklyOff.index')
                                        @if (in_array('weeklyOff.index', auth()->user()->permissions))
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ route('weeklyOff.index') }}"
                                                   class="nav-link {{ isActive('admin/attendance/weeklyOff') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Weekly Off</p>
                                                </a>
                                            </li>
                                        @endif
                                    @endcan
                                </ul>
                            </li>
                            @can('middleware-passed', 'attendance.student')
                                @if (in_array('attendance.student', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.student') }}"
                                           class="nav-link {{ isActive('admin/attendance/student') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Student Attendance</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'attendance.teacher')
                                @if (in_array('attendance.teacher', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.teacher') }}"
                                           class="nav-link {{ isActive('admin/attendance/teacher') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Teacher Attendance</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            @can('middleware-passed', 'attendance.report')
                                @if (in_array('attendance.report', auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.report') }}"
                                           class="nav-link {{ isActive('admin/attendance/report') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Monthly Report</p>
                                        </a>
                                    </li>
                                @endif
                            @endcan
                            {{--                                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                                                    <a href="{{ route('student.manuel-attendance') }}" class="nav-link ">--}}
                            {{--                                                        <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                                        <p>Manual Attendance</p>--}}
                            {{--                                                    </a>--}}
                            {{--                                                </li>--}}
                        </ul>
                    </li>
                @endif
            @endcan


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>