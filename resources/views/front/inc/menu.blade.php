<div class="container-fluid">
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
                    <a class="nav-link" href="{{action('FrontController@index')}}" >{{ __('Home') }}</a>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Institute') }}</a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('About Institute') }} </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ url('introduction') }}"> {{ __('Introduction ') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@governing_body')}}"> {{ __('Governing Body') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@donor')}}"> {{ __('Founder & Donor') }}</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('Administrative Message') }} </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ action('FrontController@president') }}"> {{ __('President Message ') }}</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@principal') }}"> {{ __('Principal Message') }}</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('Infrastructure') }} </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{action('FrontController@building_room')}}"> {{ __('Building & Rooms ') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@library')}}"> {{ __('Library') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@transport')}}"> {{ __('Transport') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@hostel')}}"> {{ __('Hostel') }}</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@land_information') }}"> {{ __('Land Information') }}</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('Academics') }} </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{action('FrontController@class_routine')}}"> {{ __('Class Routine ') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@calender')}}">{{ __('Academic Calender') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@syllabus')}}"> {{ __('Syllabus') }}</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@diary') }}"> {{ __('Diary') }}</a></li>
                                        <li><a class="nav-link__list" href="{{action('FrontController@performance')}}"> {{ __('Performance') }}</a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@holiday') }}"> {{ __('Annual Holiday List') }}</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item__has-dropdown">
                                <a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('Digital Campus') }} </a>
                                <div class="dropdown-menu">
                                    <ul class="list-unstyled">
                                        <li><a class="nav-link__list" href="{{ action('FrontController@multimedia_classroom') }}"> {{ __('Multimedia Class Room') }} </a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@computer_lab') }}"> {{ __('Computer Lab') }} </a></li>
                                        <li><a class="nav-link__list" href="{{ action('FrontController@science_lab') }}"> {{ __('Science Lab') }} </a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ __('Team') }}</a>
                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list" href="{{action('FrontController@managing_committee')}}">{{ __('Managing Committee') }}</a></li>
                            <li><a class="nav-link__list" href="{{action('FrontController@teacher')}}">{{ __('Teachers') }}</a></li>
                            <li><a class="nav-link__list" href="{{action('FrontController@staff')}}">{{ __('Staffs') }}</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@wapc') }}">{{ __('Women Abuse Prevention Committee(WAPC)') }}</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@tswt') }}">{{ __('Teacher & Staff Welfare Trust') }}</a></li>
                            <li><a class="nav-link__list" href="{{ action('FrontController@tci') }}">{{ __('Teachers Council Information') }}</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ __('Result') }}</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@internal_exam')}}">{{ __('Internal Result') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@public_exam')}}">P{{ __('ublic Examination') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@admission')}}">{{ __('Online Admission') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ __('Information') }}</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@sports_n_culture_program') }}">{{ __('Sports & Cultural Program ') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@center_information') }}"> {{ __('Centre Information ') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@scholarship_info') }}"> {{ __('Scholarship Info') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@bncc') }}"> {{ __('BNCC Info ') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@scout') }}"> {{ __('Rover Scouts ') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{ action('FrontController@tender') }}"> {{ __('Tender ') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ __('Attendance') }}</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@attendance_summery')}}">{{ __('Summery') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@student_attendance')}}">{{ __('Students') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@teacher_attendance')}}">{{ __('Teachers & Staffs') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ __('News & Notice') }}</a>
                    <div class="dropdown-menu left-auto p-2 p-md-4">
                        <ul class="list-unstyled">
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@notice')}}">{{ __('Notice') }}</a></li>
                            <li><a class="nav-link__list px-0" href="{{action('FrontController@news')}}">{{ __('News') }}</a></li>
                        </ul>

                    </div>
                </li>
                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@gallery') }}">{{ __('Gallery') }}</a>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@download') }}">{{ __('Download') }}</a>
                </li>

                <li class="nav-item nav-item__has-dropdown">
                    <a class="nav-link no-caret" href="{{ action('FrontController@contact') }}">{{ __('Contacts') }}</a>
                </li>

            </ul>
        </div>

    </div>
</div> <!-- END container-->
