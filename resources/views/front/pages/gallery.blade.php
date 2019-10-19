@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>gallery</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Elements</a>
                        </li>
                        <li class="breadcrumb-item">
                            About us
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                {!! $content->content !!}

                <section class="padding-y-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mb-md-4">
                                <h2 class="mb-4">
                                    Campus Life
                                </h2>
                                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                            </div>
                        </div> <!-- END row-->
                        <div class="row">
                            <div class="col-lg-6 marginTop-30">
                                <img class="w-100" src="assets/img/555x490/1.jpg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-6 marginTop-30">
                                        <div class="position-relative">
                                            <img class="w-100" src="assets/img/262x230/1.jpg" alt="">
                                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="position-absolute absolute-center iconbox iconbox-lg bg-white ">
                                                <i class="ti-control-play text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 marginTop-30">
                                        <div class="position-relative">
                                            <img class="w-100" src="assets/img/262x230/2.jpg" alt="">
                                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="position-absolute absolute-center iconbox iconbox-lg bg-white ">
                                                <i class="ti-control-play text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 marginTop-30">
                                        <div class="position-relative">
                                            <img class="w-100" src="assets/img/262x230/3.jpg" alt="">
                                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="position-absolute absolute-center iconbox iconbox-lg bg-white ">
                                                <i class="ti-control-play text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 marginTop-30">
                                        <div class="position-relative">
                                            <img class="w-100" src="assets/img/262x230/4.jpg" alt="">
                                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" data-fancybox class="position-absolute absolute-center iconbox iconbox-lg bg-white ">
                                                <i class="ti-control-play text-primary"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- END row-->
                    </div> <!-- END container-->
                </section>

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop