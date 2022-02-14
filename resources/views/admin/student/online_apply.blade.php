@extends('layouts.fixed')

@section('title','Student List')

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
                        <li class="breadcrumb-item active">All Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{-- {{ Form::open(['action'=>'StudentController@index','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Section</label>
                                    <div class="input-group">
                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }} --}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Found : {{ $students->total() }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('student.add') }}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="{{ \Illuminate\Support\Facades\Request::fullUrlWithQuery(['csv' => 'csv']) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Group</th>
                                <th>Mobile</th>
                                <th>Father/Mother</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->applyId }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->classes->name }}</td>
                                    <td>{{ $student->group_id ? $student->group->name : 'N/A' }}</td>
                                    <td> {{ $student->mobile }}</td>
                                    <td>    {{ $student->f_name}} ||<br>
                                            {{ $student->m_name}}

                                           
                                    </td>
                                    <td><img src="{{ asset('assets/img/students/') }}/{{ $student->image }}" height="100" alt=""></td>
                                    <td>
                                        @if ($student->status == 0 )
                                        <span class="badge badge-danger">Applied</span>
                                        @else
                                        <span class="badge badge-primary">Approve</span>
                                        @endif  
                                    </td>
                                    <td>
                                        <a href="{{ action('Backend\OnlineApplyController@applyStudentProfile',$student->id) }}" role="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ action('StudentController@subjects',$student->id) }}" role="button" class="btn btn-info btn-sm"><i class="fas fa-book"></i></a> --}}
                                        @if ($student->status == 0 )
                                        <a href="{{ url('admin/fee/fee-setup/viewFeeDetails',$student->id) }}" data-toggle="modal" data-id="{{ $student->session_id  }}" data-target="#exampleModal" role="button" class="btn btn-info btn-sm" onclick="showFeeDetails({{ $student->id }})"><i class="fas fa-book"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ $students->appends(Request::except('page'))->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->



    <!-- Button trigger modal -->

  
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
                    {{-- <div class="form-group col-6">
                          <label for="">Session</label>
                          <select class="form-control" name="session_id" id="getAcademicYear">
                              <option value="">--Select Session--</option>
                              @foreach ($sessions as $item)
                              <option value="{{ $item->id }}" class="customOption">
                                {{ $item->year }}
                                </option>
                              @endforeach

                          </select>
                    </div> --}}
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
                    {{-- <div class="form-group col-12">

                          <label for="">Session & Group</label>
                          <select class="form-control" name="academic_class_id">
                              <option value="">--Select Session & Group--</option>
                              @foreach ($academicClass as $item)
                              <option value="{{ $item->id }}" class="customOption">
                               {{ $item->sessions->year }}-{{ $item->group->name }}
                                </option>
                              @endforeach

                          </select>
                    </div> --}}

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
    
    // $("#getAcademicYear").change(function() {
    //     var id = $(this).children(":selected").attr("value");
    //     console.log(id);
    // });

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