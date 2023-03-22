@extends('hrm::layouts.master')

@section('title', 'Student | Student Id Card')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Select ID Card') }}</h1>
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
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v1') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_1.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v2') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_2.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v6') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_6.png') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v4') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_4.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v7') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_7.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v5') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_5.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v8') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_8.jpeg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v9') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_9.jpeg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0 text-center">
                    <a href="{{ route('student.generateStudentCard_v3') }}">
                        <img src="{{ asset('assets/img/studentIdCard/studentId_3.jpg') }}"
                             class="w-75 shadow-1-strong rounded img-thumbnail mb-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>
@stop

<!-- *** External CSS File -->
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
