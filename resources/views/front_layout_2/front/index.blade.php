{{--@extends('layouts.test-layout')--}}
@extends('layouts.front_gold')
@section('title_bar')
    @include('front_layout_2.front.inc.title-bar')
@endsection
@section('content')

    
    @include('front_layout_2.front.carousel')
   

    
    {{-- @include('front_gold.bootstrap-carousel')--}}
    

    @include('front_layout_2.front.features')

    @include('front_layout_2.front.notice')

    @include('front_layout_2.front.chairman')

   {{-- <hr>--}}
   
    


    @include('front_layout_2.front.events')

    @include('front_layout_2.front.progress-bar')

    @include('front_layout_2.front.galleryCorner')

    @include('front_layout_2.front.news')
	
     @include('front_layout_2.front.teacher')
    
	@include('front_layout_2.front.subscribe')
	
	@include('front_layout_2.front.contact')

@stop
