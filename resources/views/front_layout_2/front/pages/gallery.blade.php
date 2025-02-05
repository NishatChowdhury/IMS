@extends('layouts.front_gold')

@section('title','Gallery')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2 style="color: white">{{ __('Gallery')}}</h2>
                </div>

            </div>
        </div>
    </div>

    <div class="gallery-area section-padding gallery-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-menu">
                        <ul>
                            <li class="filter" data-filter="all">All</li>
                            <li class="filter" data-filter=".drawing">Drawing</li>
                            <li class="filter" data-filter=".excursions">Excursions</li>
                            <li class="filter" data-filter=".courses">Courses</li>
                            <li class="filter" data-filter=".play">Play time</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter-items">
                <div class="row">
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items drawing overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="{{asset('assets/front_gold/img/gallery/10.jpg')}}" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="{{asset('assets/front_gold/img/gallery/10.jpg')}}"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Drawings</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play courses overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/2.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/2.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Activities, Photos</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/3.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/3.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Play Time</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play excursions overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/3.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/3.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Excursions, Play</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items courses excursions overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/5.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/5.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Courses, Exursions</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items drawing overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/12.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/12.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Drawing</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items courses excursions overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/6.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/6.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Excursions, Courses</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items excursions overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/10.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/10.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Drawing, Exursions</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items drawing overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/7.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/7.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Drawings</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play courses overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/13.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/13.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Activities, Photos</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/14.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/14.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Play Time</span>
                            </div>
                        </div>
                    </div>
                    <div
                            class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items play excursions overlay-hover"
                    >
                        <div class="overlay-effect">
                            <a href="#"><img src="img/gallery/8.jpg" alt="" /></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="img/gallery/8.jpg"
                                ><i class="fa fa-image"></i
                                    ></a>
                                <span class="gallery-text">Excursions, Play</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="button text-center">
                        <a class="button-default button-yellow" href="#"
                        ><i class="fa fa-refresh"></i>Load More</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop