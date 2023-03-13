@extends('hrm::layouts.master')

@section('title','Attendance | Teacher Attendance')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Teacher Attendances') }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Attendance') }}</a></li>
                        <li class="breadcrumb-item active">{{__('Teacher Attendances') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route'=>'attendance.teacher','method'=>'get']) }}
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('Teacher') }}
                                    {{ Form::select('staff_id', $teachers,null,['class'=>'form-control']) }}
                                </div>
                                <div class="col">
                                        <label for="">Year</label>
                                        <div class="input-group">
                                            {{ Form::selectRange('year',2020,2025,null,['class'=>'form-control','placeholder'=>'Session','required']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Month</label>
                                        <div class="input-group">
                                            {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month','required']) }}
                                        </div>
                                    </div>

{{--                                <div class="form-group">--}}
{{--                                    <label>Date</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        {{ Form::text('date',null,['class'=>'form-control datePicker','placeholder'=>'Select Date','required']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group col-md-1" style=" margin:29px 0 0 0;">
                                    <input type="submit" class="btn btn-info" value="search">
                                </div>

                            </div>
                            {{  Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***/Teacher Attendances page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">{{__('Monthly Wise Employee Attendance Report') }}</h4>
                            <h5 class="text-center"><b>Name: </b>{{ $staffs->name ?? '' }} & <b>Card Number :</b> {{ $staffs->card_id ?? ''}}</h5>
                            <h6 class="text-center"><b>Year :</b> {{ $year ?? '' }} & <b>Month :</b> {{ $month }}</h6>
                        </div>
                        <div class="card-body" style="padding: 1.00rem;">

                           <div class="card-body" style="padding: 1.00rem;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th class="text-center">Entry</th>
                                    <th class="text-center">Exit</th>
                                    <th class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $attn)
                                    <tr @if($attn->attendanceStatus->name == 'Weekly Off') style="background: #9b9b9b" @endif>
                                        <td>
                                        {{ \Carbon\Carbon::parse($attn->date)->format('Y-m-d') ?? 'N/A' }}
                                        </td>
                                        <td class="text-center">
                                            @if(!is_null($attn))
                                            {{ $attn->manual_in_time ?? $attn->in_time }}
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $attn->manual_out_time ?? $attn->out_time}}
                                        </td>
                                        <td class="text-center">
                                            {{$attn->attendanceStatus->name ?? '',}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
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

@section('plugin')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

@stop


@section('script')
    <script>

        $('.datePicker')
            .datepicker({
                format: 'yyyy-mm-dd'
            });

        // $("#indAttendanceTeacher").submit(function (e) {
        //     e.preventDefault();
        //
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url : $(this).attr('action'),
        //         data: $(this).serialize(),
        //         dataType:'html',
        //         success:function (res) {
        //             $("#indTeacher").html(res);
        //             console.log(res);
        //         }
        //     });
        // });


        //Date range as a button
        $(function () {
            $('.select2').select2();
        });
    </script>
@stop
