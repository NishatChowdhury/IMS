<!-- Brand Logo -->
<a href="{{ url('dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano" id="style-1">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" class="img-circle elevation-2"
                alt="User Image">
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
            <li class="nav-item has-treeview {{ isActive(['/', 'dashboard*']) }}">
                <a href="{{ action('Backend\DashboardController@index') }}"
                    class="nav-link {{ isActive(['dashboard*', '/']) }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item {{ isActive(['widget*']) }}"> --}}
            {{-- <a href="#" class="nav-link {{ isActive('widgets') }}"> --}}
            {{-- <i class="nav-icon fas fa-th"></i> --}}
            {{-- <p> --}}
            {{-- Widgets --}}
            {{-- <span class="right badge badge-danger">New</span> --}}
            {{-- </p> --}}
            {{-- </a> --}}
            {{-- </li> --}}
            @can('middleware-passed', 'online.onlineApplyIndex')
                {{--                @if (in_array('online.onlineApplyIndex', auth()->user()->permissions)) --}}
                <li class="nav-item has-treeview {{ isActive(['admin/admission*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/admission*']) }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            {{ __('Admission') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{--                        <li class="nav-item"> --}}
                        {{--                            <a href="{{route('admission.exams')}}" class="nav-link {{ isActive('admission/exams') }}"> --}}
                        {{--                                <i class="far fa-circle nav-icon"></i> --}}
                        {{--                                <p>Examinations</p> --}}
                        {{--                            </a> --}}
                        {{--                        </li> --}}
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
                                <a href="{{ action('Backend\AdmissionController@browseMeritList') }}"
                                    class="nav-link {{ isActive('admin/admission/browse-merit-list') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Browse Merit List') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('Backend\AdmissionController@uploadMeritList') }}"
                                    class="nav-link {{ isActive('admin/admission/upload-merit-list') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Upload Merit List') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @can('middleware-passed', 'attendance.dashboard')
                        {{--                    @if (in_array('attendance.dashboard', auth()->user()->permissions)) --}}
                        <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                            <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Attendance
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('middleware-passed', 'attendance.dashboard')
                                    {{--                            @if (in_array('attendance.dashboard', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('attendance.dashboard') }}"
                                            class="nav-link {{ isActive('admin/attendance/dashboard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Dashboard') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'leaveManagement.index')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\LeaveManagementController@index') }}"
                                            class="nav-link {{ isActive('admin/attendance/leaveManagement') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Leave Management') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'leavePurpose.index')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\LeavePurposeController@index') }}"
                                            class="nav-link {{ isActive('admin/attendance/leavePurpose') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Leave Purpose</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'attendance.holiday')
                                    {{--                                @if (in_array('attendance.holiday', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('attendance.holiday') }}" class="nav-link {{ isActive('admin/holidays') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Calendar</p>
                                        </a>
                                    </li>
                                @endcan
                                <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                                    <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            Setting
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">

                                        @can('middleware-passed', 'shift.index')
                                            {{--                                    @if (in_array('shift.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ action('Backend\ShiftController@index') }}"
                                                    class="nav-link {{ isActive('admin/attendance/setting') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Attendance Setting</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'weeklyOff.index')
                                            {{--                                        @if (in_array('weeklyOff.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ action('Backend\WeeklyOffController@index') }}"
                                                    class="nav-link {{ isActive('admin/attendance/weeklyOff') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Weekly Off</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);"> --}}
                                {{--                            <a href="{{ action('ShiftController@index') }}" class="nav-link {{ isActive('admin/attendance/setting') }}"> --}}
                                {{--                                <i class="far fa-circle nav-icon"></i> --}}
                                {{--                                <p>Setting</p> --}}
                                {{--                            </a> --}}
                                {{--                        </li> --}}
                                @can('middleware-passed', 'attendance.student')
                                    {{--                                @if (in_array('attendance.student', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.student') }}"
                                            class="nav-link {{ isActive('admin/attendance/student') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Student Attendance</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'attendance.teacher')
                                    {{--                                @if (in_array('attendance.teacher', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.teacher') }}"
                                            class="nav-link {{ isActive('admin/attendance/teacher') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Teacher Attendance</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'attendance.report')
                                    {{--                                @if (in_array('attendance.report', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('attendance.report') }}"
                                            class="nav-link {{ isActive('admin/attendance/report') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Monthly Report</p>
                                        </a>
                                    </li>
                                @endcan
                                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);"> --}}
                                {{--                            <a href="{{ route('student.manuel-attendance') }}" class="nav-link "> --}}
                                {{--                                <i class="far fa-circle nav-icon"></i> --}}
                                {{--                                <p>Manual Attendance</p> --}}
                                {{--                            </a> --}}
                                {{--                        </li> --}}
                            </ul>
                        </li>
                    @endcan

                    {{--            library management starts here --}}
                    @can('middleware-passed', 'bookCategory.index')
                        {{--                @if (in_array('bookCategory.index', auth()->user()->permissions)) --}}
                        <li class="nav-item has-treeview {{ isActive('admin/library*') }}">
                            <a href="#" class="nav-link {{ isActive('admin/library*') }}">
                                {{--                    <i class="nav-icon fas fa-user-graduate"></i> --}}
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Library
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'bookCategory.index')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\BookCategoryController@index') }}"
                                            class="nav-link {{ isActive('admin/library/bookCategory') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Book Category </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'newBook.add')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\BookController@add') }}"
                                            class="nav-link {{ isActive('admin/library/books/add') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Books </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'allBooks.show')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\BookController@show') }}"
                                            class="nav-link {{ isActive('admin/library/books') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Books</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'returnBook.index')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\BookController@returnBook') }}"
                                            class="nav-link {{ isActive('admin/library/return_books') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Return Books</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'report')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\BookController@report') }}"
                                            class="nav-link {{ isActive('admin/library/report') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Report</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{--            library management ends here --}}

                    {{--            @can('student.index') --}}
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
                                        <a href="{{ action('Backend\StudentController@index') }}"
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
                                            class="nav-link {{ isActive('admin/student/testimonial') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>TC</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('student.testimonial') }}"
                                            class="nav-link {{ isActive('admin/student/testimonial') }}">
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
                                        <a href="{{ action('Backend\IdCardController@index') }}"
                                            class="nav-link {{ isActive('admin/student/designStudentCard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Design ID Card</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\IdCardController@index') }}"
                                            class="nav-link {{ isActive('admin/student/designStudentCard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Design ID Card 2</p>
                                        </a>
                                    </li>
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
                                        <a href="{{ action('Backend\StudentController@tod') }}"
                                            class="nav-link {{ isActive('admin/student/tod*') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tod List</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'student.esif')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\StudentController@esif') }}"
                                            class="nav-link {{ isActive('admin/student/esif*') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>eSIF</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'student.images')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\StudentController@images') }}"
                                            class="nav-link {{ isActive('admin/student/images*') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Images</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{--            @endcan --}}
                    @can('middleware-passed', 'institution.classes')
                        <li class="nav-item has-treeview {{ isActive(['admin/institution*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/institution*']) }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Institution
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('middleware-passed', 'institution.academicyear')
                                    <li class="nav-item">
                                        <a href="{{ route('institution.academicyear') }}"
                                            class="nav-link {{ isActive('admin/institution/academicyear') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Sessions') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'institution.classes')
                                    <li class="nav-item">
                                        <a href="{{ route('institution.classes') }}"
                                            class="nav-link {{ isActive('admin/institution/class') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Classes') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'section.group')
                                    <li class="nav-item">
                                        <a href="{{ route('section.group') }}"
                                            class="nav-link {{ isActive('admin/institution/section-groups') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Sections & Groups') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'exam.examresult')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('institution.academicClasses') }}"
                                            class="nav-link {{ isActive('admin/institution/academic-class') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Academic Classes') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'institution.subjects')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('institution.subjects') }}"
                                            class="nav-link {{ isActive('admin/institution/subjects') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Subjects</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'institution.signature')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\InstitutionController@signature') }}"
                                            class="nav-link {{ isActive('admin/institution/signature') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Signature</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'exam.examresult')
                        <li class="nav-item has-treeview {{ isActive(['admin/exam*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/exam*']) }}">
                                <i class="nav-icon fas fa-diagnoses"></i>
                                <p>
                                    {{ __('Exam') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'exam.gradesystem')
                                    <li class="nav-item">
                                        <a href="{{ route('exam.gradesystem') }}"
                                            class="nav-link {{ isActive('admin/exam/gradesystem') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Grade System') }}</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('middleware-passed', 'exam.examination')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('exam.examination') }}"
                                            class="nav-link {{ isActive('admin/exam/examination') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Examinations</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'exam.examresult')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('exam.examresult') }}"
                                            class="nav-link {{ isActive('admin/exam/examresult') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Exam Results</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'competency.index')
                                    <li class="nav-item has-treeview {{ isActive(['admin/competency*']) }}">
                                        <a href="#" class="nav-link {{ isActive(['admin/competency*']) }}">
                                            <i class="nav-icon fas fa-diagnoses"></i>
                                            <p>
                                                {{ __('Competency') }}
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                            @can('middleware-passed', 'competency.index')
                                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                    <a href="{{ route('competency.index') }}"
                                                        class="nav-link {{ isActive('admin/competencies') }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>{{ __('Competency') }}</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('middleware-passed', 'indicator.index')
                                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                    <a href="{{ route('indicator.index') }}"
                                                        class="nav-link {{ isActive('admin/indicators') }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>{{ __('Indicator') }}</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('middleware-passed', 'remark.index')
                                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                    <a href="{{ route('remark.index') }}"
                                                        class="nav-link {{ isActive('admin/remarks') }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>{{ __('Remark') }}</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('middleware-passed', 'competency-remark.index')
                                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                    <a href="{{ route('competency-remark.index') }}"
                                                        class="nav-link {{ isActive('admin/competency-remark') }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>{{ __('Competency Remark') }}</p>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'fee-collection.index')
                        <li class="nav-item has-treeview {{ isActive(['admin/fee*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/fee*']) }}">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>
                                    {{ __('Tuition Fee') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'journals.index')
                                    <li class="nav-item">
                                        <a href="{{ route('fee-category.index') }}"
                                            class="nav-link {{ isActive('admin/fee-category/index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Fee Category') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'fee-setup.create')
                                    <li class="nav-item">
                                        <a href="{{ url('admin/fee/fee-setup') }}"
                                            class="nav-link {{ isActive('admin/fee/fee-setup') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Fee Setup') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'fee-setup.index')
                                    <li class="nav-item">
                                        <a href="{{ url('admin/fee/fee-setup/view') }}"
                                            class="nav-link {{ isActive(['admin/fee/fee-setup/view', 'admin/fee/fee-setup/edit/*', 'admin/fee/fee-setup/fee-students/*', 'admin/fee/fee-setup/edit-by-student/*']) }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Fee View') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'fee-collection.index')
                                    <li class="nav-item">
                                        <a href="{{ url('admin/fee/fee-collection') }}"
                                            class="nav-link {{ isActive(['admin/fee/fee-collection', 'admin/fee/fee-collection/view*']) }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Fee Collection') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'report.generate')
                                    <li class="nav-item">
                                        <a href="{{ url('admin/fee/collections/report/generate') }}"
                                            class="nav-link {{ isActive('admin/fee/collections/report/generate') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Date Wise Report') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'report.academic_class')
                                    <li class="nav-item">
                                        <a href="{{ route('report.academic_class') }}"
                                            class="nav-link {{ isActive('admin/fee/collections/report/academic_class') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Monthly Wise Report') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'transport.index')
                                    <li class="nav-item">
                                        <a href="{{ route('transport.index') }}"
                                            class="nav-link {{ isActive('admin/fee-category/transport') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Transport Location</p>
                                        </a>
                                    </li>
                                @endcan

                                {{--                        <li class="nav-item"> --}}
                                {{--                            <a href="{{route('transport.student-list')}}" class="nav-link {{ isActive('admin/fee-category/transport') }}"> --}}
                                {{--                                <i class="far fa-circle nav-icon"></i> --}}
                                {{--                                <p>Transport Fee Assign</p> --}}
                                {{--                            </a> --}}
                                {{--                        </li> --}}
                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'journals.index')
                        <li
                            class="nav-item has-treeview {{ isActive(['fee-category*', 'admin/coa/*', 'admin/journal*', 'admin/ledger*', 'admin/profit-n-loss', 'admin/trial-balance*', 'admin/balance-sheet', 'admin/coa*']) }}">
                            <a href="#"
                                class="nav-link {{ isActive(['fee-category*', 'admin/coa/*', 'admin/journal*', 'admin/ledger*', 'admin/profit-n-loss', 'admin/trial-balance*', 'admin/balance-sheet', 'admin/coa*']) }}">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>
                                    Accounts
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('middleware-passed', 'coa.name')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\ChartOfAccountController@index') }}"
                                            class="nav-link {{ isActive('admin/coa') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Chart of Accounts</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journals.index')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\JournalController@index') }}"
                                            class="nav-link {{ isActive('admin/journals') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Journal</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journal.classic')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\JournalController@classic') }}"
                                            class="nav-link {{ isActive('admin/journal/classic') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Journal Classic</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journal.ledger')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\AccountingController@ledger') }}"
                                            class="nav-link {{ isActive('admin/ledger') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ledger</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journal.trialBalance')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\AccountingController@trialBalance') }}"
                                            class="nav-link {{ isActive('admin/trial-balance') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trial Balance</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journal.profitNLoss')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\AccountingController@profitNLoss') }}"
                                            class="nav-link {{ isActive('admin/profit-n-loss') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Profit & Loss</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'journal.balanceSheet')
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\AccountingController@balanceSheet') }}"
                                            class="nav-link {{ isActive('admin/balance-sheet') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Balance Sheet</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    <li class="nav-item has-treeview {{ isActive(['admin/communication*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/communication*']) }}">
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
                            {{--                        @can('middleware-passed', 'communication.history') --}}
                            <li class="nav-item">
                                <a href="{{ route('communication.history') }}"
                                    class="nav-link {{ isActive('admin/communication/history') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SMS History</p>
                                </a>
                            </li>
                            {{--                        @endcan --}}
                            {{--                        @can('middleware-passed', 'communication.apiSetting') --}}
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('communication.apiSetting') }}"
                                    class="nav-link {{ isActive('admin/communication/apiSetting') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> API Settings</p>
                                </a>
                            </li>
                            {{--                        @endcan --}}
                        </ul>
                    </li>
                    @can('middleware-passed', 'menu.index')
                        <li class="nav-item has-treeview {{ isActive(['admin/menus*', 'admin/pages*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/cms*']) }}">
                                <i class="fas fa-tasks"></i>
                                <p>
                                    CMS
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'menu.index')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\MenuController@index') }}"
                                            class="nav-link {{ isActive('admin/menus') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Site Menu</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'page.index')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\PageController@index') }}"
                                            class="nav-link {{ isActive('admin/pages') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Page Mgmt</p>
                                        </a>
                                    </li>
                                @endcan
                                <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                                    <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            Frontend Settings
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                        @can('middleware-passed', 'chairmanMessage.index')
                                            <li class="nav-item">
                                                <a href="{{ route('chairmanMessage.index') }}"
                                                    class="nav-link {{ isActive('chairmanMessage') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Chairman Message </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'principalMessage.index')
                                            <li class="nav-item">
                                                <a href="{{ route('principalMessage.index') }}"
                                                    class="nav-link {{ isActive('principalMessage') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>{{ __('Principal Message') }}</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'siteinfo')
                                            <li class="nav-item">
                                                <a href="{{ action('Backend\SiteInformationController@index') }}"
                                                    class="nav-link {{ isActive('siteinfo') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Site Basic Info </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'aboutInstitute.index')
                                            <li class="nav-item">
                                                <a href="{{ route('aboutInstitute.index') }}"
                                                    class="nav-link {{ isActive('aboutInstitute') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>About Institute</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'leaveManagement.index')
                                            <li class="nav-item">
                                                <a href="{{ route('galleryCorner.create') }}"
                                                    class="nav-link {{ isActive('galleryCorner') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Suborno Joyontee</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'features.index')
                                            {{-- @if (in_array('features.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ action('Backend\FeatureController@index') }}"
                                                    class="nav-link {{ isActive('admin/pages') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Feature</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'slider.index')
                                            {{-- @if (in_array('slider.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ action('Backend\SliderController@index') }}"
                                                    class="nav-link {{ isActive('admin/sliders') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Slider</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'setting.index')
                                            {{-- @if (in_array('setting.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ route('settings.link.index') }}"
                                                    class="nav-link {{ isActive('admin/settings/links') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>{{ __('Important Links') }}</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('middleware-passed', 'social.index')
                                            {{-- @if (in_array('social.index', auth()->user()->permissions)) --}}
                                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                                <a href="{{ action('Backend\SocialController@index') }}"
                                                    class="nav-link {{ isActive('admin/socials') }}">
                                                    <i class="far nav-icon"></i>
                                                    <p>Social Links</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'academic-calender.index')
                        {{-- @if (in_array('academic-calender.index', auth()->user()->permissions)) --}}
                        <li
                            class="nav-item has-treeview {{ isActive(['admin/settings*', 'admin/language*', 'admin/site*', 'admin/slider*', 'admin/social*', 'admin/calender*', 'admin/theme', 'admin/attendance']) }}">
                            <a href="#"
                                class="nav-link {{ isActive(['admin/settings*', 'admin/site*', 'admin/slider*', 'admin/social*', 'admin/theme']) }}">
                                <i class="fas fa-shapes"></i>
                                <p>
                                    Settings
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'academic-calender.index')
                                    {{-- @if (in_array('academic-calender.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('setting.email') }}"
                                            class="nav-link {{ isActive('admin/setting/email') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>E-mail Settings</p>
                                        </a>
                                    </li>
                                @endcan
                                {{--                        @can('middleware-passed', 'academic-calender.index') --}}
                                {{--                            --}}{{-- @if (in_array('academic-calender.index', auth()->user()->permissions)) --}}
                                {{--                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);"> --}}
                                {{--                                <a href="{{ action('Backend\AcademicCalenderController@index') }}" class="nav-link {{ isActive('admin/academic-calender/index') }}"> --}}
                                {{--                                    <i class="far fa-circle nav-icon"></i> --}}
                                {{--                                    <p>Academic Calender</p> --}}
                                {{--                                </a> --}}
                                {{--                            </li> --}}
                                {{--                        @endcan --}}
                                @can('middleware-passed', 'academic-calender.index')
                                    {{-- @if (in_array('academic-calender.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('theme.index') }}" class="nav-link {{ isActive('admin/themes') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Theme</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'academic-calender.index')
                                    {{-- @if (in_array('academic-calender.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\LanguageController@index') }}"
                                            class="nav-link {{ isActive('admin/language*') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Language</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'staff.teacher')
                        {{-- @if (in_array('staff.teacher', auth()->user()->permissions)) --}}
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
                                    {{-- @if (in_array('staff.teacher', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('staff.teacher') }}"
                                            class="nav-link {{ isActive('admin/staff/teacher') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Teacher & Staff</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'staff.threshold')
                                    {{-- @if (in_array('staff.threshold', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.threshold') }}"
                                            class="nav-link {{ isActive('admin/staff/threshold') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Threshold</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'staff.kpi')
                                    {{-- @if (in_array('staff.kpi', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.kpi') }}" class="nav-link {{ isActive('admin/staff/kpi') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>kpi</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'staff.payslip')
                                    {{-- @if (in_array('staff.payslip', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('staff.payslip') }}"
                                            class="nav-link {{ isActive('admin/staff/payslip') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>PaySlip</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'staff.staff')
                                    {{-- @if (in_array('staff.staff', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\IdCardController@staff') }}"
                                            class="nav-link {{ isActive('admin/staff/idCard') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Design ID Card</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan
                    @can('middleware-passed', 'notice.index')
                        {{-- @if (in_array('notice.index', auth()->user()->permissions)) --}}
                        <li class="nav-item has-treeview {{ isActive(['admin/notice*', 'admin/event*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/notice*', 'admin/event*']) }}">
                                <i class="fas fa-bullhorn"></i>
                                <p>
                                    Notice
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'notice.index')
                                    {{-- @if (in_array('notice.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\NoticeController@index') }}"
                                            class="nav-link {{ isActive('admin/notices') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Notice & News</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'notice-category.index')
                                    {{-- @if (in_array('notice-category.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\NoticeCategoryController@index') }}"
                                            class="nav-link {{ isActive('admin/notice/category') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Notice Category</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('middleware-passed', 'diary.index')
                                    {{-- @if (in_array('diary.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('diary.index') }}" class="nav-link {{ isActive(['dairy-list']) }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dairy List</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'event.index')
                                    {{-- @if (in_array('event.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\UpcomingEventController@index') }}"
                                            class="nav-link {{ isActive(['event*']) }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Upcoming Events</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    {{-- Syllabus Section Start babu --}}
                    @can('middleware-passed', 'syllabus.index')
                        {{-- @if (in_array('syllabus.index', auth()->user()->permissions)) --}}
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
                                    {{-- @if (in_array('syllabus.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('syllabus.index') }}"
                                            class="nav-link {{ isActive('admin/syllabus/syllabus') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Syllabus Management</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    {{-- Syllabus Section End babu --}}
                    @can('middleware-passed', 'settings.image')
                        {{-- @if (in_array('settings.image', auth()->user()->permissions)) --}}
                        <li class="nav-item has-treeview {{ isActive(['admin/gallery*']) }}">
                            <a href="#" class="nav-link {{ isActive(['admin/gallery*']) }}">
                                <i class="fas fa-camera-retro"></i>
                                <p>
                                    Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed', 'settings.image')
                                    {{-- @if (in_array('settings.image', auth()->user()->permissions)) --}}
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\GalleryController@index') }}"
                                            class="nav-link {{ isActive('admin/gallery/image') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Image Mgmt</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'gallery-category.index')
                                    {{--                            @if (in_array('gallery-category.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\GalleryCategoryController@index') }}"
                                            class="nav-link {{ isActive('admin/gallery/category') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Image Category</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed', 'gallery-albums.index')
                                    {{--                            @if (in_array('gallery-albums.index', auth()->user()->permissions)) --}}
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\AlbumController@index') }}"
                                            class="nav-link {{ isActive('admin/gallery/albums') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Image Album</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    <li class="nav-item has-treeview {{ isActive(['admin/user*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/user*']) }}">
                            <i class="fas fa-users-cog"></i>
                            <p>
                                User Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            <li class="nav-item">
                                <a href="{{ route('user.profile') }}"
                                    class="nav-link {{ isActive('admin/gallery/image') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ action('Backend\UserController@index') }}"
                                    class="nav-link {{ isActive('admin/gallery/image') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>
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
                            {{--                    <li class="nav-item" >
                                <a href="{{ route('create-dynamic.table') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Dynamic Table</p>
                        </a>
                    </li> --}}
                    <li class="nav-item" >
                        <a href="{{route('create-custom.table') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p> Create Custome Table</p>
                                                    </a>
                                                </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['alumni*']) }}">
                        <a href="{{ action('Backend\AlumniController@index') }}"
                            class="nav-link {{ isActive(['alumni*']) }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Alumni
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ isActive(['admin/db-backup*']) }}">
                        <a href="{{ route('backup.db') }}" class="nav-link {{ isActive(['admin/db-backup*']) }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Db-Backup
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>