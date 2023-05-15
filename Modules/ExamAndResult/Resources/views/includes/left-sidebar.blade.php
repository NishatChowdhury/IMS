<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano" id="style-1">
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
            <li class="nav-item has-treeview">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Home') }}
                    </p>
                </a>
            </li>

            <!------------------------------------- Exam, Grade, Result  --------------------------------------------------->
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
                                    <p>{{ __('Examinations') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'exam.examresult')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('exam.examresult') }}"
                                   class="nav-link {{ isActive('admin/exam/examresult') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Exam Results') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'exam.bulkResult')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('exam.bulkResult') }}"
                                   class="nav-link {{ isActive('admin/exam/bulk-result') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Download Bulk Results') }}</p>
                                </a>
                            </li>
                        @endcan
{{--                    
                    </ul>
                </li>
            @endcan


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>