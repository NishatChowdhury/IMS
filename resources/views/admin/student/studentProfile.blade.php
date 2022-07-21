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
                                {{ $student->studentId ?? $student->studentId}} <br>
                                {{ $student->mobile ?? $student->mobile }} <br>
                                {{ $student->email ? $student->email : 'N/A' }} <br>
                                Date Of Birth : {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d m Y') : 'N/A' }}
                            </p>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Class</b> <a class="float-right">{{ $studentAcademic->classes ? $studentAcademic->classes->name : 'N/A' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Section</b> <a class="float-right">{{ $studentAcademic->section ? $studentAcademic->section->name : 'N/A'  }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Group</b> <a class="float-right">{{ $studentAcademic->group ? $studentAcademic->group->name : 'N/A' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Roll</b> <a class="float-right">{{ $studentAcademic ? $studentAcademic->rank : 'N/A' }}</a>
                                </li>
                            </ul>
                                @if($student->status ==1)
                                    <a href="#" class="btn btn-primary btn-block"><b>Active</b></a>
                                @else
                                    <a href="#" class="btn btn-danger btn-block"><b>Drop Out</b></a>
                                @endif

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
                            <strong><i class="fa fa-male"></i> Father Name</strong>
                            <hr>
                            <ul class="parent_info">
                                <li>
                                    <label for="">Name</label>
                                    <p>{{ $data['father']['f_name'] ?  $data['father']['f_name']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Email</label>
                                    <p>{{ $data['father']['f_email'] ?  $data['father']['f_email']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Number</label>
                                    <p>{{ $data['father']['f_mobile'] ?  $data['father']['f_mobile']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Date of Birth</label>
                                    <p>{{ $data['father']['f_dob'] ?  $data['father']['f_dob']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Occupation</label>
                                    <p>{{ $data['father']['f_occupation'] ?  $data['father']['f_occupation']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">NID</label>
                                    <p>{{ $data['father']['f_nid'] ?  $data['father']['f_nid']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Birth Certificate</label>
                                    <p>{{ $data['father']['f_birth_certificate'] ?  $data['father']['f_birth_certificate']  : 'N/A' }}</p>
                                </li>
                            </ul>

                            <hr>
                            <strong><i class="fa fa-female"></i> Mother Name</strong>
                            <hr>
                            <ul class="parent_info">
                                <li>
                                    <label for="">Name</label>
                                    <p>{{ $data['mother']['m_name'] ?  $data['mother']['m_name']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Email</label>
                                    <p>{{ $data['mother']['m_email'] ?  $data['mother']['m_email']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Number</label>
                                    <p>{{ $data['mother']['m_mobile'] ?  $data['mother']['m_mobile']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Date of Birth</label>
                                    <p>{{ $data['mother']['m_dob'] ?  $data['mother']['m_dob']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Occupation</label>
                                    <p>{{ $data['mother']['m_occupation'] ?  $data['mother']['m_occupation']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">NID</label>
                                    <p>{{ $data['mother']['m_nid'] ?  $data['mother']['m_nid']  : 'N/A' }}</p>
                                </li>
                                <li>
                                    <label for="">Birth Certificate</label>
                                    <p>{{ $data['mother']['m_birth_certificate'] ?  $data['mother']['m_birth_certificate']  : 'N/A' }}</p>
                                </li>
                            </ul>
                            <hr>

                            <strong><i class="fa fa-map-marker mr-1"></i> Address</strong>

                            <p class="text-muted">
                                {{ $student->address ? $student->address : 'N/A'}} <br>
                                {{ $student->area ? $student->area : 'N/A' }} <br>
                                {{ $student->zip ? $student->zip : 'N/A' }} <br>
                                {{ $student->city_id ? $student->city->name : 'N/A' }} <br>
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
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="#attendance" data-toggle="tab">Attendance</a></li>
                                <li class="nav-item"><a class="nav-link" href="#result" data-toggle="tab">Result</a></li>
                                <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Password Reset</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="account">
                                    <div class="card-title text-center"><h4>Fee Collection</h4></div>
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Date</th>
                                            <th class="text-right">Discount</th>
                                            <th class="text-right">Paid Amount</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @forelse ($payments as $payment)
                                            <tr>
                                                <td style="text-align: center">{{\Carbon\Carbon::parse($payment->created_at)->format('m F Y')}}</td>
                                                <td style="text-align: right">{{ number_format($payment->discount,2) }}</td>
                                                <td style="text-align: right">{{ number_format($payment->amount,2) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td style="text-align: center" colspan="8">
                                                    Data Not found :)
                                                </td>
                                                
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="attendance">
                                    <div class="card-title text-center"><h4>Attendance Report</h4></div>
                                </div>

                                <div class="tab-pane" id="result">
                                    <div class="card-title text-center"><h4>Result</h4></div>
                                </div>

                                <div class="tab-pane" id="activity">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('student.resetPassword') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $student->id }}">
                                                <div class="form-group">
                                                    <label>New password</label>
                                                    <input class="form-control" name="password" type="password" placeholder="Enter New Password">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Confirm new password</label>
                                                    <input class="form-control" name="password_confirmation"  type="password" placeholder="Enter Confirm New Password">
                                                  </div>
                                                <button class="btn btn-primary btn-sm">Reset Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
