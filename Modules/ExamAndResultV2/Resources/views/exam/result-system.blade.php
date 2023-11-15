@extends('examandresultv2::layouts.master')

@section('title', 'Exam Mgmt | Result System')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Create Result System') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Result') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Result System') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Session Message Start -->
    <section class="content">
        <div class="container-fluid">
            @if (\Illuminate\Support\Facades\Session::has('success'))
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
                            <h5>{{ __('Define Pass Mark Combined And Single') }}</h5>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'exam.resultSystemStore', 'method' => 'post']) !!}
                            <input type="hidden" value="{{ $examId }}" name="exam_id">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Academic Class</label>
                                    <select class="form-control" name="academic_class_id" id="getAcademicYear">
                                        <option value="">{{ __('Select Academics Class') }}</option>
                                        @foreach ($academicClass as $item)
                                            <option value="{{ $item->id }}" class="customOption"
                                                @isset($studentAcademic->academic_class_id)
                                                {{ $item->id == $studentAcademic->academic_class_id ? 'selected' : '' }}
                                                    @endisset>
                                                {{ $item->classes->name ?? '' }}-{{ $item->section->name ?? '' }}-{{ $item->group->name ?? '' }}-{{ $item->sessions->year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">{{ __('First Subject') }}</label>
                                    <select name="subject_id" class="form-control">
                                        <option value="">{{ __('Select First Subject') }}</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">{{ __('Second Subject') }}</label>
                                    <select name="combined_subject_id" class="form-control">
                                        <option value="">{{ __('Select Second Subject') }}</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="">{{ __('Full Mark') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('full', null, ['class' => 'form-control', 'placeholder' => 'Full Mark']) }}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">{{ __('Pass Mark') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('pass', null, ['class' => 'form-control', 'placeholder' => 'Pass Mark']) }}
                                    </div>
                                </div>
                                <div class="col-4" style="padding-top: 32px;">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Combined Subjects List') }}</h5>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Serial') }}</th>
                                            <th>{{ __('Academic Class') }}</th>
                                            <th>{{ __('First Subject') }}</th>
                                            <th>{{ __('Second Subject') }}</th>
                                            <th>{{ __('Full Mark') }}</th>
                                            <th>{{ __('Pass Mark') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1 @endphp
                                        @foreach ($resultSystem as $result)
                                            <tr>
                                                <td>{{ $x++ }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-primary">{{ $result->academicClass->academicClasses->name ?? '' }}</span>
                                                    <span
                                                        class="badge badge-secondary">{{ $result->academicClass->section->name ?? '' }}</span>
                                                    <span
                                                        class="badge badge-dark">{{ $result->academicClass->group->name ?? '' }}</span>
                                                    <span
                                                        class="badge badge-success">{{ $result->academicClass->sessions->year ?? '' }}</span>

                                                </td>
                                                <td>{{ $result->subject->name ?? '' }}</td>
                                                <td>{{ $result->combinedSubject->name ?? '' }}</td>
                                                <td>{{ $result->full }}</td>
                                                <td>{{ $result->pass }}</td>
                                                <td>
                                                    {{ Form::model($result, ['route' => ['exam.resultSystemDestroy', $result->id], 'method' => 'delete', 'onsubmit' => 'confirmDelete()']) }}
                                                    <a href="{{ route('exam.resultSystemEdit', $result->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                    {{ Form::close() }}
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
    </section>

@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop
<!-- *** External JS File-->
@section('plugin')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
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
