@extends('layouts.front-inner')

@section('title','Staff')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Staff</h2>
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
                            Staff
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 wow fadeIn">
        <div class="container">
            <div class="row">
                @foreach($staffs as $staff)
                <div class="col-lg-6 mt-2">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="{{ asset('assets/img/staffs') }}/{{ $staff->image }}" alt="">
                        </div>
                        <div class="col-md-6 my-4">
                            <h4 class="mb-0">
                                {{ $staff->name }}
                            </h4>
                            <p class="text-muted mb-0">
                                {{ $staff->title }}
                            </p>
                            <p class="my-4">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil they imper.
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-facebook iconbox iconbox-xs"><i class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-twitter iconbox iconbox-xs"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-google-plus iconbox iconbox-xs"><i class="ti-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-linkedin iconbox iconbox-xs"><i class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop