@extends('media::layouts.master')

@section('title','Subscriber List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Subscribers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Subscribers</li>
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
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->

{{--                        <div class="card-body">--}}
{{--                            <div class="form-row">--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Student ID</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Name</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Session</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Class</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Section</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="">Group</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-1" style="padding-top: 32px;">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        {{ Form::close() }}--}}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card card-info">
                    <div class="card-header " >
                        <h3>Subscriber List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="">
                            <tr>
                                <th>Sl.</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $key=> $subscriber)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        @if($subscriber->unsubscribed == 1)
                                            <span class="badge badge-danger">unsubscribed</span>
                                        @else
                                            <span class="badge badge-success">subscribed</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="card-body">--}}
{{--                        {{ $students->appends(Request::except('page'))->links() }}--}}
{{--                    </div>--}}
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
