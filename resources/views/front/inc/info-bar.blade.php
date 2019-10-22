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


<section class="" data-primary-overlay="7" style="background-color: #38c773">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center text-white">
                <h2 class="mb-4">
                    {{ siteConfig('name') }}<br>
                    {{ siteConfig('bn') }}
                </h2>
                {{--<div class="width-3rem height-4 rounded bg-white mx-auto"></div>--}}
            </div>

            {{--<div class="col-md-4 mt-4">--}}
                {{--<div class="card">--}}
                    {{--<img class="card-img-top" src="assets/img/360x220/1.jpg" alt="">--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="h5">--}}
                            {{--Harvard Panel Examines Future of Cities--}}
                        {{--</h4>--}}
                        {{--<ul class="list-unstyled my-4 line-height-xl">--}}
                            {{--<li>--}}
                                {{--<i class="ti-time mr-2 text-primary"></i>--}}
                                {{--April 13, 2018 @ 8:00 am--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<i class="ti-location-pin mr-2 text-primary"></i>--}}
                                {{--184 Main Collins Street--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a href="#" class="text-primary">--}}
                            {{--View Details--}}
                            {{--<i class="ti-angle-double-right small"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div> <!-- END col-md-4-->--}}

            {{--<div class="col-md-4 mt-4">--}}
                {{--<div class="card">--}}
                    {{--<img class="card-img-top" src="assets/img/360x220/2.jpg" alt="">--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="h5">--}}
                            {{--Farmer's Market at Harvard, Collins Street--}}
                        {{--</h4>--}}
                        {{--<ul class="list-unstyled my-4 line-height-xl">--}}
                            {{--<li>--}}
                                {{--<i class="ti-time mr-2 text-primary"></i>--}}
                                {{--April 13, 2018 @ 8:00 am--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<i class="ti-location-pin mr-2 text-primary"></i>--}}
                                {{--184 Main Collins Street--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a href="#" class="text-primary">--}}
                            {{--View Details--}}
                            {{--<i class="ti-angle-double-right small"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div> <!-- END col-md-4-->--}}

            {{--<div class="col-md-4 mt-4">--}}
                {{--<div class="card">--}}
                    {{--<img class="card-img-top" src="assets/img/360x220/3.jpg" alt="">--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="h5">--}}
                            {{--A Conversation with Wynton Marsalis--}}
                        {{--</h4>--}}
                        {{--<ul class="list-unstyled my-4 line-height-xl">--}}
                            {{--<li>--}}
                                {{--<i class="ti-time mr-2 text-primary"></i>--}}
                                {{--April 13, 2018 @ 8:00 am--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<i class="ti-location-pin mr-2 text-primary"></i>--}}
                                {{--184 Main Collins Street--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a href="#" class="text-primary">--}}
                            {{--View Details--}}
                            {{--<i class="ti-angle-double-right small"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div> <!-- END col-md-4-->--}}
            {{--<div class="col-12 mt-5 text-center">--}}
                {{--<a href="#" class="btn btn-outline-white-hover">More Events</a>--}}
            {{--</div>--}}
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>