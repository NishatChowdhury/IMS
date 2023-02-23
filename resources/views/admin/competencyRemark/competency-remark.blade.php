@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Competency Remark')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Competency Remark') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Competency') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Competency Remark') }}</li>
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
                        {{ Form::open(['action' => 'Backend\CompetencyRemarkController@index', 'role' => 'form', 'method' => 'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="class">{{ __('Academic Class') }}</label>
                                    <div class="input-group">
                                        <select name="academic_class_id" id="class" class="form-control">
                                            <option value="" disabled selected>{{ __('Select Class') }}</option>
                                            @foreach ($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">
                                                    {{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{ Form::open(['action' => 'Backend\CompetencyRemarkController@store', 'method' => 'post']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="subject">{{ __('Subjects') }}</label>
                                    <div class="input-group">
                                        <select name="subject_id" id="class" class="form-control">
                                            <option value="" disabled selected>{{ __('Select Subject') }}</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Student Name') }}</th>
                                        <th>{{ __('Student ID') }}</th>
                                        <th>{{ __('Class Name') }}</th>
                                        <th>{{ __('Competency') }}</th>
                                        <th>{{ __('Indicator') }}</th>
                                        <th>{{ __('Remark') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        {{ Form::hidden('student_id[]', $student->id) }}
                                        {{ Form::hidden('academic_class_id', $student->studentAcademic->academicClass->id ?? '') }}
                                        <tr>
                                            <td>{{ $student->name ?? '' }}</td>
                                            <td>{{ $student->studentId ?? '' }}</td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $student->studentAcademic->classes->name ?? '' }}
                                                    {{ $student->studentAcademic->section->name ?? '' }}
                                                    {{ $student->studentAcademic->group->name ?? '' }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ Form::select('competency_id[]', $competencies, null, ['class' => 'form-control']) }}
                                            </td>
                                            <td>
                                                {{ Form::select('indicator_id[]', $indicators, null, ['class' => 'form-control']) }}

                                            </td>
                                            <td>
                                                {{ Form::select('remark_id[]', $remarks, null, ['class' => 'form-control']) }}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            {{ Form::submit('Save Remark', ['class' => 'btn btn-primary form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
