@extends('layouts.fixed')

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
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('assets/img/students/') }}/{{ $student->image }}"
                                     alt="">
                            </div>

                            <h2 class="profile-username text-center">{{ $student->name }}</h2>
                            <p class="text-muted text-center">
                                {{ $student->studentId }} <br>
                                {{ $student->mobile }} <br>
                                {{ $student->email ? $student->email : 'N/A' }} <br>
                                Date Of Birth : {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d m Y') : 'N/A' }}
                            </p>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Class</b> <a class="float-right">{{ $student->classes->name }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Group</b> <a class="float-right">{{ $student->group ? $student->group->name : 'N/A'}}</a>
                                </li>

                            </ul>
                                @if($student->status ==1)
                                    <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                                @else
                                    <a href="#" class="btn btn-danger btn-block"><b>Apply</b></a>
                                @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <!-- /.card -->
                </div>
                <div class="col-md-9">

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-male"></i> Father Name</strong>
                            <hr>
                            <p class="text-muted">
                                {{ $student->f_name }} <br> {{ $student->f_mobile }}
                            </p>
                            <hr>
                            <strong><i class="fa fa-female"></i> Mother Name</strong>
                            <hr>
                            <p class="text-muted">
                                {{ $student->m_name }} <br> {{ $student->m_mobile }}
                            </p>
                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>

                            <p class="text-muted">
                                {{ $student->address ? $student->address : 'N/A'}} <br>
                                {{ $student->area ? $student->area : 'N/A' }} <br>
                                {{ $student->zip ? $student->zip : 'N/A' }} <br>
                                {{ $student->city_id ? $student->city->name : 'N/A' }} <br>
                                {{ $student->state_id ? $student->division->name : 'N/A' }} <br>
                                {{ $student->country_id ? $student->country->name : 'N/A' }}
                            </p>

                            <hr>

                            <strong><i class="fa fa-transgender"></i> Gender</strong>
                            <hr>
                               {{ $student->gender_id ? $student->gender->name : 'N/A'}}
                            <hr>

                            <strong><i class="fa fa-heart"></i> Religion</strong>
                            <hr>
                                {{ $student->religion_id ? $student->religion->name : 'N/A'  }}

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
