@extends('layouts.front-inner')

@section('title','Inner Page')

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
                            <a href="#">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('Elements') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('Teachers & Employees') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 wow fadeIn bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h4>
                        {{ __('Teacher & Employee') }}
                    </h4>
                </div>
            </div>

            <div class="row">
                @foreach($teachers as $teacher)
                    <div class="col-lg-3 col-md-6 marginTop-30">
                        <div class="card height-100p border border-light text-center">
                            <img class="card-img-top" src="{{ asset('assets/img/staffs') }}/{{ $teacher->image }}" alt="">
                            <div class="card-body">
                                <h4>{{ $teacher->name }}</h4>
                                <p class="mb-0">
                                    {{ $teacher->title }}
                                </p>
                            </div>
                            <div class="card-footer border-top border-light">
                                {{ $teacher->card_id }}
                            </div>
                        </div>
                    </div> <!-- END col-lg-3 col-md-6-->
                @endforeach
            </div>
        </div> <!-- END container-->
    </section>


@stop