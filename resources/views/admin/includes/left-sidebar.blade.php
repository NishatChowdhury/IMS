<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">WPIMS</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{url('/')}}" class="d-block">{{ siteConfig('title') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">
                <a href="{{ action('DashboardController@index') }}" class="nav-link {{ isActive(['dashboard*','/']) }}">
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
            @cannot('cms')
            <li class="nav-item has-treeview {{ isActive(['chart*']) }}">
                <a href="#" class="nav-link {{ isActive(['chart*']) }}">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Admission
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('chart/chartjs') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Examinations</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('chart/flot') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Applications</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('chart/inline-chart') }}">
                            <i class="far fa-circle nav-icon"></i>
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
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{ route('attendance.dashboard') }}" class="nav-link {{ isActive('attendance/dashboard') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('ShiftController@index') }}" class="nav-link {{ isActive('attendance/setting') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ route('attendance.student')}}" class="nav-link {{ isActive('attendance/student') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ route('attendance.teacher')}}" class="nav-link {{ isActive('attendance/teacher') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teacher Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ route('attendance.report') }}" class="nav-link {{ isActive('attendance/report') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Report</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive('student*') }}">
                <a href="#" class="nav-link {{ isActive('student*') }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                        Student Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{ action('StudentController@index') }}" class="nav-link {{ isActive('students') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Students </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('form/advance') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Optional Subject </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('form/editor') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('form/editor') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Design ID Card</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['institution*']) }}">
                <a href="#" class="nav-link {{ isActive(['institution*']) }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Institution Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{route('institution.academicyear')}}" class="nav-link {{ isActive('institution/academicyear') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Academic Year</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.classes')}}" class="nav-link {{ isActive('institution/classes') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Classes</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('section.group')}}" class="nav-link {{ isActive('institution/section-groups') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sections $ Groups</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.subjects')}}" class="nav-link {{ isActive('institution/subjects') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.classsubjects')}}" class="nav-link {{ isActive('institution/classsubjects') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Class Subjects</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.profile')}}" class="nav-link {{ isActive('institution/profile') }}">
                            <i class="far fa-circle nav-icon"></i>
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
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{route('exam.gradesystem')}}" class="nav-link {{ isActive('exam/gradesystem') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Grade System </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('exam.examination')}}" class="nav-link {{ isActive('exam/examination') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Examinations</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('exam.examitems')}}" class="nav-link {{ isActive('exam/examitems') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Exam Schedules</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('mailbox/read') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Exam Results</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('mailbox/read') }}">
                            <i class="far fa-circle nav-icon"></i>
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
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('page/invoice') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Invoice</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['staff*']) }}">
                <a href="#" class="nav-link {{ isActive(['staff*']) }}">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        Staff Mgmt
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{route('staff.teacher')}}" class="nav-link {{ isActive('staff/teacher') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teacher</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('staff.addstaff')}}" class="nav-link {{ isActive('staff/staffadd') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Staff Add</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('staff.threshold')}}" class="nav-link {{ isActive('staff/threshold') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Threshold</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('staff.kpi')}}" class="nav-link {{ isActive('staff/kpi') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>kpi</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('staff.payslip')}}" class="nav-link {{ isActive('staff/payslip') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PaySlip</p>
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
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 404</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Error 500</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">
                            <i class="far fa-circle nav-icon"></i>
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
                    <i class="nav-icon fas fa-scroll"></i>
                    <p>
                        Reports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"  style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('extra/404') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profit and Loss </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('extra/500') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Balance Sheet</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Annual Payments</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="#" class="nav-link {{ isActive('extra/blank') }}">
                            <i class="far fa-circle nav-icon"></i>
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
            @endcannot
            <li class="nav-item has-treeview {{ isActive(['settings*','page*','site*','slider*']) }}">
                <a href="#" class="nav-link {{ isActive(['settings*','page*','site*','slider*']) }}">
                    <i class="fas fa-shapes"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item">
                        <a href="{{ action('SiteInformationController@index') }}" class="nav-link {{ isActive('siteinfo') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Site Basic Info </p>
                        </a>
                    </li>
                    {{--<li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                        {{--<a href="{{ action('NoticeController@index') }}" class="nav-link {{ isActive('notices') }}">--}}
                            {{--<i class="far fa-circle nav-icon"></i>--}}
                            {{--<p>Notice Management </p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('PageController@index') }}" class="nav-link {{ isActive('pages') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Page Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('SliderController@index') }}" class="nav-link {{ isActive('sliders') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['notice*']) }}">
                <a href="#" class="nav-link {{ isActive(['notice*']) }}">
                    <i class="fas fa-bullhorn"></i>
                    <p>
                        Notice
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ action('NoticeController@index') }}" class="nav-link {{ isActive('notices') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Management</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('NoticeCategoryController@index') }}" class="nav-link {{ isActive('notice/category') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Category</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('NoticeTypeController@index') }}" class="nav-link {{ isActive('notice/type') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Type</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['gallery*']) }}">
                <a href="#" class="nav-link {{ isActive(['gallery*']) }}">
                    <i class="fas fa-camera-retro"></i>
                    <p>
                        Gallery
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ action('GalleryController@index') }}" class="nav-link {{ isActive('gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('GalleryCategoryController@index') }}" class="nav-link {{ isActive('gallery/category') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Category</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('AlbumController@index') }}" class="nav-link {{ isActive('gallery/albums') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Album</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{--<li class="nav-header">MISCELLANEOUS</li>--}}
            @cannot('cms')
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
            @endcannot
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
