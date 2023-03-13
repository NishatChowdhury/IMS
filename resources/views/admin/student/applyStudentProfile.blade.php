@extends('layouts.fixed')
@section('style')
<style>
    ul.parent_info {
    margin: 0px;
    padding: 0px;
    font-size: 13px;
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
                                     src="{{ asset('storage/uploads/students/') }}/{{ $student->image }}"
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
    
                                @if ($student->status == 0 )
                                <button data-toggle="modal"
                                        data-id="{{ $student->session_id  }}" 
                                        data-target="#exampleModal" 
                                        role="button" 
                                        class="btn btn-info btn-sm" 
                                        onclick="showFeeDetails({{ $student->id }})">
                                        Approve Student
                                </button>
                            @endif
           
                                    
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>

                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                                <h6 class="mb-2"><b>Father Info</b></h6> <hr>
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
                                <div class="col-4">
                                            <h6 class="mb-2"><b>Mother Info</b></h6> <hr>
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
                                <div class="col-4">
                                        <h6 class="mb-2"><b>Guardian Info</b></h6>
                                        <hr>
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
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!!  Form::open(['action'=>'Backend\OnlineApplyController@moveToStudent', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                <div class="modal-body row">
                    <div class="form-group col-6">
                        <label for="">Class Name</label>
                        <input type="text" class="form-control" id="className" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Group Name</label>
                        <input type="text" class="form-control" id="groupName" readonly>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Session Name</label>
                        <input type="text" class="form-control fff" id="sessionName" readonly>
                    </div>
                    <input type="hidden" name="session_id" id="sessionId">

                    <div class="form-group col-6">
                          <label for="">Sections</label>
                          <select class="form-control" name="section_id">
                              <option value="">--Select Section--</option>
                              @foreach ($sections as $item)
                              <option value="{{ $item->id }}" class="customOption">
                                {{ $item->name }}
                                </option>
                              @endforeach

                          </select>
                    </div>


                    <div class="form-group col-12">
                        {{ Form::label('rank','Rank',['class'=>'control-label']) }}
                        {{ Form::text('rank', null,['placeholder'=>'Student Rank','class' => 'form-control','id'=>'rank']) }}
                        @error('rank')
                        <b style="color: red">{{ $message }}</b>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        {{Form::label('studentId','Student ID',['class'=>'control-label'])}}
                        {{ Form::text('studentId', null, ['placeholder' => 'Student ID...','class' => 'form-control','id'=>'studentID']) }}
                    </div>
                    <input type="hidden" name="onlineApplyID" id="onlineApplyID">
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    @stop
    @section('script')
    <script>
    $(document).on('keyup','#rank', function () {
        // alert();
                // var academicYear = $('.year').val();
                var academicYear = $('.fff').val();
                // console.log(academicYear);        
                $.ajax({
                    url:"{{url('admin/get-apply-info-session')}}",
                    type:'GET',
                    data:{academicYear:academicYear},
                    success:function (data) {
                        // console.log(data);
                        $('#studentID').val(data);
    
                    }
                });
            });
        function showFeeDetails(id){
                let nn = $('#onlineApplyID').val(id);
                $.ajax({
                    url:"{{url('admin/get-apply-info')}}",
                    type:'GET',
                    data:{id:id},
                    success:function (data) {
                        $('#className').val(data.className);
                        $('#groupName').val(data.groupName);
                        $('#sessionName').val(data.SessionName);
                        $('#sessionId').val(data.SessionId);
                        // console.log(getSessionId);
                        // $('#studentID').val(data);
    
                    }
                });
    
            }
    </script>
    @endsection
