<!DOCTYPE html>
<html dir="{{ lang('direction') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>{{ siteConfig('title') }}</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon/114x114.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/favicon/96x96.png') }}">

  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-M4A4P4GJEr5d5z0ey7VrZ+P5AS6PcJ6/LFWU/OL0y6aKH+7BTgrgK8Jb7H+YGtlm" crossorigin="anonymous">

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-pKzuVY3q1QDfV5d5a5n5nMf5fy6zXUi6U68OWfuUuYwOhGgy6Uk/7xZvg0Wwn1zS" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/venobox/venobox/venobox.min.css" type="text/css"
        media="screen" />
  <script src="https://cdn.jsdelivr.net/npm/venobox/venobox/venobox.min.js"></script>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet" type="text/css" />

  <!-- Style CSS -->
  <link rel="stylesheet" href="{{asset('assets/front_gold/style.css')}}" />
  @yield('style')
  <script src="https://www.vnsc.edu.bd/frontend/vnsc/js/venobox.min.js"></script>

  <!-- Modernizr JS -->
  <script src="{{asset('assets/front_gold/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
<!--Header Area Start-->
<header>
  <div class="header-top">
    <div class="container">
      @include('front_layout_2.front.inc.info-bar')
    </div>
  </div>
  <!-- ------------------ -->
  <div class="col-md-12 py-3 text-center bg-light">
    @yield('title_bar')
  </div>
  <!--Logo Main Menu Start-->
  <div class="header-logo-menu sticker">
    <div class="container">
      <div class="logo-menu-bg">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="logo">
              <a href="{{ url('/') }}"><img src="{{asset('assets/front_gold/img/logo/webpoint_logo.png')}}" alt="logo" /></a>
            </div>
          </div>
          <div class="col-lg-9 d-none d-lg-block">
            <div class="mainmenu-area">
              <div class="mainmenu">
                <nav>
                  @include('front_layout_2.front.inc.dynamic_menu')
                </nav>
              </div>
              <ul class="header-search">
                <li class="search-menu">
                  <i id="toggle-search" class="fa fa-search"></i>
                </li>
              </ul>
              <!--Search Form-->
              <div class="search">
                <div class="search-form">
                  <form id="search-form" action="#">
                    <input type="search" placeholder="Search here..." name="search" />
                    <button type="submit">
                      <span><i class="fa fa-search"></i></span>
                    </button>
                  </form>
                </div>
              </div>
              <!--End of Search Form-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End of Logo Mainmenu-->
  <!-- Mobile Menu Area start -->
  <div class="mobile-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="mobile-menu">
            <nav id="dropdown">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>
                  <a href="index.html">Institute </a>
                  <ul>
                    <li><a href="index.html">About Institute</a>
                      <ul class="subdrop">
                        <li class="bg-primary"><a href="about.html">Introduction</a></li>
                        <li class="bg-success"><a href="GoverningBody.html">Governing Body</a></li>
                        <li class="bg-primary"><a href="Founder.html">Founder & Donor</a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="index.html">Admistration Message <i class="fa fa-angle-right"></i></a>
                      <ul class="subdrop">

                        <li><a href="Principalmessage.html">Principal Message </a></li>
                        <li><a href="Presidentmessage.html">President Message</a></li>

                      </ul>
                    </li>
                    <li>
                      <a href="index.html">Infrastructure <i class="fa fa-angle-right"></i></a>
                      <ul class="subdrop">

                        <li><a href="building.html">Building & Room </a></li>
                        <li><a href="library.html">library</a></li>
                        <li><a href="Transport.html">Transport Management</a></li>
                        <li><a href="Principalmessage.html"> Hostel </a></li>
                        <li><a href="Principalmessage.html">Land Information </a></li>
                      </ul>
                    </li>
                    <li>
                      <a href="index.html">Academics <i class="fa fa-angle-right"></i></a>
                      <ul class="subdrop">

                        <li><a href="Classroutine.html">Class- Routine </a></li>
                        <li><a href="Dairy.html">Diray Management</a></li>
                        <li><a href="AccademicCalender.html">Academic Claender</a></li>
                        <li><a href="Syllabus.html">Syllabus</a></li>
                        <li><a href="Performance.html"> Performance </a></li>

                      </ul>
                    </li>
                    <li>
                      <a href="index.html">Digital Campus<i class="fa fa-angle-right"></i></a>
                      <ul class="subdrop">
                        <li><a href="multimedia.html">Multimedia Class Room </a></li>
                        <li><a href="ComputerLab.html">Computer Lab</a></li>
                        <li><a href="Science.html">Science</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#">Team <i class="fa fa-angle-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="ManagingComt.html"> Managing Committee </a></li>
                    <li><a href="teacher.html"> Teachers </a></li>
                    <li>
                      <a href="Staff.html">Staff</a>
                    </li>
                    <li>
                      <a href="WAPC.html"> Women Abuse Prevention Committee </a>
                    </li>
                    <li>
                      <a href="Tswt.html"> Teacher & Staff Welfare Trust </a>
                    </li>
                    <li>
                      <a href="TCI.html"> Teachers Council Information </a>
                    </li>

                  </ul>
                </li>
                <li>
                  <a href="#">Result<i class="fa fa-angle-down"></i></a>
                  <ul class="sub-menu">
                    <li>
                      <a href="Internalresult.html">Internal Result</a>
                    </li>
                    <li>
                      <a href="PublicResult.html">Public Examination</a>
                    </li>
                    <li>
                      <a href="onlineAdmission.html">Online Admission</a>
                    </li>
                  </ul>
                </li>
                <li><a href="gallery.html">Gallery</a></li>
                <li>
                  <a href="index.html">News & Notice<i class="fa fa-angle-down"></i></a>
                  <ul class="sub-menu">
                    <li><a href="news.html">Notice & News</a></li>

                  </ul>
                </li>
                <li>
                  <a href="#">Information<i class="fa fa-angle-down"></i></a>
                  <ul class="sub-menu">
                    <li>
                      <a href="SportsCulturalActivities.html"> Sports & Cultural Program </a>
                    </li>
                    <li>
                      <a href="centerInformation.html"> Center Information </a>
                    </li>
                    <li>
                      <a href="Scholor.html"> Scholarship Info </a>
                    </li>
                    <li>
                      <a href="Bncc.html"> BNCC </a>
                    </li>
                    <li>
                      <a href="Rover.html"> Rover Scout </a>
                    </li>
                    <li>
                      <a href="tander.html"> Tender </a>
                    </li>
                    <li>
                      <a href="Privacy.html"> Privacy Policy </a>
                    </li>
                  </ul>
                </li>
                <li><a href="contact.html">CONTACT</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Menu Area end -->

</header>
<!--End of Header Area-->
<!-- slider -->
@yield('content')


<!--End of Contact Area-->

<!--Footer Area Start-->
<div class="footer-area">
  <div class="container">
    @include('front_layout_2.front.inc.footer-top')
    @include('front_layout_2.front.inc.footer-bottom')
  </div>
</div>
<!--End of Footer Area-->
<!-- <div class="footerCopyRight">

</div> -->




<!-- jquery -->
<script src="{{asset('assets/front_gold/js/vendor/jquery-1.12.3.min.js')}}"></script>

<!-- Popper JS
asset('assets/front_gold/')
      ============================================ -->
<script src=" {{asset('assets/front_gold/js/popper.js')}}"></script>

<!-- bootstrap -->
<script src="{{ asset('assets/front_gold/js/bootstrap.min.js') }}"></script>

<!-- bootstrap Toggle JS -->
<script src="{{ asset('assets/front_gold/js/bootstrap-toggle.min.js')}}"></script>

<!-- nivo slider js -->
<script src="{{asset('assets/front_gold/lib/nivo-slider/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('assets/front_gold/lib/nivo-slider/home.js')}}"></script>

<!-- wow JS -->
<script src="{{asset('assets/front_gold/js/wow.min.js')}}"></script>

<!-- meanmenu JS -->
<script src="{{asset('assets/front_gold/js/jquery.meanmenu.js')}}"></script>

<!-- Owl carousel JS -->
<script src="{{asset('assets/front_gold/js/owl.carousel.min.js')}}"></script>

<!-- Countdown JS -->
<script src="{{asset('assets/front_gold/js/jquery.countdown.min.js')}}"></script>

<!-- scrollUp JS -->
<script src="{{asset('assets/front_gold/js/jquery.scrollUp.min.js')}}"></script>

<!-- Waypoints JS -->
<script src="{{asset('assets/front_gold/js/waypoints.min.js')}}"></script>

<!-- Counterup JS -->
<script src="{{asset('assets/front_gold/js/jquery.counterup.min.js')}}"></script>

<!-- Slick JS -->
<script src="{{asset('assets/front_gold/js/slick.min.js')}}"></script>

<!-- Mix It Up JS -->
<script src="{{asset('assets/front_gold/js/jquery.mixitup.js')}}"></script>

<!-- Venubox JS -->
<script src="{{asset('assets/front_gold/js/venobox.min.js')}}"></script>

<!-- plugins JS -->
<script src="{{asset('assets/front_gold/js/plugins.js')}}"></script>


<!-- main JS -->
<script src="{{asset('assets/front_gold/js/main.js')}}"></script>
<!-- Pull to refresh -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.21/index.umd.min.js" integrity="sha512-oEw4xuIi6LVmWze9XMkOUKVrN3l4gIMDrnuci0T3NlcM5tbK9R21ZgP6mqOcit7m41sahXSIG88WOPKgFSWalA==" crossorigin="anonymous"></script>
<script>
  const ptr = PullToRefresh.init({
    mainElement: 'body',
    onRefresh() {
      window.location.reload();
    }
  });
</script>
@yield('script')
</body>

</html>