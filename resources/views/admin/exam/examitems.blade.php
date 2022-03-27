@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Exam Schedules')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exam Schedules</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam</a></li>
                        <li class="breadcrumb-item active">Exam Schedules</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>100</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <a href="{{ action('Backend\ExamScheduleController@create',$examId) }}" role="button" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</a>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="Schedules" style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;" disabled> <i class="fa fa-calendar"></i> </button>
                                        {{--<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#allocateseat" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="Allocate Seat"  style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fa fa-server"></i> </button>--}}
                                        <a href="{{ action('Backend\ExamController@seatAllocate') }}" class="btn btn-info btn-sm" style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"><i class="fa fa-server"></i></a>
                                        {{--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admitcard" data-whatever="@mdo" data-placement="top" title="AdmitCard Preview"  style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fa fa-spinner"></i></button>--}}
                                        <a href="{{ action('Backend\ExamController@admitCard') }}" class="btn btn-primary btn-sm" style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"><i class="far fa-id-card"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Mark</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($schedules as $schedule)
                                    {{--{{dd($schedule)}}--}}
                                    <tr>
{{--                                        <td>{{ academicClass(1) }}</td>--}}
                                        <td>{{ __('Class Name') }}</td>
                                        <td>{{ $schedule->subject->name ?? '' }}</td>
                                        <td>{{ $schedule->date }}</td>
                                        <td>{{ $schedule->start }}</td>
                                        <td>{{ $schedule->end }}</td>
                                        <td>{{ $schedule->full_mark }}</td>
                                        <td>{{ $schedule->type }}</td>
                                        <td>{{ $schedule->status }}</td>
                                        <td>
                                            {{--<label for="file">--}}
                                            <a href="{{ action('Backend\MarkController@download',$schedule->id) }}" class="btn btn-success btn-sm"><i class="fas fa-file-download"></i></a>
{{--                                            <label for="file">--}}
                                                <a href="{{ action('Backend\MarkController@upload',$schedule->id) }}" class="btn btn-success btn-sm" role="button" style="color:white"><i class="fas fa-file-upload"></i></a>
{{--                                            </label>--}}
                                            {{--</label>--}}
                                            <a href="{{ action('Backend\MarkController@index',$schedule->id) }}" class="btn btn-info btn-sm"><i class="fas fa-file-invoice"></i></a>
{{--                                            <input type="file" name="file" id="file" style="display: none;">--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***/ Pop Up Model for  Schedules button -->
    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>['Backend\ExamController@schedule',5], 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Session*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('session_id', $sessions, null, ['class'=>'form-control','placeholder' => 'Select Session']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exam Name*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('exam_id', $exams, null, ['class'=>'form-control','placeholder' => 'Select An Exam']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                {{ Form::select('class_id', $classes, null, ['class'=>'form-control', 'id'=>'class','placeholder' => 'Select Class']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exam Type*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <select class="form-control" id="" name="exam_type">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div style="float: right; margin-right: 75px;">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for  Schedules button -->

@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop
<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
@stop
