{ __{('')}}@extends('layouts.front_gold')

@section('title','Teacher Attendance')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('Teacher Attendance')}}</h2>
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

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

@stop