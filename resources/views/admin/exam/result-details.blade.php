@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Result Details')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Result Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="" class="table">
                                <tr>
                                    <th>Student's Name : </th>
                                    <td></td>
                                    <th>Exam Name : </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>StudentID : </th>
                                    <td></td>
                                    <th>Date :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Class :</th>
                                    <td></td>
                                    <th>Grade : </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Current Rank :</th>
                                    <td></td>
                                    <th>Grade Point :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Result Rank :</th>
                                    <td></td>
                                    <th>Total Marks :</th>
                                    <td></td>
                                </tr>
                            </table>

                            <div style="float: right;">
                                <button type="button" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fa fa-cloud" aria-hidden="true"></i>  Pdf</button>
                            </div>

                            <table id="" class="table table-bordered" style="margin-top: 60px;">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Code</th>
                                    <th>Exam Mark</th>
                                    <th>Result Mark</th>
                                    <th>Description</th>
                                    <th>Grade</th>
                                    <th>Grade point</th>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop