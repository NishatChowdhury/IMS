@extends('layouts.fixed')

@section('title','Staff |Add')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                        <li class="breadcrumb-item active">Add Staffs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/teacher page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <section id="tabs">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <br>
                                        <p>Staff Information</p>
                                    </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <br>
                                        <p>Staff Address</p>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered" style="margin: 10px;">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <h3 class="card-title"> Institution Related Information </h3>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-group row col-md-12">
                                                                    <label for="inputEmail4">Email*</label>
                                                                    <div class="input-group ">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <input id="datePicker1" name="date" class="form-control" aria-describedby="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Code</label>
                                                                        <input type="text" class="form-control" id="" placeholder="">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Job Title</label>
                                                                        <input type="text" class="form-control" id="" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Role </label>
                                                                            <div class="input-group">
                                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                                    <option>Select</option>
                                                                                    <option>...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Job Type</label>
                                                                            <div class="input-group">
                                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                                    <option>Select</option>
                                                                                    <option>...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Staff type*</label>
                                                                            <div class="input-group">
                                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                                    <option>Select</option>
                                                                                    <option>...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Joining Date</label>
                                                                            <div class="input-group">
                                                                                {{--<input id="" type="text" class="form-control datePicker" aria-describedby="">--}}
                                                                                {{Form::text('start',null,['class'=>'form-control datePicker'])}}
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Salary</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                                                </div>
                                                                                <input id="datePicker1" name="date" class="form-control" aria-describedby="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Bonus</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                                                </div>
                                                                                <input id="datePicker1" name="date" class="form-control" aria-describedby="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table id="example2" class="table table-bordered" style="margin: 10px;">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <h3 class="card-title"> General Information </h3>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="card-body">
                                                            <form>
                                                                <div class="form-group row col-md-12">
                                                                    <label for="inputEmail4">Name*</label>
                                                                    <div class="input-group ">
                                                                        <input id="datePicker1" name="date" class="form-control" aria-describedby="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Father/Husband's Name</label>
                                                                        <input type="text" class="form-control" id="" placeholder="">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Mobile</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                                                                </div>
                                                                                <input id="datePicker1" name="date" class="form-control" aria-describedby="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Date Of Birth</label>
                                                                            <div class="input-group">
                                                                                {{--<input id="" type="text" class="form-control datePicker" aria-describedby="">--}}
                                                                                {{Form::text('start',null,['class'=>'form-control datePicker'])}}
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">National ID</label>
                                                                        <input type="text" class="form-control" id="" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Gender </label>
                                                                            <div class="input-group">
                                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                                    <option>Select</option>
                                                                                    <option>...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Blood Group</label>
                                                                            <div class="input-group">
                                                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                                                    <option>Select</option>
                                                                                    <option>...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputEmail4">Add File</label>
                                                                    <div class="form-group files color">
                                                                        <input type="file" class="form-control" multiple="">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    content
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">

@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
@stop
