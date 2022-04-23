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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <a href="{{ action('Backend\ExamScheduleController@create',$examId) }}" role="button" class="btn btn-info btn-sm"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Create Schedule') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        @foreach($schedules as $key => $schedule)
                        <div class="card-body">
                            <div class="card-header">
                            @php
                            $academic = \App\Models\Backend\AcademicClass::find($key);
                            @endphp
                                <h4>{{$academic->classes->name ?? '' }} - {{$academic->group->name ?? '' }}</h4>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>{{ __('Subject') }}</th>
                                        <th>{{ __('Dates') }}</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Mark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                @foreach($schedule as $key => $sc)
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $sc->subject->name ?? '' }}</td>
                                        <td>{{ $sc->date }}</td>
                                        <td>{{ $sc->start }}</td>
                                        <td>{{ $sc->end }}</td>
                                        <td>{{ $sc->objective_full + $sc->written_full + $sc->practical_full}}</td>
                                        <td>
                                            <a href="{{ action('Backend\MarkController@download',$sc->id) }}" class="btn btn-success btn-sm" title="{{ __('Download Result') }}"><i class="fas fa-file-download"></i></a>
                                            <a href="{{ action('Backend\MarkController@upload',$sc->id) }}" class="btn btn-success btn-sm" role="button" style="color:white" title="{{ __('Upload Result') }}"><i class="fas fa-file-upload"></i></a>
                                            <a href="{{ action('Backend\MarkController@index',$sc->id) }}" class="btn btn-info btn-sm" title="{{ __('Input Marks') }}"><i class="fas fa-file-invoice"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
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
                    {!! Form::open(['action'=>['Backend\ExamScheduleController@index',5], 'method'=>'post']) !!}
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
