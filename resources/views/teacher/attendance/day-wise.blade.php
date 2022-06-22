@extends('layouts.teacher')

@section('title','Attendance | Student Attendance')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Attendances </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Attendance</a></li>
                        <li class="breadcrumb-item active">Student Attendances</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no-print">
        <div class="container-fluid">
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
                                    <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                    <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                    <li> <i class="fas fa-circle" style="color: #878484"></i> <span> L - Leave </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- ***/Student Attendances page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">
                                {{ $academicClass->academicClasses->name ?? '' }} {{ $academicClass->section->name ?? '' }} {{ $academicClass->group->name ?? '' }}
                                <br>
                                {{ $today ?? '' }}
                            </h4>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 text-center">--}}
{{--                                <div class="row" style="padding: 10px;">--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Total</h5>--}}
{{--                                                <p><span class="badge badge-info" style="color: black; padding: 5px 45px; font-size: 18px">{{ count($attendances) }}</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00b249; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Present</h5>--}}
{{--                                                <p><span class="badge badge-success" style="color: black; padding: 5px 30px; font-size: 18px">00</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #007bff; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Late</h5>--}}
{{--                                                <p><span class="badge badge-primary" style="color: black; padding: 5px 45px; font-size: 18px">00</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ffa500; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Left Early</h5>--}}
{{--                                                <p><span class="badge badge-warning" style="color: black; padding: 5px 35px; font-size: 18px">00</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ff0000; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Absent</h5>--}}
{{--                                                <p><span class="badge badge-danger" style="color: black; padding: 5px 28px; font-size: 18px">00</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="dec-block">--}}
{{--                                            --}}{{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ff0000; border-radius: 50%;" >--}}
{{--                                                --}}{{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
{{--                                            --}}{{--</div>--}}
{{--                                            <div class="dec-block-dec" style="float:left;">--}}
{{--                                                <h5 style="margin-bottom: 0px; font-weight: bold">Leave</h5>--}}
{{--                                                <p><span class="badge badge-dark" style="color: black; padding: 5px 28px; font-size: 18px">00</span></p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="card-body" style="padding: 1.00rem;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Student</th>
                                    <th>Card</th>
                                    <th class="text-center">Entry</th>
                                    <th class="text-center">Exit</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attn)
                                    <tr>
                                        <td>
                                            {{ $attn->rank ?? 'N/A' }}
                                        </td>
                                        <td>
                                        {{ $attn->student ?? 'N/A' }}
                                        </td>
                                        <td>{{ $attn->card ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $attn->in_time ?? '-' }}</td>
                                        <td class="text-center">{{ $attn->out_time ?? '-' }}</td>
                                        <td class="text-center">{{ $attn->status ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('plugin-css')

    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/select2/select2.min.css')}}">

@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

@section('plugin')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

@stop


@section('script')
    <script>
        //Date range as a button
        $(function () {
            $('.select2').select2();
        });
        // $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                });
        // });
        $('.daterange-btn').daterangepicker(
            {
                format : 'YYYY-MM-DD',
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            }

        );
    </script>
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
@stop
