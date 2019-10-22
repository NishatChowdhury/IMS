@extends('layouts.fixed')

@section('title','Institution Mgnt | Classes')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Classes</li>
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
                                            <p>1000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Class Code</th>
                                    <th>Class Name</th>
                                    <th>Tuition Fee Display </th>
                                    <th>Group</th>
                                    <th>Section</th>
                                    <th>Total Student</th>
                                    <th>Total Subject</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>VIII</td>
                                    <td>Eight</td>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Class Code*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Class Name*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Tuition Fee</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Groups</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="e.g.-Science,Business">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Sections</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="e.g. A,B,C..">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Admission Fee</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="Admission Fee">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Admission Form Fee </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" placeholder="Admission Form Fee">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="float: right">
                        <button type="button" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <!-- ***/ Pop Up Model for button End-->
@stop