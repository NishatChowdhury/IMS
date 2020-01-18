<section class="padding-y-100" style="background-color: rgba(88,203,83,0.7);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">
                    {{--<div class="col-md-6 my-5">--}}
                        {{--<div class="position-relative">--}}
                            {{--<img class="rounded w-100" src="assets/img/360x400/1.jpg" alt="">--}}
                            {{--<a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="iconbox iconbox-lg bg-white position-absolute absolute-center">--}}
                            {{--<i class="ti-control-play text-primary"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-12 mt-4">
                        <h2>
                            <small class="d-block text-white">Welcome to</small>
                            <span class="text-black">{{ siteConfig('name') }}</span>
                        </h2>
                        <p class="my-4 text-white">
                            {!! substr($content->where('name','introduction')->first()->content,0,500) !!}...
                        </p>
                        <a href="{{ url('introduction') }}" class="btn btn-outline-light">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
                    <div class="card-header text-white border-bottom-0" style="background-color: #97a1aa">
            <span class="lead font-semiBold text-uppercase">
              Notice Board
            </span>
                    </div>
                    @foreach($notices as $notice)
                        <div class="p-4 border-bottom wow fadeInUp">
                            <p class="text-primary mb-1">
                                {{ $notice->start->format('F d, Y') }}
                            </p>
                            <a href="{{ action('FrontController@noticeDetails',$notice->id) }}">
                                {{ $notice->title }}
                            </a>
                        </div>
                    @endforeach

                    {{--<div class="p-4 border-bottom wow fadeInUp">--}}
                    {{--<p class="text-primary mb-1">--}}
                    {{--July 17, 2018--}}
                    {{--</p>--}}
                    {{--<a href="#">--}}
                    {{--Nullam quis ante etiam sit amet eget eros faucibus--}}
                    {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="p-4 border-bottom wow fadeInUp">--}}
                    {{--<p class="text-primary mb-1">--}}
                    {{--June 08, 2018--}}
                    {{--</p>--}}
                    {{--<a href="#">--}}
                    {{--Adsing eusmo tempor indeduny--}}
                    {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="p-4 border-bottom wow fadeInUp">--}}
                    {{--<p class="text-primary mb-1">--}}
                    {{--June 20, 2018--}}
                    {{--</p>--}}
                    {{--<a href="#">--}}
                    {{--Nullam quis ante etiam sit amet eget eros faucibus--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="p-4">--}}
                    {{--<a href="#" class="btn btn-link pl-0">--}}
                    {{--View All Notices--}}
                    {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>