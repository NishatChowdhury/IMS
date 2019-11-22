@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Admit Card')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admit Card</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam Mgmt</a></li>
                        <li class="breadcrumb-item active">Admit Card</li>
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
                    <div class="card">
                        <!-- form start -->
                        <form method="GET" action="http://localhost/wpschool/public/students" accept-charset="UTF-8" role="form">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Student ID</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Student ID" name="studentId" type="text">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Class</label>
                                        <div class="input-group">
                                            <select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option></select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Section</label>
                                        <div class="input-group">
                                            <select class="form-control" name="section_id"><option selected="selected" value="">Select Section</option></select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Group</label>
                                        <div class="input-group">
                                            <select class="form-control" name="group_id"><option selected="selected" value="">Select Group</option></select>
                                        </div>
                                    </div>

                                    <div class="col-1" style="padding-top: 32px;">
                                        <div class="input-group">
                                            <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
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
                        <div class="card-body">
                        <div class="row" style="padding-bottom: 50px;">
                            <div class="col-md-3">
                                <div class="logo" style="float: left">
                                    <img style="width: 100px; height: auto;" src="{{ asset('assets/img/brand.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="admit-dec" style="text-align: center; color: #00cc66;">
                                    <h3> <span style="text-transform: uppercase;"> Admit Card </span> <br>
                                        2nd Model Test(Nursery-Seven,Nine) <br>
                                        & Test Exam(Eight)
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stuimg" style="float: right" >
                                    <img style="width: 100px; height: auto;" src="{{ asset('assets/img/stuimg.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="scl-dev">
                                    <h4 style="color: #879BE8;">Chakaria Cambrian School</h4>
                                    <p>Thana Road,Chiring,Chakaria <br>
                                        Cox's Bazar,Chittagong,Bangladesh.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stu-dec">
                                    <h4 style="color: #879BE8;">Muhaimin Sarwar rahi</h4>
                                    <p>Thana Road,Chiring,Chakaria <br>
                                        Cox's Bazar,Chittagong,Bangladesh.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered">
                            <tr>
                                <th>Student's Name :</th>
                                <td></td>
                                <th>StudentID :</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Class :</th>
                                <td></td>
                                <th>Rank :</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Father's Name :</th>
                                <td></td>
                                <th>Mother's Name :</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Room No :</th>
                                <td></td>
                                <th>Seat No :</th>
                                <td></td>
                            </tr>
                        </table>

                        <table id="example2" class="table table-bordered table-hover" style="margin-top: 20px;">
                            <thead>
                            <tr>
                                <th>Subjects</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Exam Mark</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" style="margin-bottom: 10px; ">
                        <h4>Notes & Information</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, nulla.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop