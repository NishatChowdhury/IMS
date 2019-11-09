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
                                            <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                                <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                            </div>
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Total Found</h5>
                                                <p><span class="badge badge-info" style="color: black; padding: 5px 45px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00b249; border-radius: 50%;" >
                                                <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                            </div>
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Present</h5>
                                                <p><span class="badge badge-success" style="color: black; padding: 5px 30px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #007bff; border-radius: 50%;" >
                                                <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                            </div>
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Late Present</h5>
                                                <p><span class="badge badge-primary" style="color: black; padding: 5px 45px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ffa500; border-radius: 50%;" >
                                                <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                            </div>
                                            <div class="dec-block-dec" style="float:left;">
                                                <h5 style="margin-bottom: 0px; font-weight: bold">Left Early</h5>
                                                <p><span class="badge badge-warning" style="color: black; padding: 5px 35px; font-size: 18px">00</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="dec-block">
                                            <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ff0000; border-radius: 50%;" >
                                                <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                            </div>
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{--start --}}
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h4>Individual Student Attendance Search</h4>
                                    </div>
                                    <div class="card-body ">
                                        {{ Form::open() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                {{ Form::label('Student Card ID') }}

                                                <select name="studentCardId" class="form-control select2">
                                                    <option value="" selected>Slect Student Card ID</option>
                                                    @foreach($allStudents as $allStudent)
                                                        <option value= " {{ $allStudent->studentId }} "> {{$allStudent->name}} - {{ $allStudent->studentId }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Date range button:</label>
                                                <div class="form-group">
                                                    <input type="text" name="dateRangeStudent" id="" class="form-control daterange-btn">

                                                </div>
                                            </div>

                                            <div class="form-group col-md-1" style=" margin:29px 0 0 0;">
                                                <input type="submit" class="btn btn-info" value="search">
                                            </div>

                                        </div>
                                        {{  Form::close() }}
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        {{--Class Wish Card Search--}}

                        <div class="col-md-6">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h4>Class Wish Attendance Search</h4>
                                    </div>
                                    <div class="card-body ">
                                        {{ Form::open() }}
                                        <div class="form-row">
                                            <div class=" form-group col-md-6">
                                                {{ Form::label('Academic Class') }}
                                                <select name="academicClass" class="form-control select2">
                                                    <option value="" selected>Slect Academic Class</option>
                                                    @foreach($allClasses as $allClass)
                                                        <option value= " {{ $allClass->id }} "> {{ $allClass->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Date range button:</label>
                                                <div class="form-group">
                                                    <input type="text" name="dateRangeClass" id="" class="form-control daterange-btn" >

                                                </div>
                                            </div>

                                            <div class="form-group col-md-1" style=" margin:29px 0 0 0;">
                                                <input type="submit" class="btn btn-info" value="search">
                                            </div>

                                        </div>
                                        {{  Form::close() }}
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 1.00rem;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Student</th>
                                <th>Student Id</th>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12 col-md-9">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    </ul>
                                </nav>
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

@stop


@section('script')
    <script>
        //Date range as a button
        $(function () {
            $('.select2').select2();
        });
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
