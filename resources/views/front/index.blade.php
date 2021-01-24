@extends('layouts.front')

@section('content')

    @include('front.carousel')

    @include('front.features')

    @include('front.notice')

    @include('front.chairman')

    <hr>

    @include('front.message')

    @include('front.events')

    {{--@include('front.gallery')--}}

    @include('front.progress-bar')

    @include('front.news')

    @include('front.result')

    @unless(URL::current() == 'https://bnsck.edu.bd')
        <!-- will be open after finishing teacher -->
        @include('front.teacher')
    @endunless

@stop
