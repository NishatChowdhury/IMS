@extends('hrm::layouts.master')

@section('title', 'Student | Student Id Card')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Student ID Card (Select One)') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Student') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Student ID Card') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v1') }}">
                            <img class="card-img-top img-fluid"
                                src="{{ asset('assets/img/studentIdCard/studentId_1.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h3 class="card-title text-center"><b>{{ __('Card Layout 01') }}</b></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v2') }}">
                            <img class="card-img-top img-fluid" 
                                src="{{ asset('assets/img/studentIdCard/studentId_2.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 02') }}</b></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v4') }}">
                            <img class="card-img-top img-fluid"
                                src="{{ asset('assets/img/studentIdCard/studentId_4.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 03') }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v5') }}">
                            <img class="card-img-top img-fluid" 
                                src="{{ asset('assets/img/studentIdCard/studentId_5.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 04') }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v6') }}">
                            <img class="card-img-top img-fluid" 
                                src="{{ asset('assets/img/studentIdCard/studentId_6.png') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 05') }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v7') }}">
                            <img class="card-img-top img-fluid" 
                                src="{{ asset('assets/img/studentIdCard/studentId_7.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 06') }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student.generateStudentCard_v3') }}">
                            <img class="card-img-top img-fluid" src="{{ asset('assets/img/studentIdCard/studentId_3.jpg') }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><b>{{ __('Card Layout 07') }}</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

{{-- js file --}}
@section('plugin')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js">
    </script>{{--
    <script src= "{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script> --}}
@stop
