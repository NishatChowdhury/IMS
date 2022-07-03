<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano" id="style-1" style="padding-right:0px">
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
                @if(in_array("online.onlineApplyIndex", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/admission*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/admission*']) }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                {{ __('Admission') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{--                        <li class="nav-item">--}}
                            {{--                            <a href="{{route('admission.exams')}}" class="nav-link {{ isActive('admission/exams') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Examinations</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            <li class="nav-item">
                                <a href="{{ url('admin/admission/create') }}" class="nav-link {{ isActive('*/admission/create') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Create Admission') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/admission/applicant') }}" class="nav-link {{ isActive('admin/admission/applicant') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Applicants (School)') }}</p>
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
                @endif
                @if(in_array("attendance.dashboard", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                        <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Attendance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(in_array("attendance.dashboard", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ route('attendance.dashboard') }}" class="nav-link {{ isActive('admin/attendance/dashboard') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Dashboard') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("leaveManagement.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\LeaveManagementController@index') }}" class="nav-link {{ isActive('admin/attendance/leaveManagement') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Management</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("leavePurpose.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\LeavePurposeController@index') }}" class="nav-link {{ isActive('admin/attendance/leavePurpose') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave Purpose</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("attendance.holiday", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ route('attendance.holiday') }}" class="nav-link {{ isActive('admin/holidays') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Calendar</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                                <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>
                                        Setting
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">

                                    @if(in_array("shift.index", auth()->user()->permissions))
                                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ action('Backend\ShiftController@index') }}" class="nav-link {{ isActive('admin/attendance/setting') }}">
                                                <i class="far nav-icon"></i>
                                                <p>Attendance Setting</p>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array("weeklyOff.index", auth()->user()->permissions))
                                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ action('Backend\WeeklyOffController@index') }}" class="nav-link {{ isActive('admin/attendance/weeklyOff') }}">
                                                <i class="far nav-icon"></i>
                                                <p>Weekly Off</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                            <a href="{{ action('ShiftController@index') }}" class="nav-link {{ isActive('admin/attendance/setting') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Setting</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            @if(in_array("attendance.student", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ route('attendance.student')}}" class="nav-link {{ isActive('admin/attendance/student') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Attendance</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("attendance.teacher", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ route('attendance.teacher')}}" class="nav-link {{ isActive('admin/attendance/teacher') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher Attendance</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("attendance.report", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ route('attendance.report') }}" class="nav-link {{ isActive('admin/attendance/report') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Monthly Report</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            @endcannot

            @cannot('cms')
                {{--            library management starts here--}}
                @if(in_array("bookCategory.index", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive('admin/library*') }}">
                        <a href="#" class="nav-link {{ isActive('admin/library*') }}">
                            {{--                    <i class="nav-icon fas fa-user-graduate"></i>--}}
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Library
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @if(in_array("bookCategory.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\BookCategoryController@index') }}" class="nav-link {{ isActive('admin/library/bookCategory') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Book Category </p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("newBook.add", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\BookController@add') }}" class="nav-link {{ isActive('admin/library/books/add') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Books </p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("allBooks.show", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\BookController@show') }}" class="nav-link {{ isActive('admin/library/books') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Books</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("returnBook.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\BookController@returnBook') }}" class="nav-link {{ isActive('admin/library/return_books') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Return Books</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("report", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\BookController@report') }}" class="nav-link {{ isActive('admin/library/report') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                {{--            library management ends here--}}
            @endcannot

            {{--            @can('student.index')--}}
            @if(in_array("student.list", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive('admin/student*') }}">
                    <a href="#" class="nav-link {{ isActive('admin/student*') }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(in_array("student.list", auth()->user()->permissions))
                            <li class="nav-item">
                                <a href="{{ action('Backend\StudentController@index') }}" class="nav-link {{ isActive('admin/students') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Students') }} </p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.testimonial", auth()->user()->permissions))

                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('student.testimonial')}}" class="nav-link {{ isActive('admin/student/testimonial') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Testimonial</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.transport", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('student.transport')}}" class="nav-link {{ isActive('admin/student/assign-transport') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Assign Transport</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.designStudentCard", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\IdCardController@index') }}" class="nav-link {{ isActive('admin/student/designStudentCard') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Design ID Card</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.promotion", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('student.promotion')}}" class="nav-link {{ isActive('admin/student/promotion') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Promotion</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.tod", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\StudentController@tod') }}" class="nav-link {{ isActive('admin/student/tod*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tod List</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.esif", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\StudentController@esif') }}" class="nav-link {{ isActive('admin/student/esif*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>eSIF</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("student.images", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\StudentController@images') }}" class="nav-link {{ isActive('admin/student/images*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Images</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{--            @endcan--}}
            @if(in_array("institution.classes", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/institution*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/institution*']) }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Institution
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(in_array("institution.academicyear", auth()->user()->permissions))
                            <li class="nav-item">
                                <a href="{{route('institution.academicyear')}}" class="nav-link {{ isActive('admin/institution/academicyear') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Sessions') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("institution.classes", auth()->user()->permissions))
                            <li class="nav-item">
                                <a href="{{route('institution.classes')}}" class="nav-link {{ isActive('admin/institution/class') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Classes') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("section.group", auth()->user()->permissions))
                            <li class="nav-item">
                                <a href="{{route('section.group')}}" class="nav-link {{ isActive('admin/institution/section-groups') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Sections & Groups') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("exam.examresult", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('institution.academicClasses')}}" class="nav-link {{ isActive('admin/institution/academic-class') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Academic Classes') }}</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("institution.subjects", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('institution.subjects')}}" class="nav-link {{ isActive('admin/institution/subjects') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subjects</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("institution.signature", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\InstitutionController@signature') }}" class="nav-link {{ isActive('admin/institution/signature') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Signature</p>
                                </a>
                            </li>
                        @endif

                        {{--                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                        {{--                        <a href="{{route('institution.profile')}}" class="nav-link {{ isActive('institution/profile') }}">--}}
                        {{--                            <i class="far fa-circle nav-icon"></i>--}}
                        {{--                            <p>Profile</p>--}}
                        {{--                        </a>--}}
                        {{--                    </li>--}}
                    </ul>
                </li>
            @endif
            @cannot('cms')
                @if(in_array("exam.examresult", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/exam*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/exam*']) }}">
                            <i class="nav-icon fas fa-diagnoses"></i>
                            <p>
                                {{ __('Exam') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @if(in_array("exam.gradesystem", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{route('exam.gradesystem')}}" class="nav-link {{ isActive('admin/exam/gradesystem') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Grade System')}}</p>
                                    </a>
                                </li>
                            @endif
                            {{--                        <li class="nav-item">--}}
                            {{--                            <a href="{{ action('Backend\ExamController@admitCard') }}" class="nav-link {{ isActive('admin/exam/admit-card') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Admit Card</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            @if(in_array("exam.examination", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{route('exam.examination')}}" class="nav-link {{ isActive('admin/exam/examination') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Examinations</p>
                                    </a>
                                </li>
                            @endif
                            {{--<li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--<a href="{{route('exam.examitems')}}" class="nav-link {{ isActive('eadmin/xam/examitems') }}">--}}
                            {{--<i class="far fa-circle nav-icon"></i>--}}
                            {{--<p>Exam Schedules</p>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            @if(in_array("exam.examresult", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{route('exam.examresult')}}" class="nav-link {{ isActive('admin/exam/examresult') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Exam Results</p>
                                    </a>
                                </li>
                            @endif
                            {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                            <a href="{{route('exam.setfinalresultrule')}}" class="nav-link {{ isActive('admin/exam/setfinalresultrule') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Generate Final Result</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                            <a href="{{route('exam.getfinalresultrule')}}" class="nav-link {{ isActive('admin/exam/getfinalresultrule') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Final Result</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}

                            {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                            {{--                            <a href="{{route('exam.tabulationSheet')}}" class="nav-link {{ isActive('admin/exam/tabulationSheet') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Tabulation Sheet</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                        </ul>
                    </li>
                @endif
                @if(in_array("fee-collection.index", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['admin/fee*']) }}">
                        <a href="#" class="nav-link {{ isActive(['admin/fee*']) }}">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>
                                {{ __('Tuition Fee') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @if(in_array("journals.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{route('fee-category.index')}}" class="nav-link {{ isActive('admin/fee-category/index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Fee Category') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("fee-setup.create", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ url('admin/fee/fee-setup') }}" class="nav-link {{ isActive('admin/fee/fee-setup') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Fee Setup') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("fee-setup.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ url('admin/fee/fee-setup/view') }}" class="nav-link {{ isActive(['admin/fee/fee-setup/view','admin/fee/fee-setup/edit/*','admin/fee/fee-setup/fee-students/*','admin/fee/fee-setup/edit-by-student/*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Fee View') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("fee-collection.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ url('admin/fee/fee-collection') }}" class="nav-link {{ isActive(['admin/fee/fee-collection','admin/fee/fee-collection/view*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Fee Collection') }}</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('admin/fee/all-collections') }}" class="nav-link {{ isActive('admin/fee/all-collections') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Fee Collection Report') }}</p>
                                    </a>
                                </li> --}}
                            @endif
                            @if(in_array("report.generate", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ url('admin/fee/collections/report/generate') }}" class="nav-link {{ isActive('admin/fee/collections/report/generate') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Date Wise Report') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("report.academic_class", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ route('report.academic_class') }}" class="nav-link {{ isActive('admin/fee/collections/report/academic_class') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Monthly Wise Report') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("transport.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{route('transport.index')}}" class="nav-link {{ isActive('admin/fee-category/transport') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transport Location</p>
                                    </a>
                                </li>
                            @endif

                            {{--                        <li class="nav-item">--}}
                            {{--                            <a href="{{route('transport.student-list')}}" class="nav-link {{ isActive('admin/fee-category/transport') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Transport Fee Assign</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                        </ul>
                    </li>
                @endif
                @if(in_array("journals.index", auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*']) }}">
                        <a href="#" class="nav-link {{ isActive(['fee-category*','admin/coa/*','admin/journal*','admin/ledger*','admin/profit-n-loss','admin/trial-balance*','admin/balance-sheet','admin/coa*']) }}">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                Accounts
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(in_array("coa.name", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\ChartOfAccountController@index') }}" class="nav-link {{ isActive('admin/coa') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chart of Accounts</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journals.index", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\JournalController@index') }}" class="nav-link {{ isActive('admin/journals') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Journal</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journal.classic", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\JournalController@classic') }}" class="nav-link {{ isActive('admin/journal/classic') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Journal Classic</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journal.ledger", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\AccountingController@ledger') }}" class="nav-link {{ isActive('admin/ledger') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ledger</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journal.trialBalance", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\AccountingController@trialBalance') }}" class="nav-link {{ isActive('admin/trial-balance') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Trial Balance</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journal.profitNLoss", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\AccountingController@profitNLoss') }}" class="nav-link {{ isActive('admin/profit-n-loss') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profit & Loss</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("journal.balanceSheet", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{ action('Backend\AccountingController@balanceSheet') }}" class="nav-link {{ isActive('admin/balance-sheet') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Balance Sheet</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

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
                                    <a href="{{route('communication.quick')}}" class="nav-link {{ isActive('admin/communication/quick') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Quick SMS') }}</p>
                                    </a>
                                </li>
                            {{--                        <li>--}}
                            {{--                            <a href="{{route('communication.student')}}" class="nav-link {{ isActive('communication/student') }}">--}}
                            {{--                                <i class="far fa-circle nav-icon"></i>--}}
                            {{--                                <p>Student SMS</p>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                                <li class="nav-item">
                                    <a href="{{route('communication.staff')}}" class="nav-link {{ isActive('admin/communication/staff') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Staff SMS') }}</p>
                                    </a>
                                </li>
                            @if(in_array("communication.history", auth()->user()->permissions))
                                <li class="nav-item">
                                    <a href="{{route('communication.history')}}" class="nav-link {{ isActive('admin/communication/history') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SMS History</p>
                                    </a>
                                </li>
                            @endif
                            @if(in_array("communication.apiSetting", auth()->user()->permissions))
                                <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                    <a href="{{route('communication.apiSetting')}}" class="nav-link {{ isActive('admin/communication/apiSetting') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> API Settings</p>
                                    </a>
                                </li>
                            @endif
                            {{--<li class="nav-item">--}}
                            {{--<a href="{{ action('ExtraController@starter') }}" class="nav-link {{ isActive('extra/starter') }}">--}}
                            {{--<i class="far fa-circle nav-icon"></i>--}}
                            {{--<p>Starter Page</p>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
{{--                @endif--}}
                {{--                <li class="nav-item has-treeview {{ isActive(['admin/extra*']) }}">--}}
                {{--                    <a href="#" class="nav-link {{ isActive(['admin/extra*']) }}">--}}
                {{--                        <i class="nav-icon fas fa-scroll"></i>--}}
                {{--                        <p>--}}
                {{--                            Reports--}}
                {{--                            <i class="fas fa-angle-left right"></i>--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                    <ul class="nav nav-treeview"  style="background-color: rgb(40, 40, 45);">--}}
                {{--                        <li class="nav-item">--}}
                {{--                            <a href="#" class="nav-link {{ isActive('admin/extra/404') }}">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Profit and Loss </p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                {{--                            <a href="#" class="nav-link {{ isActive('admin/extra/500') }}">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Balance Sheet</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                {{--                            <a href="#" class="nav-link {{ isActive('admin/extra/blank') }}">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Annual Payments</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                {{--                            <a href="{{ action('Backend\ReportController@student_fee_report') }}" class="nav-link {{ isActive('admin/extra/blank') }}">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Fee Collection</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
                {{--                            <a href="{{ action('Backend\ReportController@student_monthly_fee_report') }}" class="nav-link {{ isActive('admin/extra/blank') }}">--}}
                {{--                                <i class="far fa-circle nav-icon"></i>--}}
                {{--                                <p>Monthly Fee Report</p>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
            @endcannot
            @if(in_array("menu.index", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/menus*','admin/pages*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/cms*']) }}">
                        <i class="fas fa-tasks"></i>
                        <p>
                            CMS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("menu.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\MenuController@index') }}" class="nav-link {{ isActive('admin/menus') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Site Menu</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("page.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\PageController@index') }}" class="nav-link {{ isActive('admin/pages') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Page Mgmt</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item has-treeview {{ isActive('admin/attendance*') }}">
                            <a href="#" class="nav-link {{ isActive('admin/attendance*') }}">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Frontend Settings
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @if(in_array("chairmanMessage.index", auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('chairmanMessage.index') }}" class="nav-link {{ isActive('chairmanMessage') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Chairman Message </p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("principalMessage.index", auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('principalMessage.index') }}" class="nav-link {{ isActive('principalMessage') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Principle Message </p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("siteinfo", auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ action('Backend\SiteInformationController@index') }}" class="nav-link {{ isActive('siteinfo') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Site Basic Info </p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("aboutInstitute.index", auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('aboutInstitute.index') }}" class="nav-link {{ isActive('aboutInstitute') }}">
                                            <i class="far nav-icon"></i>
                                            <p>About Institute</p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("galleryCorner.index", auth()->user()->permissions))
                                    <li class="nav-item">
                                        <a href="{{ route('galleryCorner.create') }}" class="nav-link {{ isActive('galleryCorner') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Gallery Corner</p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("features.index", auth()->user()->permissions))
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\FeatureController@index') }}" class="nav-link {{ isActive('admin/pages') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Feature</p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("slider.index", auth()->user()->permissions))
                                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\SliderController@index') }}" class="nav-link {{ isActive('admin/sliders') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Slider</p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("setting.index", auth()->user()->permissions))
                                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\LinkController@index') }}" class="nav-link {{ isActive('admin/settings/links') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Important Links</p>
                                        </a>
                                    </li>
                                @endif
                                @if(in_array("social.index", auth()->user()->permissions))
                                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ action('Backend\SocialController@index') }}" class="nav-link {{ isActive('admin/socials') }}">
                                            <i class="far nav-icon"></i>
                                            <p>Social Links</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
            @if(in_array("academic-calender.index", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/settings*','admin/page*','admin/site*','admin/slider*','admin/social*','admin/calender*','admin/theme','admin/attendance']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/settings*','admin/page*','admin/site*','admin/slider*','admin/social*','admin/theme']) }}">
                        <i class="fas fa-shapes"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("academic-calender.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('setting.email') }}" class="nav-link {{ isActive('admin/setting/email') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>E-mail Settings</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("academic-calender.index", auth()->user()->permissions))
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\AcademicCalenderController@index') }}" class="nav-link {{ isActive('admin/academic-calender/index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Academic Calender</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("academic-calender.index", auth()->user()->permissions))
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\ThemeController@index') }}" class="nav-link {{ isActive('admin/themes') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Theme</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(in_array("staff.teacher", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/staff*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/staff*']) }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Staff Mgmt
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("staff.teacher", auth()->user()->permissions))
                            <li class="nav-item">
                                <a href="{{route('staff.teacher')}}" class="nav-link {{ isActive('admin/staff/teacher') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Teacher & Staff</p>
                                </a>
                            </li>
                        @endif
{{--                        @if(in_array("staff.addstaff", auth()->user()->permissions))--}}
{{--                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">--}}
{{--                                <a href="{{route('staff.addstaff')}}" class="nav-link {{ isActive('admin/staff/staffadd') }}">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Staff Add</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                        @if(in_array("staff.threshold", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('staff.threshold')}}" class="nav-link {{ isActive('admin/staff/threshold') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Threshold</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("staff.kpi", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('staff.kpi')}}" class="nav-link {{ isActive('admin/staff/kpi') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>kpi</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("staff.payslip", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('staff.payslip')}}" class="nav-link {{ isActive('admin/staff/payslip') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PaySlip</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("staff.staff", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\IdCardController@staff') }}" class="nav-link {{ isActive('admin/staff/idCard') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Design ID Card</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif
            @if(in_array("notice.index", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/notice*','admin/event*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/notice*','admin/event*']) }}">
                        <i class="fas fa-bullhorn"></i>
                        <p>
                            Notice
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("notice.index", auth()->user()->permissions))
                            <li class="nav-item" >
                                <a href="{{ action('Backend\NoticeController@index') }}" class="nav-link {{ isActive('admin/notices') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Notice & News</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("notice-category.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\NoticeCategoryController@index') }}" class="nav-link {{ isActive('admin/notice/category') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Notice Category</p>
                                </a>
                            </li>
                        @endif

                        @if(in_array("diary.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('diary.index') }}" class="nav-link {{ isActive(['dairy-list']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dairy List</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("event.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\UpcomingEventController@index') }}" class="nav-link {{ isActive(['event*']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Upcoming Events</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--Syllabus Section Start babu--}}
            @if(in_array("syllabus.index", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/syllabus*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/syllabus*']) }}">
                        <i class="fas fa-book"></i>
                        <p>
                            Syllabus
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("syllabus.index", auth()->user()->permissions))
                            <li class="nav-item" >
                                <a href="{{ route('syllabus.index') }}" class="nav-link {{ isActive('admin/syllabus/syllabus') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Syllabus Management</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--Syllabus Section End babu--}}
            @if(in_array("settings.image", auth()->user()->permissions))
                <li class="nav-item has-treeview {{ isActive(['admin/gallery*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/gallery*']) }}">
                        <i class="fas fa-camera-retro"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @if(in_array("settings.image", auth()->user()->permissions))
                            <li class="nav-item" >
                                <a href="{{ action('Backend\GalleryController@index') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Image Mgmt</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("gallery-category.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\GalleryCategoryController@index') }}" class="nav-link {{ isActive('admin/gallery/category') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Image Category</p>
                                </a>
                            </li>
                        @endif
                        @if(in_array("gallery-albums.index", auth()->user()->permissions))
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ action('Backend\AlbumController@index') }}" class="nav-link {{ isActive('admin/gallery/albums') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Image Album</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--<li class="nav-header">MISCELLANEOUS</li>--}}
            {{--            @cannot('cms')--}}
            {{--                <li class="nav-item">--}}
            {{--                    <a href="#" class="nav-link">--}}

            {{--                        <i class="nav-icon fas fa-file-invoice-dollar"></i>--}}
            {{--                        <p>SC Invoices</p>--}}
            {{--                    </a>--}}
            {{--                </li>--}}
            {{--                <li class="nav-item">--}}
            {{--                    <a href="#" class="nav-link">--}}
            {{--                        <i class="nav-icon fas fa-file"></i>--}}
            {{--                        <p>Activities</p>--}}
            {{--                    </a>--}}
            {{--                </li>--}}
            {{--            @endcannot--}}
            <li class="nav-item has-treeview {{ isActive(['admin/user*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/user*']) }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    <li class="nav-item" >
                        <a href="{{ route('user.profile') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ action('Backend\UserController@index') }}" class="nav-link {{ isActive('admin/gallery/image') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a href="{{ route('role.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role</p>
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
