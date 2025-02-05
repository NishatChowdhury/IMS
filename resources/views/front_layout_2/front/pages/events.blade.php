@extends('layouts.front_gold')

@section('title','Events')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('Events')}}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __('News') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('Events') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-60 bg-light">
        <div class="container">

            <div class="list-card align-items-center shadow-v2 px-3">
                <div class="col-lg-4 py-4">
                    <img class="w-100" src="{{ asset('storage/uploads/events/') }}/{{ $event->image }}" alt="">
                </div>
                <div class="col-lg-8 py-4">
                    <a href="#" class="h4">
                        {{ $event->title }}
                    </a>
                    <ul class="list-inline text-gray mt-3">
                        <li class="list-inline-item mr-2">
                            <i class="ti-time text-primary mr-1"></i>
                            {{ $event->date->format('F d, Y') }}
                        </li>
                        <li class="list-inline-item mr-2">
                            <i class="ti-location-pin text-primary mr-1"></i>
                            {{ $event->venue }}
                        </li>
                    </ul>

                    <p>
                        {{ $event->details }}
                    </p>

                    <ul class="list-inline mt-4" data-countdown="{{ $event->date }}">
                        <li class="list-inline-item iconbox iconbox-xxxl border border-light mb-2">
                            <h2 class="countdown-days mb-0 text-primary"></h2>
                            <span>{{ __('Days')}}</span>
                        </li>
                        <li class="list-inline-item iconbox iconbox-xxxl border border-light mb-2">
                            <h2 class="countdown-hours mb-0 text-primary"></h2>
                            <span>{{ __('Hours')}}</span>
                        </li>
                        <li class="list-inline-item iconbox iconbox-xxxl border border-light mb-2">
                            <h2 class="countdown-minutes mb-0 text-primary"></h2>
                            <span>{{ __('Minutes')}}</span>
                        </li>
                        <li class="list-inline-item iconbox iconbox-xxxl border border-light mb-2">
                            <h2 class="countdown-seconds mb-0 text-primary"></h2>
                            <span>{{ __('Second')}}</span>
                        </li>
                    </ul>
                </div>
            </div> <!-- END card-list-->

            <div class="row">

                @foreach($events as $event)
                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="{{ asset('assets/img/events/') }}/{{ $event->image }}" alt="">
                        <div class="card-body">
                            <a href="#" class="h4">
                                {{ $event->title }}
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                <li><i class="ti-time text-primary mr-2"></i>{{ $event->date->format('F d, Y') }}</li>
                                <li><i class="ti-location-pin text-primary mr-2"></i>{{ $event->venue }}</li>
                            </ul>
                            <a href="{{ action('Front\FrontController@event',$event->id) }}" class="btn btn-link pl-0">{{ __('View
                                Detail')}}s</a>
                        </div>
                    </div>
                </div>
                @endforeach



                <div class="col-12 marginTop-80">
                    <ul class="pagination pagination-primary justify-content-center">
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-angle-left small"></i>
                            </a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">1</a>
                        </li>
                        <li class="page-item active disabled mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">2</a>
                        </li>
                        <li class="page-item disabled mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-more-alt"></i>
                            </a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">16</a>
                        </li>
                        <li class="page-item mx-1">
                            <a class="page-link iconbox iconbox-sm rounded-0" href="#">
                                <i class="ti-angle-right small"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>




@stop
