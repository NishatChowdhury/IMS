@extends('layouts.fixed')

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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'AttendanceController@student','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Date*</label>
                                    <div class="input-group">
{{--                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}--}}
                                        {{ Form::text('date',null,['class'=>'form-control datePicker','placeholder'=>'Select Date','required']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class*</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
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

                                <div class="col-1">
                                    <label for=""> </label>
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
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
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row" style="padding: 10px;">
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >--}}
                                                {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                            {{--</div>--}}
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Total Found</h5>
                                                <p><span class="badge badge-info" style="color: black; padding: 5px 45px; font-size: 18px">{{ count($attendances) }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00b249; border-radius: 50%;" >--}}
                                                {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                            {{--</div>--}}
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Present</h5>
                                                <p><span class="badge badge-success" style="color: black; padding: 5px 30px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #007bff; border-radius: 50%;" >--}}
                                                {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                            {{--</div>--}}
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Late Present</h5>
                                                <p><span class="badge badge-primary" style="color: black; padding: 5px 45px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ffa500; border-radius: 50%;" >--}}
                                                {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                            {{--</div>--}}
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Left Early</h5>
                                                <p><span class="badge badge-warning" style="color: black; padding: 5px 35px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ff0000; border-radius: 50%;" >--}}
                                                {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                            {{--</div>--}}
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Absent</h5>
                                                <p><span class="badge badge-danger" style="color: black; padding: 5px 28px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div style="padding-top: 40px;">
                                    <button type="button" class="btn btn-info  btn-sm" style=" padding: .25rem 0.9rem; margin-right: 10px"> <i class="fas fa-cloud-download-alt"></i> Pdf </button>
                                    <button type="button" class="btn btn-info  btn-sm" style=" padding: .25rem 0.9rem;"> <i class="fas fa-cloud-download-alt"></i> Csv </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 1.00rem;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Card</th>
                                    <th>Rank</th>
                                    <th>Date </th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                    <th>Enter Time</th>
                                    <th>Exit Time</th>
                                    <th>Status</th>
                                    <th>Is Notified</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attn)
                                    <tr>
                                        <td>
                                            {{ $attn['student'] }}
                                            {{--@if($attn->student)--}}
                                                {{--{{ $attn->student->name }}--}}
                                            {{--@endif--}}
                                        </td>
                                        <td>{{ $attn['card'] }}</td>
                                        <td>
                                            {{ $attn['rank'] }}
                                            {{--@if($attn->student)--}}
                                                {{--{{ $attn->student->rank }}--}}
                                            {{--@endif--}}
                                        </td>
                                        <td>{{ $attn['date'] }}</td>
                                        <td>
                                            {{ $attn['class'] }}
                                            {{--@if($attn->student)--}}
                                                {{--@if($attn->student->academicClass)--}}
                                                    {{--{{ $attn->student->academicClass->name }}--}}
                                                {{--@endif--}}
                                            {{--@endif--}}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $attn['enter'] }}</td>
                                        <td>{{ $attn['exit'] }}</td>
                                        <td>
                                            {{--{{ $attn->student->status }}--}}
                                            {{ $attn['status'] }}
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--<div class="row" style="margin-top: 10px">--}}
                                {{--<div class="col-sm-12 col-md-9">--}}
                                    {{--<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-12 col-md-3">--}}
                                    {{--{{ $attendances->appends(Request::except('page'))->links() }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="card-body">
{{--                            {{ $attendances->appends(Request::except('page'))->links() }}--}}
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
@stop





