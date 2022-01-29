@extends('layouts.fixed')
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
    line-height: 15px;
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
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{ $student->gender_id ? $student->gender->name : 'N/A'}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Religion</b> <a class="float-right">{{ $student->religion_id ? $student->religion->name : 'N/A'  }}</a>
                                </li>

                            </ul>
                                {{-- @if($student->status ==1)
                                    <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                                @else
                                    <a href="#" class="btn btn-danger btn-block"><b>Apply</b></a>
                                @endif --}}
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
    
           
                                    
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <!-- /.card -->
                    {{-- <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Address Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            

                        </div>
                        <!-- /.card-body -->
                    </div> --}}
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Father Info</div>
                                <div class="card-body">
                                    <ul class="parent_info">
                                        <li>
                                            <label for="">Name</label>
                                            <p>{{ $student->f_name ?  $student->f_name  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Email</label>
                                            <p>{{ $student->f_email ?  $student->f_email  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Number</label>
                                            <p>{{ $student->f_mobile ?  $student->f_mobile  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Date of Birth</label>
                                            <p>{{ $student->f_dob ?  $student->f_dob : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Occupation</label>
                                            <p>{{ $student->f_occupation ?  $student->f_occupation  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">NID</label>
                                            <p>{{ $student->f_nid ?  $student->f_nid  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Birth Certificate</label>
                                            <p>{{ $student->f_birth_certificate ?  $student->f_birth_certificate  : 'N/A' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Mother Info</div>
                                <div class="card-body">
                                    <ul class="parent_info">
                                        <li>
                                            <label for="">Name</label>
                                            <p>{{ $student->m_name ?  $student->m_name  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Email</label>
                                            <p>{{ $student->m_email ?  $student->m_email  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Number</label>
                                            <p>{{ $student->m_mobile ?  $student->m_mobile  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Date of Birth</label>
                                            <p>{{ $student->m_dob ?  $student->m_dob : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Occupation</label>
                                            <p>{{ $student->m_occupation ?  $student->m_occupation  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">NID</label>
                                            <p>{{ $student->m_nid ?  $student->m_nid  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Birth Certificate</label>
                                            <p>{{ $student->m_birth_certificate ?  $student->m_birth_certificate  : 'N/A' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">Guardian Info</div>
                                <div class="card-body">
                                    <ul class="parent_info">
                                        <li>
                                            <label for="">Name</label>
                                            <p>{{ $student->g_name ?  $student->g_name  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Email</label>
                                            <p>{{ $student->g_email ?  $student->g_email  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Number</label>
                                            <p>{{ $student->g_mobile ?  $student->g_mobile  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Date of Birth</label>
                                            <p>{{ $student->g_dob ?  $student->g_dob : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Occupation</label>
                                            <p>{{ $student->g_occupation ?  $student->g_occupation  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">NID</label>
                                            <p>{{ $student->g_nid ?  $student->g_nid  : 'N/A' }}</p>
                                        </li>
                                        <li>
                                            <label for="">Birth Certificate</label>
                                            <p>{{ $student->g_birth_certificate ?  $student->g_birth_certificate  : 'N/A' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- About Me Box -->
                    
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
