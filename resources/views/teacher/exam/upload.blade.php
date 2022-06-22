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
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <div class="card-header">
                            <h1>{{ $schedule->academicClass->classes->name ?? '' }}&nbsp;{{ $schedule->academicClass->section->name ?? '' }}{{ $schedule->academicClass->group->name ?? '' }}</h1>
                        </div>
                        <div class="card-body">
                            {{ Form::open(['route'=>'teacher.examination.mark.up','method'=>'post','files'=>true]) }}
                            {{ Form::hidden('schedule',$schedule->id) }}
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-primary btn-sm">upload</button>
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

@stop
<!-- *** External JS File-->
@section('plugin')

@stop

@section('script')

@stop
