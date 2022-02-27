<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
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
                <a href="{{ action('Backend\DashboardController@index') }}" class="nav-link {{ isActive(['dashboard*','/']) }}">
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
                <li class="nav-item has-treeview {{ isActive(['admin/admission*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/admission*']) }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Admission
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('admission.exams')}}" class="nav-link {{ isActive('admission/exams') }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Examinations</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{ url('admin/admission/applicant') }}" class="nav-link {{ isActive('admin/admission/applicant') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Applicants (School)') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/admission/create') }}" class="nav-link {{ isActive('*/admission/create') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Create Admission') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Backend\AdmissionController@browseMeritList')}}" class="nav-link {{ isActive('admin/admission/browse-merit-list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Browse Merit List') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{action('Backend\AdmissionController@uploadMeritList')}}" class="nav-link {{ isActive('admin/admission/upload-merit-list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Upload Merit List') }}</p>
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

                        <li class="nav-item">
                            <a href="{{ action('Backend\LeaveManagementController@index') }}" class="nav-link {{ isActive('attendance/leaveManagement') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\LeavePurposeController@index') }}" class="nav-link {{ isActive('attendance/leavePurpose') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Purpose</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ isActive('attendance*') }}">
                            <a href="#" class="nav-link {{ isActive('attendance*') }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ route('attendance.holiday') }}" class="nav-link {{ isActive('attendance/report') }}">
                                        <i class="far nav-icon"></i>
                                        <p>Holiday Settings</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ action('ShiftController@index') }}" class="nav-link {{ isActive('attendance/setting') }}">
                                        <i class="far nav-icon"></i>
                                        <p>Attendance Setting</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ action('WeeklyOffController@index') }}" class="nav-link {{ isActive('attendance/weeklyOff') }}">
                                        <i class="far nav-icon"></i>
                                        <p>Weekly Off</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                        {{--                            <a href="{{ action('ShiftController@index') }}" class="nav-link {{ isActive('attendance/setting') }}">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>Setting</p>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
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
            @endcannot

            @cannot('cms')
                {{--            library management starts here--}}
                <li class="nav-item has-treeview {{ isActive('admin/library*') }}">
                    <a href="#" class="nav-link {{ isActive('admin/library*') }}">
                        {{--                    <i class="nav-icon fas fa-user-graduate"></i>--}}
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Library Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="{{ action('Backend\BookCategoryController@index') }}" class="nav-link {{ isActive('admin/library/bookCategory') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Book Category </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\BookController@add') }}" class="nav-link {{ isActive('admin/library/books/add') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Books </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\BookController@show') }}" class="nav-link {{ isActive('admin/library/allBooks') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\BookController@returnBook') }}" class="nav-link {{ isActive('admin/library/return_books') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Return Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\BookController@report') }}" class="nav-link {{ isActive('admin/library/report') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--            library management ends here--}}
            @endcannot


            <li class="nav-item has-treeview {{ isActive('admin/student*') }}">
                <a href="#" class="nav-link {{ isActive('admin/student*') }}">
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
                        <a href="{{ action('StudentController@optional') }}" class="nav-link {{ isActive('student/optional') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Optional Subject </p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('student.testimonial')}}" class="nav-link {{ isActive('student/testimonial') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('IdCardController@index') }}" class="nav-link {{ isActive('student/designStudentCard') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Design ID Card</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('student.promotion')}}" class="nav-link {{ isActive('student/promotion') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Promotion</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('StudentController@tod') }}" class="nav-link {{ isActive('admin/student/tod*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tod List</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('StudentController@esif') }}" class="nav-link {{ isActive('admin/student/esif*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>eSIF</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('StudentController@images') }}" class="nav-link {{ isActive('admin/student/images*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Images</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['admin/institution*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/institution*']) }}">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Institution Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('institution.academicyear')}}" class="nav-link {{ isActive('admin/institution/academicyear') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Sessions') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('institution.classes')}}" class="nav-link {{ isActive('admin/institution/class') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Classes') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('section.group')}}" class="nav-link {{ isActive('admin/institution/section-groups') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Sections & Groups') }}</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.academicClasses')}}" class="nav-link {{ isActive('admin/institution/academic-class') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Academic Classes') }}</p>
                        </a>
                    </li>

                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{route('institution.subjects')}}" class="nav-link {{ isActive('institution/subjects') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\InstitutionController@signature') }}" class="nav-link {{ isActive('institution/signature') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Signature</p>
                        </a>
                    </li>

                    {{--                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                    {{--                        <a href="{{route('institution.profile')}}" class="nav-link {{ isActive('institution/profile') }}">--}}
                    {{--                            <i class="far fa-circle nav-icon"></i>--}}
                    {{--                            <p>Profile</p>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
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
            @cannot('cms')
                <li class="nav-item has-treeview {{ isActive(['exam*']) }}">
                    <a href="#" class="nav-link {{ isActive(['exam*']) }}">
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
                                <p>{{ __('Grade System')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\ExamController@admitCard') }}" class="nav-link {{ isActive('exam/admit-card') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admit Card</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('exam.examination')}}" class="nav-link {{ isActive('exam/examination') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Examinations</p>
                            </a>
                        </li>
                        {{--<li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                        {{--<a href="{{route('exam.examitems')}}" class="nav-link {{ isActive('exam/examitems') }}">--}}
                        {{--<i class="far fa-circle nav-icon"></i>--}}
                        {{--<p>Exam Schedules</p>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('exam.examresult')}}" class="nav-link {{ isActive('exam/examresult') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam Results</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('exam.setfinalresultrule')}}" class="nav-link {{ isActive('exam/setfinalresultrule') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generate Final Result</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('exam.getfinalresultrule')}}" class="nav-link {{ isActive('exam/getfinalresultrule') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Final Result</p>
                            </a>
                        </li>

                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('exam.tabulationSheet')}}" class="nav-link {{ isActive('exam/tabulationSheet') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabulation Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ isActive(['admin/fee*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/fee*']) }}">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            {{ __('Tuition Fee') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="{{route('fee-category.index')}}" class="nav-link {{ isActive('admin/fee-category/index') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Fee Category') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/fee/fee-setup') }}" class="nav-link {{ isActive('admin/fee/fee-setup') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Fee Setup') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/fee/fee-setup/view') }}" class="nav-link {{ isActive('admin/fee/fee-setup/view') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Fee View') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/fee/fee-collection') }}" class="nav-link {{ isActive('fee/fee-collection') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Fee Collection') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/fee/all-collections') }}" class="nav-link {{ isActive('fee/all-collections') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Fee Collection Report') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('transport.index')}}" class="nav-link {{ isActive('fee-category/transport') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transport Location</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('transport.student-list')}}" class="nav-link {{ isActive('fee-category/transport') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transport Fee Assign</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*']) }}">
                    <a href="#" class="nav-link {{ isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*']) }}">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="{{route('student.fee')}}" class="nav-link {{ isActive('fee-category/student') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Fee Collection</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\ChartOfAccountController@index') }}" class="nav-link {{ isActive('admin/coa') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chart of Accounts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\JournalController@index') }}" class="nav-link {{ isActive('admin/journals') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Journal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\JournalController@classic') }}" class="nav-link {{ isActive('admin/journal/classic') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Journal Classic</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ action('AccountingController@cashBook') }}" class="nav-link {{ isActive('admin/cash-book') }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Cash Book</p>--}}
{{--                            </a>--}}
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\AccountingController@ledger') }}" class="nav-link {{ isActive('admin/ledger') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ledger</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\AccountingController@trialBalance') }}" class="nav-link {{ isActive('admin/trial-balance') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trial Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\AccountingController@profitNLoss') }}" class="nav-link {{ isActive('admin/profit-n-loss') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit & Loss</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ action('Backend\AccountingController@balanceSheet') }}" class="nav-link {{ isActive('admin/balance-sheet') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Sheet</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ isActive(['communication*']) }}">
                    <a href="#" class="nav-link {{ isActive(['communication*']) }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Communication
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        <li class="nav-item">
                            <a href="{{route('communication.quick')}}" class="nav-link {{ isActive('communication/quick') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quick SMS</p>
                            </a>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="{{route('communication.student')}}" class="nav-link {{ isActive('communication/student') }}">--}}
                        {{--                                <i class="far fa-circle nav-icon"></i>--}}
                        {{--                                <p>Student SMS</p>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('communication.staff')}}" class="nav-link {{ isActive('communication/staff') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff SMS</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('communication.history')}}" class="nav-link {{ isActive('communication/history') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMS History</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{route('communication.apiSetting')}}" class="nav-link {{ isActive('communication/apiSetting') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> API Settings</p>
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
                            <a href="{{ action('Backend\ReportController@student_fee_report') }}" class="nav-link {{ isActive('extra/blank') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fee Collection</p>
                            </a>
                        </li>
                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                            <a href="{{ action('Backend\ReportController@student_monthly_fee_report') }}" class="nav-link {{ isActive('extra/blank') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monthly Fee Report</p>
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
            <li class="nav-item has-treeview {{ isActive(['admin/menus*','admin/pages*']) }}">
                <a href="#" class="nav-link {{ isActive(['cms*']) }}">
                    <i class="fas fa-tasks"></i>
                    <p>
                        CMS
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\MenuController@index') }}" class="nav-link {{ isActive('admin/menus') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Site Menu</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\PageController@index') }}" class="nav-link {{ isActive('admin/pages') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Page Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ isActive('attendance*') }}">
                        <a href="#" class="nav-link {{ isActive('attendance*') }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Frontend Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            <li class="nav-item">
                                <a href="{{ action('Backend\SiteInformationController@index') }}" class="nav-link {{ isActive('siteinfo') }}">
                                    <i class="far nav-icon"></i>
                                    <p>Site Basic Info </p>
                                </a>
                            </li>
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\FeatureController@index') }}" class="nav-link {{ isActive('pages') }}">
                                    <i class="far nav-icon"></i>
                                    <p>Feature</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\SliderController@index') }}" class="nav-link {{ isActive('sliders') }}">
                                    <i class="far nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\LinkController@index') }}" class="nav-link {{ isActive('settings/links') }}">
                                    <i class="far nav-icon"></i>
                                    <p>Important Links</p>
                                </a>
                            </li>
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\SocialController@index') }}" class="nav-link {{ isActive('socials') }}">
                                    <i class="far nav-icon"></i>
                                    <p>Social Links</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['settings*','page*','site*','slider*','social*','calender*','theme','attendance']) }}">
                <a href="#" class="nav-link {{ isActive(['settings*','page*','site*','slider*','social*','theme']) }}">
                    <i class="fas fa-shapes"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ route('setting.email') }}" class="nav-link {{ isActive('setting/email') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>E-mail Settings</p>
                        </a>
                    </li>
                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\AcademicCalenderController@index') }}" class="nav-link {{ isActive('calender') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Academic Calender</p>
                        </a>
                    </li>
                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('ThemeController@index') }}" class="nav-link {{ isActive('themes') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Theme</p>
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
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('IdCardController@staff') }}" class="nav-link {{ isActive('staff/idCard') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Design ID Card</p>
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
            <li class="nav-item has-treeview {{ isActive(['notice*','event*']) }}">
                <a href="#" class="nav-link {{ isActive(['notice*','event*']) }}">
                    <i class="fas fa-bullhorn"></i>
                    <p>
                        Notice
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ action('Backend\NoticeController@index') }}" class="nav-link {{ isActive('notices') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Management</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\NoticeCategoryController@index') }}" class="nav-link {{ isActive('notice/category') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Category</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\NoticeTypeController@index') }}" class="nav-link {{ isActive('notice/type') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Notice Type</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\NoticeCategoryController@index') }}" class="nav-link {{ isActive(['notices']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\UpcomingEventController@index') }}" class="nav-link {{ isActive(['event*']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Upcoming Events</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{--Syllabus Section Start babu--}}
            <li class="nav-item has-treeview {{ isActive(['syllabus*']) }}">
                <a href="#" class="nav-link {{ isActive(['syllabus*']) }}">
                    <i class="fas fa-book"></i>
                    <p>
                        Syllabus
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ route('syllabus.index') }}" class="nav-link {{ isActive('syllabus/syllabus') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Syllabus Management</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{--Syllabus Section End babu--}}

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
                        <a href="{{ action('Backend\GalleryController@index') }}" class="nav-link {{ isActive('gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Mgmt</p>
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\GalleryCategoryController@index') }}" class="nav-link {{ isActive('gallery/category') }}">
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
                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                        <a href="{{ action('Backend\PlaylistController@index') }}" class="nav-link {{ isActive('gallery/albums') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Playlists</p>
                        </a>
                    </li>
                    {{--                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                    {{--                        <a href="{{ action('VideoController@index') }}" class="nav-link {{ isActive('gallery/albums') }}">--}}
                    {{--                            <i class="far fa-circle nav-icon"></i>--}}
                    {{--                            <p>Videos</p>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
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
            <li class="nav-item has-treeview {{ isActive(['user*']) }}">
                <a href="#" class="nav-link {{ isActive(['user*']) }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ action('UserController@index') }}" class="nav-link {{ isActive('gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{--            <li class="nav-item has-treeview {{ isActive(['journals*']) }}">--}}
            {{--                <a href="#" class="nav-link {{ isActive(['journals*']) }}">--}}
            {{--                    <i class="fas fa-camera-retro"></i>--}}
            {{--                    <p>--}}
            {{--                        Accounting--}}
            {{--                        <i class="fas fa-angle-left right"></i>--}}
            {{--                    </p>--}}
            {{--                </a>--}}
            {{--                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">--}}
            {{--                    <li class="nav-item" >--}}
            {{--                        <a href="{{ route('journals.index') }}" class="nav-link {{ isActive('journals') }}">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>Journals</p>--}}
            {{--                        </a>--}}
            {{--                        <a href="{{ route('journals.create') }}" class="nav-link {{ isActive('journals/create') }}">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>Add Journal</p>--}}
            {{--                        </a>--}}
            {{--                        <a href="{{ route('balance_sheet') }}" class="nav-link {{ isActive('balance-sheet') }}">--}}
            {{--                            <i class="far fa-circle nav-icon"></i>--}}
            {{--                            <p>Balance Sheet</p>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

            <li class="nav-item">
                <a href="{{ route('admin.backup') }}" class="nav-link">
                    <i class="nav-icon fas fa-life-ring"></i>

                    <p>{{ __('Database Backup') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-life-ring"></i>

                    <p>Need Helps?</p>
                </a>
            </li>


            {{--            <li class="nav-item">--}}
            {{--                <a href="{{ route('message.index') }}" class="nav-link {{ isActive('gallery/albums') }}">--}}
            {{--                    <i class="nav-icon far fa-envelope"></i>--}}
            {{--                    <p>Messages</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
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
