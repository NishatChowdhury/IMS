@extends('layouts.fixed')

@section('title','Attendance | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance Setting </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance Setting</li>
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
                       <!-- /.card-header -->
                       <div class="card-body">
                           <table id="example2" class="table table-bordered table-hover">
                               <thead>
                               <tr>
                                   <th>Attendance Start</th>
                                   <th>Attendance End</th>
                                   <th>Late Attendance End</th>
                                   <th>Exit Attendance Start</th>
                                   <th>Exit Attendance End</th>
                                   <th>Notification</th>
                                   <th>Shift</th>
                                   <th>User</th>
                                   <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>1</td>
                                   <td>f</td>
                                   <td>2</td>
                                   <td>54</td>
                                   <td>85</td>
                                   <td>4</td>
                                   <td>5</td>
                                   <td>5</td>
                                   <td>9</td>
                               </tr>
                               </tbody>
                           </table>
                           <div class="row">
                               <div class="col-sm-12 col-md-5">
                                   <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Attendance Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Attendance Start Time*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-circle nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Attendance End Time*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-circle nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Late Attendance End Time*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-circle nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Late Present Fee*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">Tk</span>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="0"  aria-describedby="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Absent Fee*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">Tk</span>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="0"  aria-describedby="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance Start Time*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-circle nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance End Time*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id=""  aria-describedby="" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-circle nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Process*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Notification*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Shift*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">User*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
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

