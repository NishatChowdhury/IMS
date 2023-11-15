@extends('hrm::layouts.master')

@section('style')
    <style>
        ul.parent_info {
            margin: 0px;
            padding: 0px;
        }

        ul.parent_info li {
            list-style: none;
            padding: 0px;
            margin-left: 2px;
            line-height: 12px;
        }
    </style>
@endsection
@section('title','Student Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Student Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('assets/img/exStudents/') }}/{{ $student->image }}"
                                     alt="">
                            </div>

                            <h1 class="profile-username text-center">{{ $student->student_name }}</h1>
                            <h3 class="profile-username text-center">{{ $student->mobile }}</h3>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-male"></i> Personal Details</strong>
                            <hr>
                            <ul class="parent_info">
                                <li>
                                    <p><strong>{{ __('EMAIL        :') }}</strong>{{ $student->email ?? '' }}</p>
                                    <p><strong>{{ __('PASSING YEAR :') }}</strong>{{ $student->passing_year ?? '' }}</p>
                                    <p><strong>{{ __('MOBILE       :') }}</strong>{{ $student->mobile ?? '' }}</p>
                                    <p><strong>{{ __('BLOOD GROUP  :') }}</strong>{{ $student->bloodGroup->name ?? '' }}</p>
                                    <p><strong>{{ __('PROFESSION   :') }}</strong>{{ $student->profession ?? '' }}</p>
                                </li>
                            </ul>
                            <hr>

                            <strong><i class="fa fa-male"></i> Father Name</strong>
                            <hr>
                            <ul class="parent_info">
                                <li>
                                    <label for="">Name</label>
                                    <p>{{ $student->father ?? '' }}</p>
                                </li>
                            </ul>

                            <hr>
                            <strong><i class="fa fa-female"></i> Mother Name</strong>
                            <hr>
                            <ul class="parent_info">
                                <li>
                                    <label for="">Name</label>
                                    <p>{{ $student->mother ?? ''}}</p>
                                </li>
                            </ul>
                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>

                            <p class="text-muted">
                                {{ __('Present Address') }}:{{ $student->present_address ?? ''}} <br>
                                {{ __('Permanent Address') }}:{{ $student->permanent_address ?? ''}} <br>
                            </p>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
