@extends('layouts.fixed')

@section('title','Student | Design Student ID')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Design Student ID</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float: right !important; margin-right: 20px;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">

                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <h5>Header & Footer Background Color</h5>
                                <div>
                                    <ul style="list-style: none; padding: 0px;">
                                        <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                        <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> L - Late </span></li>
                                        <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                        <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5>Header & Footer Font Color</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Card Body Header Font Color</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop