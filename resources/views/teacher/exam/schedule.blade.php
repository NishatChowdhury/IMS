@extends('layouts.teacher')

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
                        <!-- /.card-header -->
                        @foreach($getTeacherAssign as $key => $assingSschedule)
                        <div class="card-body">
                            <div class="card-header">
                            @php
                            $academic = \App\Models\Backend\AcademicClass::find($key);
                            $examSchedule = \App\Models\Backend\ExamSchedule::query()
                                                                            ->where('subject_id', )
                                                                            ->where('academic_class_id', )
                                                                            ->first();

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
                                @foreach($assingSschedule as $k => $sc)
                                     @php
                            $examSchedule = \App\Models\Backend\ExamSchedule::query()
                                                                            ->where('subject_id', $sc->subject_id)
                                                                            ->where('academic_class_id', $academic->id)
                                                                            ->where('exam_id', $examId)
                                                                            ->first();

                                      @endphp
                                     @if(!is_null($examSchedule))
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $examSchedule->subject->name ?? '' }}</td>
                                        <td>{{ $examSchedule->date  ?? ''}}</td>
                                        <td>{{ $examSchedule->start ?? '' }}</td>
                                        <td>{{ $examSchedule->end ?? '' }}</td>
                                        <td>{{ $examSchedule->objective_full + $examSchedule->written_full + $examSchedule->practical_full}}</td>
                                        <td>
                                            <a href="{{ route('teacher.examination.mark.download',$examSchedule->id) }}" class="btn btn-danger btn-sm" title="{{ __('Download Result') }}"><i class="fas fa-file-download"></i></a>
                                            <a href="{{ route('teacher.examination.mark.upload',$examSchedule->id) }}" class="btn btn-dark btn-sm" role="button" style="color:white" title="{{ __('Upload Result') }}"><i class="fas fa-file-upload"></i></a>
                                            <a href="{{ route('teacher.examination.mark',$examSchedule->id) }}" class="btn btn-primary btn-sm" title="{{ __('Input Marks') }}"><i class="fas fa-file-invoice"></i></a>
                                        </td>
                                    </tr>
                                     @endif
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
