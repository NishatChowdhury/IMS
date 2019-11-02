@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : {{ $students->count() }}</h3>
                        </div>
                        <div class="row">
                            <div>
                                <a href="{{route('student.add')}}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            </div>
                            <div class="pull-right" style="margin-left: 828px">
                                <a href="" class="btn btn-info btn-sm pull-right"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Rank</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Outstanding</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->studentId }}</td>
                                <td>{{ $student->rank }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    {{ $student->academicClass ? $student->academicClass->name : ''}}
                                    {{ $student->section ? $student->section->name : ''}}
                                    {{ $student->group ? $student->group->name : ''}}
                                </td>
                                <td>{{ $student->father }}</td>
                                <td>{{ $student->mother }}</td>
                                <td>0.00%</td>
                                <td>{{ $student->status }}</td>
                                <td></td>
                                <td>X</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ $students->links() }}
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