@extends('layouts.teacher')

@section('title','Attendance | Monthly Report')

@section('style')
    <style>
        @media (min-width: 992px) {
            #atn_result_show{
                font-size: 13px;
            }
            .table td, th{
                padding: .5rem;
            }
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Attendance Report Daywise & Monthwise </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Monthly Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <form action="{{ route('teacher.attendance.view') }}" method="get" name="theForm">
                                @csrf

                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Attendance Type</label>
                                        <div class="input-group">
                                            {{ Form::select('user',[1=>'Day To Day',2=>'Monthly'],null,['class'=>'form-control','id' => 'statusChange','placeholder'=>'Select Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col daywise">
                                        <label for="">Student ID</label>
                                        <div class="input-group">
                                            <input type="text" name="studentId" placeholder="Enter Student ID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col daywise">
                                        <label for="">Date</label>
                                        <div class="input-group">
                                            {{ Form::date('date', null,['class'=>'form-control',]) }}
                                        </div>
                                    </div>
                                    <div class="col monthwise">
                                        <label for="">Year</label>
                                        <div class="input-group">
                                            {{ Form::selectRange('year',2020,2025,null,['class'=>'form-control','placeholder'=>'Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col monthwise">
                                        <label for="">Month</label>
                                        <div class="input-group">
                                            {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month','required']) }}
                                        </div>
                                    </div>
                                    <div class="col monthwise" id="forStudent">
                                        <label for="class">Class</label>
                                        <div class="input-group">
                                            <select name="class_id" id="class" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach($repository->academicClasses() as $class)
                                                    <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-1" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button onClick="placeOrder()"  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                              </form>

                        </div>
                        <div class="col-md-3">
                            <div>
                                <ul style="list-style: none">
                                    <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                    <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> D - Late/Delay </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> E - Early Leave </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                    <li> <i class="fas fa-circle" style="color: #878484"></i> <span> L - Leave </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
@section('script')
    <script>

        $('#statusChange').change(function (){
            let statusValue = $(this).val();
            if(statusValue == 1){
                $('.daywise').show();
                $('.monthwise').hide();
            }
            if(statusValue == 2){   // Student for 1
                $('.daywise').hide();
                $('.monthwise').show();
            }
        })

        function placeOrder(){
            document.theForm.submit();
        }

        function defaultStatus(){
             $('.daywise').hide();
            $('.monthwise').hide();
        }

        defaultStatus();




    </script>
@endsection

