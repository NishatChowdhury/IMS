@extends('layouts.fixed')

@section('title','Settings | Site Basic Info')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Site Basic Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Site Basic Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***Site info Inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                               <h5>Site Information</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::model($info,['action'=>'SiteInformationController@update','method'=>'patch']) }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title">Title</label>
                                        {{ Form::text('title',null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        {{ Form::text('name',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    {{ Form::text('address',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Institution Code</label>
                                        {{ Form::text('institute_code',null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="eiinNo">EIIN No</label>
                                        {{ Form::text('eiin',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title">Phone</label>
                                        {{ Form::text('phone',null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        {{ Form::text('email',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            <div class="form-row">
                                {{ Form::submit('SAVE',['class'=>'btn btn-success']) }}
                                {{ Form::reset('RESET',['class'=>'btn btn-warning']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Site Logo</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::model($info,['action'=>'SiteInformationController@logo','method'=>'patch','files'=>true]) }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title">Logo Text Top 550 X 140</label>
                                        <input type="text" class="form-control" id="" placeholder="type..">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Logo Text Bottom</label>
                                        <input type="text" class="form-control" id="" placeholder="type..">
                                    </div>
                                </div>
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="" name="logo">
                                </div>
                            <div class="form-row">
                                {{ Form::submit('SAVE',['class'=>'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div style="float: right">
                <button type="button" class="btn btn-success"> <i class="far fa-save"></i> Save</button>
            </div>
        </div>
    </section>

@stop
<!--Site info Inner Content End***-->


<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop
