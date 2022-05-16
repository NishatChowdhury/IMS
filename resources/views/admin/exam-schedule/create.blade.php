@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Exam Schedules')

@section('style')
    <style>
        input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Exam Schedules') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Schedules') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Session Message Start -->
    <section class="content">
        <div class="container-fluid">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
        </div>
    </section>
    <!-- Session Message End -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="">
                                {{ Form::open(['action'=>['Backend\ExamScheduleController@create',$exam->id],'method'=>'get']) }}
                                <div class="row">
                                    <div class="col-md-4">
                                        {{ Form::select('session_id',$sessions,$exam->session_id,['class'=>'form-control','placeholder'=>'Select a session']) }}
                                    </div>
                                    <div class="col-md-6">
                                        <select name="academic_class_id" id="class" class="form-control">
                                            @foreach($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['action'=>'Backend\ExamScheduleController@store','method'=>'post']) }}
                            <table id="example2" class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Subject</th>
                                    <th width="122px">Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Obj Full</th>
                                    <th>Obj Pass</th>
                                    <th>Wri Full</th>
                                    <th>Wri Pass</th>
                                    <th>Pra Full</th>
                                    <th>Pra Pass</th>
                                    {{--<th>Type</th>--}}
                                    {{--<th>Status</th>--}}
                                    {{--<th>Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->subject->code ?? $subject->code }}</td>
                                        <td>
                                            {{ Form::hidden('exam_id',$exam->id) }}
                                            {{-- {{ Form::hidden('class_id',$ClassId->id) }} --}}
                                            {{ Form::hidden('session_id',$exam->session_id) }}
                                            {{ Form::hidden('academic_class_id',$ClassId->id) }}
                                            {{--{{ Form::hidden('section_id',$section) }}--}}
                                            {{--{{ Form::hidden('group_id',$group) }}--}}
                                            {{ Form::hidden('subject_id[]',$subject->subject_id ?? $subject->id) }}
                                            {{ $subject->subject->name ?? $subject->name }}
                                        </td>
                                        <td>{{ Form::text('date[]',$subject->date ?? null,['class'=>'form-control datePicker']) }}</td>
                                        <td>{{ Form::time('start[]',$subject->start ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::time('end[]',$subject->end ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('objective_full[]',$subject->objective_full ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('objective_pass[]',$subject->objective_pass ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('written_full[]',$subject->written_full ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('written_pass[]',$subject->written_pass ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('practical_full[]',$subject->practical_full ?? null,['class'=>'form-control']) }}</td>
                                        <td>{{ Form::number('practical_pass[]',$subject->practical_pass ?? null,['class'=>'form-control']) }}</td>
                                        {{--                                        <td>{{ Form::select('type[]',['Written','MCQ','Practical','Viva'],$subject->type ?? null,['class'=>'form-control']) }}</td>--}}
                                        {{--                                        <td>{{ $subject->status }}</td>--}}
                                        {{--<td>--}}
                                        {{--@if($subject->date != null)--}}
                                        {{--<a href="{{ action('MarkController@index',$subject->id) }}">Marks</a>--}}
                                        {{--@endif--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                {{ Form::submit('SAVE EXAM SCHEDULE',['class'=>'btn btn-success form-control']) }}

                                <div class="col-sm-12 col-md-9">
                                    {{--<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>--}}
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    {{--<nav aria-label="Page navigation example">--}}
                                    {{--<ul class="pagination">--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">First</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">Last</a></li>--}}
                                    {{--</ul>--}}
                                    {{--</nav>--}}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
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
