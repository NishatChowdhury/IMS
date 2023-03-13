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

            <!------------------------------------- Library  ------------------------------------------------->
            @can('middleware-passed', 'bookCategory.index')
                @if (in_array('bookCategory.index', auth()->user()->permissions))
                    <li class="nav-item has-treeview {{ isActive('admin/library*') }}">
                        <a href="#" class="nav-link {{ isActive('admin/library*') }}">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Library
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                            @can('middleware-passed', 'bookCategory.index')
                                <li class="nav-item">
                                    <a href="{{ route('bookCategory.index') }}"
                                       class="nav-link {{ isActive('admin/library/bookCategory') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Book Category </p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'newBook.add')
                                <li class="nav-item">
                                    <a href="{{ route('newBook.add') }}"
                                       class="nav-link {{ isActive('admin/library/books/add') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Books </p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'allBooks.show')
                                <li class="nav-item">
                                    <a href="{{ route('allBooks.show') }}"
                                       class="nav-link {{ isActive('admin/library/books') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Books</p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'returnBook.index')
                                <li class="nav-item">
                                    <a href="{{ route('returnBook.index') }}"
                                       class="nav-link {{ isActive('admin/library/return_books') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Return Books</p>
                                    </a>
                                </li>
                            @endcan
                            @can('middleware-passed', 'report')
                                <li class="nav-item">
                                    <a href="{{ route('report') }}"
                                       class="nav-link {{ isActive('admin/library/report') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endif
                @endcan



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>