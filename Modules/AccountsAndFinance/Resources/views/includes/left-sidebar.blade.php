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

            <!------------------------------------- Tuition Fee  --------------------------------------------------->
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
                        @can('middleware-passed', 'fee-collection.allCollections')
                            <li class="nav-item">
                                <a href="{{ url('admin/fee/all-collections') }}"
                                   class="nav-link {{ isActive(['admin/fee/all-collections', 'admin/fee/all-collections*']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('All Collections') }}</p>
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

{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('transport.student-list')}}" class="nav-link {{ isActive('admin/fee-category/transport') }}">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Transport Fee Assign</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
            @endcan

            <!------------------------------------- Accounts --------------------------------------------------->
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
                                <a href="{{ route('coa.name') }}"
                                   class="nav-link {{ isActive('admin/coa') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Chart of Accounts</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journals.index')
                            <li class="nav-item">
                                <a href="{{ route('journals.index') }}"
                                   class="nav-link {{ isActive('admin/journals') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Journal</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journal.classic')
                            <li class="nav-item">
                                <a href="{{ route('journal.classic') }}"
                                   class="nav-link {{ isActive('admin/journal/classic') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Journal Classic</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journal.ledger')
                            <li class="nav-item">
                                <a href="{{ route('journal.ledger') }}"
                                   class="nav-link {{ isActive('admin/ledger') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ledger</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journal.trialBalance')
                            <li class="nav-item">
                                <a href="{{ route('journal.trialBalance') }}"
                                   class="nav-link {{ isActive('admin/trial-balance') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trial Balance</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journal.profitNLoss')
                            <li class="nav-item">
                                <a href="{{ route('journal.profitNLoss') }}"
                                   class="nav-link {{ isActive('admin/profit-n-loss') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profit & Loss</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed', 'journal.balanceSheet')
                            <li class="nav-item">
                                <a href="{{ route('journal.balanceSheet') }}"
                                   class="nav-link {{ isActive('admin/balance-sheet') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Balance Sheet</p>
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