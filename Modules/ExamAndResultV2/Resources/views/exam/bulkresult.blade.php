@extends('examandresultv2::layouts.master')

@section('title', 'Exam Mgmt | Examination Bulk Results')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Examination Results') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam Mgmt') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Examination Bulk Results') }}</li>
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
                        {{ Form::open(['route' => 'exam.bulkResult_v2', 'method' => 'post']) }}

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">{{ __('Exam Name') }}</label>
                                    <div class="input-group">
                                        {{ Form::select('exam_id', $repository->exams(), null, ['class' => 'form-control', 'placeholder' => 'Exam Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Student ID') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId', null, ['class' => 'form-control', 'placeholder' => 'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="class">{{ __('Class') }}</label>
                                    <div class="input-group">
                                        <select name="academic_class_id" id="class" class="form-control">
                                            <option value="" disabled selected>--Select Class--</option>
                                            @foreach ($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">
                                                    {{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">PDF</button>
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

@stop
