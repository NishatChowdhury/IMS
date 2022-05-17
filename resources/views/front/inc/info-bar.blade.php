<div class="container">
    <div class="row align-items-center justify-content-between mx-0">
        <ul class="list-inline d-none d-lg-block mb-0">
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="ti-email mr-2"></i>
                    <a href="mailto:{{ siteConfig('email') }}">{{ siteConfig('email') }}</a>
                </div>
            </li>
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-phone-square-alt mr-2"></i>
                    <a href="tel:{{  siteConfig('phone') }}">{{  siteConfig('phone') }}</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                <span>{{ __('EIIN') }}: {{ siteConfig('eiin') }}</span>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                <span>{{ __('Institute Code') }}: {{ siteConfig('code') }}</span>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                @auth('student')
                    <a class="dropdown-item" style="color: #fff; background: none;"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                <a href="{{ url('student/login') }}">Login</a>
                @endauth
            </li>
        </ul>
    </div> <!-- END END row-->
</div> <!-- END container-->
