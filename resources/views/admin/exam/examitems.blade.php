@extends('layouts.fixed')

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>100</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="Schedules" style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fa fa-calendar"></i> </button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="Allocate Seat"  style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fa fa-server"></i> </button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#schedulespreview" data-whatever="@mdo" data-placement="top" title="AdmitCard Preview"  style="padding:5px 15px; margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fa fa-spinner"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Mark</th>
                                        <th>Guard</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="schedulespreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admit Card Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="" accept-charset=""><input name="" type="hidden" value="">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Class*</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <select class="form-control" id="">
                                        <option>class 1</option>
                                        <option>class 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Student IDs</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input class="form-control" placeholder="type id.." name="numeric_class" type="text">
                                </div>
                            </div>
                        </div>

                        <div style="float: right">
                            <button type="submit" class="btn btn-info btn-sm"> <i class="fa fa-cloud"></i> </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
                <div class="modal-body">
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

                    <table id="example2" class="table table-bordered table-hover">
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
    <!-- ***/ Pop Up Model for button End-->
@stop