@extends('layouts.teacher')

@section('title','Leave Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Leave Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Leaves</li>
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
                            <a href="{{ route('teacher.leave.add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add Leave</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Leave ID</th>
                                <th>Student Name</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Purpose</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $value->first()->leaveId }}</td>
                                    <td>
                                        {{ $value->first()->student->name }}<br>
                                    <i class="text-secondary">ID: {{ $value->first()->student->studentId }}</i>
                                    </td>
                                    <td>{{ $value->first()->date->format('Y-m-d') }} - {{ $value->last()->date->format('Y-m-d') }}</td>
                                    <td>{{ $value->count() }}</td>
                                    <td>
                                        {{ $value->first()->purpose->leave_purpose }}
                                    </td>
                                    <td>
                                        <a href="{{ route('teacher.leave.delete',$value->first()->leaveId) }}" role="button" class="btn btn-dark btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

