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
                       <div class="card-header">
                           <button type="button" class="btn btn-primary btn-flat"> New</button>
                       </div>
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



@stop

