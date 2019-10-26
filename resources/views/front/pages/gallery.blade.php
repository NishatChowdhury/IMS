@extends('layouts.front-inner')

@section('title','Inner Page')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Gallery</h2>
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
                            Gallery
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom border-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav tab-line tab-line--2x border-bottom mb-4 nav-isotop-filter">
                        <a class="nav-item nav-link active" href="#" data-filter="*">
                            All
                        </a>
                        <a class="nav-item nav-link" href="#" data-filter=".creative">
                            Creative
                        </a>
                        <a class="nav-item nav-link" href="#" data-filter=".corporate">
                            Corporate
                        </a>
                        <a class="nav-item nav-link" href="#" data-filter=".ui-ux">
                            UI/UX
                        </a>
                        <a class="nav-item nav-link" href="#" data-filter=".web-design">
                            Web Design
                        </a>
                    </ul>
                </div> <!-- END col-12 -->
            </div> <!-- END row-->
            <div class="row isotop-filter">
                <div class="col-lg-4 col-md-6 marginTop-30 creative">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/1.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/1.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 marginTop-30 corporate creative">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/2.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/2.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 marginTop-30 ui-ux">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/3.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/3.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 marginTop-30 web-design corporate">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/4.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/4.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 marginTop-30 creative ui-ux">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/5.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/5.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 marginTop-30 corporate web-design">
                    <div class="media-viewer">
                        <img class="media-viewer__media" src="assets/img/360x300/1.jpg" alt="">
                        <div class="media-viewer__overlay bg-black-0_7 flex-center">
                            <a href="assets/img/360x300/6.jpg" class="iconbox bg-white" data-fancybox="gallery">
                                <i class="ti-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop