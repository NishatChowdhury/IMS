@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Enter Marks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : </h3>
                        <div class="card-tools">
                            <a href="{{route('student.add')}}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Class</th>
                                <th>Subject Code</th>
                                <th>Exam</th>
                                <th>Roll</th>
                                <th>Student</th>
                                <th>Full Marks</th>
                                <th>Objective</th>
                                <th>Written</th>
                                <th>Practical</th>
                                <th>Viva</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->studentId }}</td>
                                    <td>
                                        {{ $student->academicClass ? $student->academicClass->name : ''}}
                                        {{ $student->section ? $student->section->name : ''}}
                                        {{ $student->group ? $student->group->name : ''}}
                                    </td>
                                    <td>Subject Code</td>
                                    <td>Exam</td>
                                    <td>{{ $student->rank }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>100</td>
                                    <td>
                                        {{ Form::text('objective',null,['class'=>'form-control']) }}
                                    </td>
                                    <td>{{ Form::text('written',null,['class'=>'form-control']) }}</td>
                                    <td>{{ Form::text('practical',null,['class'=>'form-control']) }}</td>
                                    <td>{{ Form::text('viva',null,['class'=>'form-control']) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
{{--                        {{ $students->appends(Request::except('page'))->links() }}--}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop