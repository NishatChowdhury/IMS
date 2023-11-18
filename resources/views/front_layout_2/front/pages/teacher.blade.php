@extends('layouts.front_gold')

@section('title',)

@section('content')

     <div class="breadcrumb-banner-area teachers">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-text">
                            <h1 class="text-center">Teachers</h1>
                            <div class="breadcrumb-bar">
                                <ul class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Teachers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   <!--Teacher Fullwidth Area Start-->
        <div class="teacher-fullwidth-area section-padding">
            <div class="container">
                <div class="row">
				@isset($teachers)
				  @foreach($teachers as $teacher)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="single-teachers-column text-center">
                            <div class="teachers-image-column">
                                <a href="teacher-info.html">
                                     <img src="{{ asset('storage/uploads/staffs/') }}/{{ $teacher->image }}" alt="{{ $teacher->name }}" alt="" />
                                    <span class="image-hover">
                                        <span><i class="fa fa-edit"></i>View Profile</span>
                                    </span>
                                </a>
                            </div>
                            <div class="teacher-column-carousel-text">
                                <h4>{{$teacher->name}}</h4>
                                <span>{{$teacher->title}}</span>
                                <p>{{$teacher->academic_qualifications?? ''}}</p>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					  @endforeach
					@endisset
                   
                </div>
                <div class="col-md-12">
                    <div class="button text-center">
                        <a href="#" class="button-default button-yellow"><i class="fa fa-refresh"></i>Load More</a>
                    </div>
                </div>
            </div>
        </div>
@stop
