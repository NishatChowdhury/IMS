<div class="container">
    <div class="navbar p-0 navbar-expand-lg">
        {{--<div class="navbar-brand ml-5">--}}
        {{--<a class="logo-default" href="index.html"><img alt="" src="assets/img/logo-black.png"></a>--}}
        {{--<a class="logo-default" href="{{ url('/') }}"><img alt="" src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" width="75" height="75"></a>--}}
        {{--</div>--}}
        <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
        <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            <ul class="nav navbar-nav ec-nav__navbar ml-auto">
                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                    <a class="nav-link" href="{{ url('/') }}" >{{ __('Home') }}</a>
                </li>
                @foreach(menus() as $menu)
                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link {{ $menu->hasChild() ? 'dropdown-toggle' : '' }}" href="{{ url('page',$menu->uri) }}" {{ $menu->hasChild() ? 'data-toggle=dropdown' : '' }}>{{ $menu->name }}</a>
                        @if($menu->hasChild())
                            <div class="dropdown-menu">
                                <ul class="list-unstyled">
                                    @foreach($menu->childrenActive->sortBy('order') as $subMenu)
                                        <li class="{{ $subMenu->hasChild() ? 'nav-item__has-dropdown' : '' }}">
                                            <a class="nav-link__list {{ $subMenu->hasChild() ? 'dropdown-toggle' : '' }}" href="{{ $subMenu->url ?: url('page',$subMenu->uri) }}" {{ $subMenu->hasChild() ? 'data-toggle=dropdown' : '' }}> {{ $subMenu->name }} </a>
                                            @if($subMenu->hasChild())
                                                <div class="dropdown-menu">
                                                    <ul class="list-unstyled">
                                                        @foreach($subMenu->childrenActive->sortBy('order') as $subSubMenu)
                                                            <li><a class="nav-link__list" href="{{ url('page',$subSubMenu->uri) }}"> {{ $subSubMenu->name }} </a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                    <a class="nav-link" href="{{ url('ex_student_registration') }}" >{{ __('প্রাক্তন শিক্ষার্থী রেজিস্ট্রেশন ফর্ম') }}</a>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle no-caret" href="#" data-toggle="dropdown"><i class="fas fa-language"></i></a>
                    <ul class="dropdown-menu dropdown-cart" aria-labelledby="navbarDropdown" style="width: auto">
                        @foreach(languages() as $language)
                            <li class="dropdown-cart__item">
                                <a class="nav-link__list" href="{{ url('lang',$language->id) }}"> {{ $language->name }} </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div> <!-- END container-->
