@extends('layouts.fixed')

@section('title','Attendance | Teacher Attendance')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher Attendances </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Attendance</a></li>
                        <li class="breadcrumb-item active">Teacher Attendances</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Teacher Attendances page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row" style="padding: 10px;"">
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00b249; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Present</h5>
                                            <p>00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00b0e8; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Late <br> Present</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ffa500; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Left Early</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #ff0000; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Absent</h5>
                                            <p>0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div style="padding-top: 40px;">
                                <button type="button" class="btn btn-info  btn-sm" style=" padding: .25rem 0.9rem; margin-right: 10px"> <i class="fas fa-cloud-download-alt"></i> Pdf </button>
                                <button type="button" class="btn btn-info  btn-sm" style=" padding: .25rem 0.9rem;"> <i class="fas fa-cloud-download-alt"></i> Csv </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 1.00rem;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Teacher</th>
                                <th>Teacher Id/Code</th>
                                <th>Date </th>
                                <th>Enter Time</th>
                                <th>Exit Time</th>
                                <th>Status</th>
                                <th>Is Notified</th>
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
                            </tr>
                            </tbody>
                        </table>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-12 col-md-9">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop