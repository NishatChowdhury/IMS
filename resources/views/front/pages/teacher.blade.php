@extends('layouts.front-inner')

@section('title','Teachers | Lavender International School')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>Teacher</h2>
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
                            Teacher
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="padding-y-100 wow fadeIn bgdark">
        <div class="container">
            <div class="row">
                @isset($teachers)
                    @foreach($teachers as $teacher)
                        <div class="col-lg-3 col-md-6 marginTop-30">
                            <div class="card height-100p  border border-light text-center">
                                <img class="card-img-top mx-auto rounded" src="{{ asset('storage/uploads/staffs') }}/{{ $teacher->image }}" alt="">
                                <div class="card-body  ">
                                    <h4>
                                        {{ $teacher->name }}
                                    </h4>
                                    <p class="mb-0">
                                        {{ $teacher->title }}
                                    </p>
                                </div>
                                {{--                            <div class="card-footer border-top border-light">--}}
                                {{--                                <ul class="list-inline mb-0">--}}
                                {{--                                    <li class="list-inline-item mr-0">--}}
                                {{--                                        <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-email"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="list-inline-item mr-0">--}}
                                {{--                                        <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-facebook"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="list-inline-item mr-0">--}}
                                {{--                                        <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-twitter"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="list-inline-item mr-0">--}}
                                {{--                                        <a href="#" class="btn bg-light-v2 iconbox iconbox-sm rounded hover:primary"><i class="ti-linkedin"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                </ul>--}}
                                {{--                            </div>--}}
                            </div>
                        </div> <!-- END col-lg-3 col-md-6-->
                    @endforeach
                @endisset
            </div>
        </div> <!-- END container-->
    </section>

@stop
