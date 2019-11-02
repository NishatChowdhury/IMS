<div class="container">
    <div class="row align-items-center justify-content-between mx-0">
        <ul class="list-inline d-none d-lg-block mb-0">
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="ti-email mr-2"></i>
                    <a href="mailto:support@educati.com">{{ siteConfig('email') }}</a>
                </div>
            </li>
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="ti-headphone mr-2"></i>
                    <a href="tel:+8801740411513">{{ siteConfig('phone') }}</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                {{--<a href="#"><i class="ti-facebook"></i></a>--}}
                <span>EIIN: {{ siteConfig('eiin') }}</span>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                {{--<a href="#"><i class="ti-twitter"></i></a>--}}
                <span>Institute Code: {{ siteConfig('institute_code') }}</span>
            </li>
            {{--<li class="list-inline-item mr-0 p-3 border-right border-white-0_1">--}}
                {{--<a href="#"><i class="ti-vimeo"></i></a>--}}
            {{--</li>--}}
            {{--<li class="list-inline-item mr-0 p-3 border-right border-white-0_1">--}}
                {{--<a href="#"><i class="ti-linkedin"></i></a>--}}
            {{--</li>--}}
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                <a href="{{ route('login') }}">Login</a>
            </li>
            {{--<li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">--}}
                {{--<a href="page-signup.html">Register</a>--}}
            {{--</li>--}}
        </ul>
    </div> <!-- END END row-->
</div> <!-- END container-->


