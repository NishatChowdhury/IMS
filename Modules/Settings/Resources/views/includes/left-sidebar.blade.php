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
            <!-- Home -->
            <li class="nav-item has-treeview">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Home') }}
                    </p>
                </a>
            </li>

            @can('middleware-passed','institution.classes')
                <li class="nav-item has-treeview {{ isActive(['admin/institution*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/institution*']) }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ __('Institution') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('middleware-passed','institution.academicyear')
                            <li class="nav-item">
                                <a href="{{route('institution.academicyear')}}" class="nav-link {{ isActive('admin/institution/academicyear') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Sessions') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','institution.classes')
                            <li class="nav-item">
                                <a href="{{route('institution.classes')}}" class="nav-link {{ isActive('admin/institution/class') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Classes') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','section.group')
                            <li class="nav-item">
                                <a href="{{route('institution.section.group')}}" class="nav-link {{ isActive('admin/institution/section-groups') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Sections & Groups') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','exam.examresult')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('institution.academicClasses')}}" class="nav-link {{ isActive('admin/institution/academic-class') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Academic Classes') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','institution.subjects')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{route('institution.subjects')}}" class="nav-link {{ isActive('admin/institution/subjects') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Subjects') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','institution.signature')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('institution.signature') }}" class="nav-link {{ isActive('admin/institution/signature') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Signature') }}</p>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan


            @can('middleware-passed','menu.index')
                <li class="nav-item has-treeview {{ isActive(['admin/menus*','admin/page*','admin/chairmanMessage','admin/principalMessage','admin/siteinfo','admin/aboutInstitute','admin/GalleryCornerCreate','admin/feature*','admin/sliders','admin/settings/links','admin/socials']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/menus*','admin/page*','admin/chairmanMessage','admin/principalMessage','admin/siteinfo','admin/aboutInstitute','admin/GalleryCornerCreate','admin/feature*','admin/sliders','admin/settings/links','admin/socials']) }}">
                        <i class="fas fa-tasks"></i>
                        <p>
                            {{ __('CMS') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @can('middleware-passed','menu.index')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('menu.index') }}" class="nav-link {{ isActive('admin/menus') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Site Menu') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','page.index')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('page.index') }}" class="nav-link {{ isActive(['admin/pages','admin/page*']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Page Mgmt') }}</p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item has-treeview {{ isActive(['admin/chairmanMessage','admin/principalMessage','admin/siteinfo','admin/aboutInstitute','admin/GalleryCornerCreate','admin/feature*','admin/sliders','admin/settings/links','admin/socials']) }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    {{ __('Frontend Settings') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                                @can('middleware-passed','chairmanMessage.index')
                                    <li class="nav-item">
                                        <a href="{{ route('chairmanMessage.index') }}" class="nav-link {{ isActive('admin/chairmanMessage') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Chairman Message') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','principalMessage.index')
                                    <li class="nav-item">
                                        <a href="{{ route('principalMessage.index') }}" class="nav-link {{ isActive('admin/principalMessage') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Principal Message') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','siteinfo')
                                    <li class="nav-item">
                                        <a href="{{ route('siteinfo') }}" class="nav-link {{ isActive('admin/siteinfo') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Site Basic Info') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','aboutInstitute.index')
                                    <li class="nav-item">
                                        <a href="{{ route('aboutInstitute.index') }}" class="nav-link {{ isActive('admin/aboutInstitute') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('About Institute') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','leaveManagement.index')
                                    <li class="nav-item">
                                        <a href="{{ route('galleryCorner.create') }}" class="nav-link {{ isActive('admin/GalleryCornerCreate') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Suborno Joyontee') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','features.index')
                                    <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('features.index') }}" class="nav-link {{ isActive('admin/feature*') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Feature') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('middleware-passed','slider.index')
                                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('slider.index') }}" class="nav-link {{ isActive('admin/sliders') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Slider') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                    @can('middleware-passed','setting.index')
                                        <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                            <a href="{{ url('admin/settings/links') }}" class="nav-link {{ isActive('admin/settings/links') }}">
                                                <i class="far nav-icon"></i>
                                                <p>{{ __('Important Links') }}</p>
                                            </a>
                                        </li>
                                    @endcan
                                @can('middleware-passed','social.index')
                                    <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                        <a href="{{ route('social.index') }}" class="nav-link {{ isActive('admin/socials') }}">
                                            <i class="far nav-icon"></i>
                                            <p>{{ __('Social Links') }}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('middleware-passed','academic-calender.index')
                <li class="nav-item has-treeview {{ isActive(['admin/setting/email','admin/themes','admin/languages','admin/lang*']) }}">
                    <a href="#" class="nav-link {{ isActive(['admin/setting/email','admin/themes','admin/languages','admin/lang*']) }}">
                        <i class="fas fa-shapes"></i>
                        <p>
                            {{ __('Settings') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                        @can('middleware-passed','academic-calender.index')
                            <li class="nav-item" style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('setting.email') }}" class="nav-link {{ isActive('admin/setting/email') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('E-mail Settings') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','academic-calender.index')
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('theme.index') }}" class="nav-link {{ isActive('admin/themes') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Theme') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('middleware-passed','academic-calender.index')
                            <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                <a href="{{ route('language.index') }}" class="nav-link {{ isActive(['admin/languages','admin/lang*']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Language') }}</p>
                                </a>
                            </li>
                        @endcan

                            @can('middleware-passed','academic-calender.index')
                                {{-- @if(in_array("academic-calender.index", auth()->user()->permissions)) --}}
                                <li class="nav-item"  style="background-color: rgb(40, 40, 45);">
                                    <a href="{{ route('layout.index') }}" class="nav-link {{ isActive(['admin/languages','admin/lang*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Layouts</p>
                                    </a>
                                </li>
                            @endcan
                    </ul>
                </li>
            @endcan

            <li class="nav-item has-treeview {{ isActive(['admin/user/profile','admin/users','admin/user/edit*','admin/role*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/user/profile','admin/users','admin/user/edit*','admin/role*']) }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        {{ __('User Management') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="background-color: rgb(40, 40, 45);">
                    @can('middleware-passed','user.profile')
                    <li class="nav-item" >
                        <a href="{{ route('user.profile') }}" class="nav-link {{ isActive('admin/user/profile') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Profile') }}</p>
                        </a>
                    </li>
                    @endcan
                    @can('middleware-passed','user.index')
                        <li class="nav-item" >
                        <a href="{{ route('user.index') }}" class="nav-link {{ isActive(['admin/users','admin/user/edit*']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Users') }}</p>
                        </a>
                    </li>
                    @endcan
                        @can('middleware-passed','user.index')
                            <li class="nav-item" >
                                <a href="{{ route('role.index') }}" class="nav-link {{ isActive('admin/role*') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Role') }}</p>
                                </a>
                            </li>
                        @endcan
                </ul>
            </li>

            <li class="nav-item has-treeview {{ isActive(['admin/db-backup*']) }}">
                <a href="{{ route('backup.db') }}" class="nav-link {{ isActive(['admin/db-backup*']) }}">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        {{ __('Db-Backup') }}
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview {{ isActive(['admin/result-system']) }}">
                <a href="{{ route('result-system.index') }}" class="nav-link {{ isActive(['admin/result-system']) }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        {{ __('Result System') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>