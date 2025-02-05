@extends('layouts.front_gold')

@section('title','Managing Committee')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('Maneging Committee')}}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Elements')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('Maneging Committee')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 marginTop-30">
                    <div class="card height-100p border border-light text-center">
                        <img class="card-img-top" src="assets/img/262x230/8.jpg" alt="">
                        <div class="card-body">
                            <h4>
                                {{ __(' John doe')}}
                            </h4>
                            <p class="mb-0">
                                {{ __(' PHP Instructor')}}
                            </p>
                        </div>
                        <div class="card-footer border-top border-light">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-email"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-lg-3 col-md-6-->

                <div class="col-lg-3 col-md-6 marginTop-30">
                    <div class="card height-100p border border-light text-center">
                        <img class="card-img-top" src="assets/img/262x230/7.jpg" alt="">
                        <div class="card-body">
                            <h4>
                                {{ __(' William')}}
                            </h4>
                            <p class="mb-0">
                                {{ __(' UI/UX Engineer')}}
                            </p>
                        </div>
                        <div class="card-footer border-top border-light">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-email"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-lg-3 col-md-6-->

                <div class="col-lg-3 col-md-6 marginTop-30">
                    <div class="card height-100p border border-light text-center">
                        <img class="card-img-top" src="assets/img/262x230/6.jpg" alt="">
                        <div class="card-body">
                            <h4>
                                Alex lobby
                            </h4>
                            <p class="mb-0">
                                Java developer
                            </p>
                        </div>
                        <div class="card-footer border-top border-light">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-email"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-lg-3 col-md-6-->

                <div class="col-lg-3 col-md-6 marginTop-30">
                    <div class="card height-100p border border-light text-center">
                        <img class="card-img-top" src="assets/img/262x230/5.jpg" alt="">
                        <div class="card-body">
                            <h4>
                                Jonathon Troat
                            </h4>
                            <p class="mb-0">
                                Python Ninja
                            </p>
                        </div>
                        <div class="card-footer border-top border-light">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-email"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END col-lg-3 col-md-6-->

            </div>
        </div> <!-- END container-->
    </section>

@stop