@extends('layouts.fixed')

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
                                    {{ Form::label('USER') }}
                                    {{ Form::select('staff_type_id',[0=>'Select User',1=>'STAFF',2=>'TEACHER'],null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="form-group">
                                        {{ Form::text('date',null,['class'=>'form-control datePicker','placeholder'=>'Select Date','required']) }}
                                    </div>
                                </div>

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
                            <h4 class="text-center">{{__('Daily Employee Attendance Report') }}</h4>
                            <h5 class="text-center">Date: {{ $date }}</h5>
                        </div>
                        <div class="card-body" style="padding: 1.00rem;">

                           <div class="card-body" style="padding: 1.00rem;">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Teacher</th>
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
                                        {{ $attn->teacher ?? 'N/A' }}
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
