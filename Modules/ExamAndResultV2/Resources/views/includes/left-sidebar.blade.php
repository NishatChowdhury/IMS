<!-- Brand Logo -->
<a href="{{ url('dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano" id="style-1">
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
            <li class="nav-item has-treeview">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Home') }}
                    </p>
                </a>
            </li>

            <!------------------------------------- Exam, Grade, Result  --------------------------------------------------->
            @can('middleware-passed', 'exam.examresult_v2')
                <li class="nav-item has-treeview {{ isActive(['admin/exam*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/exam*']) }}">
                        <i class="nav-icon fas fa-diagnoses"></i>
                        <p>
                            {{ __('Exam') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @can('middleware-passed', 'exam.gradesystem_v2')
                            <li class="nav-item">
                                <a href="{{ route('exam.gradesystem_v2') }}"
                                    class="nav-link {{ isActive('admin/exam/gradesystem/v2') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Grade System') }}</p>
                                </a>
                            </li>
                        @endcan

                        @can('middleware-passed', 'exam.examination_v2')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('exam.examination_v2') }}"
                                    class="nav-link {{ isActive(['admin/exam/examination/v2','admin/exam/result-system/*']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Examinations') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'exam.examresult_v2')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('exam.examresult_v2') }}"
                                    class="nav-link {{ isActive('admin/exam/examresult/v2') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Exam Results') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'exam.bulkResult_v2')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('exam.bulkResult_v2') }}"
                                    class="nav-link {{ isActive('admin/exam/bulk-result/v2') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Download Bulk Results') }}</p>
                                </a>
                            </li>
                        @endcan

                    </ul>
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
    </nav>
    <!-- /.sidebar-menu -->
</div>
