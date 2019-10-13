@extends('layouts.fixed')

@section('title','Settings | Configured Pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configured Pages </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Configured Pages</li>
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
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>Total Found : 1000</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Site</th>
                                    <th>Page</th>
                                    <th>Content</th>
                                    <th>Order </th>
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
                                </tr>
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
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
        </div>
    </section>




    <!-- ***/Attendance setting add new form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Page Name*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="inputState" class="form-control">
                                        <option selected>Page...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Content*</label>
                            <div class="col-sm-10">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Image*</label>
                            <div class="col-sm-10">
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Order*</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /Attendance setting add new form End*** -->
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop