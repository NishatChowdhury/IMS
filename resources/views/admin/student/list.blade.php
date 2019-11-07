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


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{--<div class="col-md-12">--}}
                {{--<div class="card">--}}
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                    {{--<div class="card-header">--}}
                    {{--<h3 class="card-title">Quick  Search</h3>--}}
                    {{--</div>--}}
                    <!-- /.card-header -->
                        <!-- form start -->
                        {{--<form role="form">--}}
                            {{ Form::open(['action'=>'StudentController@index','role'=>'form','method'=>'get']) }}
                            <div class="card-body">
                                {{--<div class="form-group row">--}}
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Student ID</label>
                                        <div class="input-group">
                                            {{--<input id="datePicker1" name="date" class="form-control" aria-describedby="" placeholder="type ID..">--}}
                                            {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Name</label>
                                        <div class="input-group">
                                            {{--<input id="datePicker1" name="date" class="form-control" aria-describedby="" placeholder="type name..">--}}
                                            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Class</label>
                                        <div class="input-group">
                                            {{--<input id="datePicker1" name="date" class="form-control" aria-describedby="" placeholder=" type class..">--}}
                                            {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Section</label>
                                        <div class="input-group">
                                            {{--<select id="inputState" class="form-control" style="height: 35px !important;">--}}
                                                {{--<option>Select</option>--}}
                                                {{--<option>...</option>--}}
                                            {{--</select>--}}
                                            {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Group</label>
                                        <div class="input-group">
                                            {{--<input id="datePicker1" name="date" class="form-control" aria-describedby="">--}}
                                            {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <label for=""> </label>
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                                {{--<div class="input-group ">--}}
                                {{--<div class="input-group-prepend">--}}
                                {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-search aria-hidden="true"></i></span>--}}
                                {{--</div>--}}
                                {{--<input id="" type="search" name="search" class="form-control" aria-describedby="">--}}
                                {{--</div>--}}
                            </div>
                        {{--</div>--}}
                        <!-- /.card-body -->
                            {{--<div class="card-footer">--}}
                                {{--<button type="submit" class="btn btn-primary">Search</button>--}}
                            {{--</div>--}}
                                    {{ Form::close() }}
                        {{--</form>--}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                            <h3 class="card-title"><span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : {{ $students->total() }}</h3>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="card-tools">
                            <a href="{{route('student.add')}}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                        </div>
                    {{--</div>--}}
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