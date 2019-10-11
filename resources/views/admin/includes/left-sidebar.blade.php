<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">
                <a href="#" class="nav-link {{ isActive(['dashboard*','/']) }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{--<li class="nav-item {{ isActive(['widget*']) }}">--}}
                {{--<a href="#" class="nav-link {{ isActive('widgets') }}">--}}
                    {{--<i class="nav-icon fas fa-th"></i>--}}
                    {{--<p>--}}
                        {{--Widgets--}}
                        {{--<span class="right badge badge-danger">New</span>--}}
                    {{--</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item has-treeview {{ isActive(['chart*']) }}">
                <a href="#" class="nav-link {{ isActive(['chart*']) }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Admission
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('chart/chartjs') }}">

                            <p>Examinations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('chart/flot') }}">

                            <p>Applications</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('chart/inline-chart') }}">

                            <p>Results</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive('attendance*') }}">
                <a href="#" class="nav-link {{ isActive('attendance*') }}">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                        Attendance
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('attendance.dashboard') }}" class="nav-link {{ isActive('attendance/dashboard') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('attendance/setting') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('attendance/student') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('attendance/teacher') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teacher Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('attendance/report') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Report</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive('form*') }}">
                <a href="#" class="nav-link {{ isActive('form*') }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Student Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('form/general') }}">
                            <p>Students </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('form/advance') }}">
                            <p>Optional Subject </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('form/editor') }}">
                            <p>Testimonial</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('form/editor') }}">
                            <p>Design ID Card</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['table*']) }}">
                <a href="#" class="nav-link {{ isActive(['table*']) }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Institution Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('table/simple') }}">
                            <p>Academic Year</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('table/data') }}">
                            <p>Classes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('table/data') }}">
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('table/data') }}">
                            <p>Profile</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{--<li class="nav-header">EXAMPLES</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a href="#" class="nav-link {{ isActive('calendar') }}">--}}
                    {{--<i class="nav-icon fas fa-calendar-alt"></i>--}}
                    {{--<p>--}}
                        {{--Calendar--}}
                        {{--<span class="badge badge-info right">2</span>--}}
                    {{--</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="nav-item has-treeview {{ isActive(['mailbox*']) }}">
                <a href="#" class="nav-link {{ isActive(['mailbox*']) }}">
                    <i class="nav-icon fas fa-diagnoses"></i>
                    <p>
                        Exam Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('mailbox/inbox') }}">
                            <p>Grade System </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('mailbox/compose') }}">
                            <p>Examinations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('mailbox/read') }}">

                            <p>Exam Results</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('mailbox/read') }}">

                            <p>Generate Final Result</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['page*']) }}">
                <a href="#" class="nav-link {{ isActive(['page*']) }}">
                    <i class="nav-icon fas fa-money-check-alt"></i>
                    <p>
                        Finance
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('page/invoice') }}">

                            <p>Invoice</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['extra*']) }}">
                <a href="#" class="nav-link {{ isActive(['extra*']) }}">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Staff Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">

                            <p>Error 404</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">

                            <p>Error 500</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">

                            <p>Blank Page</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a href="{{ action('ExtraController@starter') }}" class="nav-link {{ isActive('extra/starter') }}">--}}
                            {{--<i class="far fa-circle nav-icon"></i>--}}
                            {{--<p>Starter Page</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['extra*']) }}">
                <a href="#" class="nav-link {{ isActive(['extra*']) }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Communication
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">

                            <p>Error 404</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">

                            <p>Error 500</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">

                            <p>Blank Page</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a href="{{ action('ExtraController@starter') }}" class="nav-link {{ isActive('extra/starter') }}">--}}
                    {{--<i class="far fa-circle nav-icon"></i>--}}
                    {{--<p>Starter Page</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['extra*']) }}">
                <a href="#" class="nav-link {{ isActive(['extra*']) }}">
                    <i class="nav-icon far fa-scroll"></i>
                    <p>
                        Reports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">

                            <p>Profit and Loss </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">

                            <p>Balance Sheet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">
                            <p>Annual Payments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">
                            <p>Fee Collection</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a href="{{ action('ExtraController@starter') }}" class="nav-link {{ isActive('extra/starter') }}">--}}
                    {{--<i class="far fa-circle nav-icon"></i>--}}
                    {{--<p>Starter Page</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['extra*']) }}">
                <a href="#" class="nav-link {{ isActive(['extra*']) }}">
                    <i class="nav-icon far fa-shapes"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">
                            <p>Site Basic Info </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">
                            <p>Notice Mgmt </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">

                            <p>Image Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">

                            <p>Page Mgmt</p>
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a href="{{ action('ExtraController@starter') }}" class="nav-link {{ isActive('extra/starter') }}">--}}
                    {{--<i class="far fa-circle nav-icon"></i>--}}
                    {{--<p>Starter Page</p>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            {{--<li class="nav-header">MISCELLANEOUS</li>--}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>SC Invoices</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Activities</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-life-ring"></i>
                    <p>Need Helps?</p>
                </a>
            </li>
            {{--<li class="nav-header">LABELS</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a href="#" class="nav-link">--}}
                    {{--<i class="nav-icon far fa-circle text-danger"></i>--}}
                    {{--<p class="text">Important</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a href="#" class="nav-link">--}}
                    {{--<i class="nav-icon far fa-circle text-warning"></i>--}}
                    {{--<p>Warning</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a href="#" class="nav-link">--}}
                    {{--<i class="nav-icon far fa-circle text-info"></i>--}}
                    {{--<p>Informational</p>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
