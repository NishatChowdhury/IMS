@extends('hrm::layouts.master')

@section('title','Attendance | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Attendance Setting ')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Attendance Setting')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <form role="form">--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group row col-md-11">--}}
{{--                                    <div class="input-group ">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-search" aria-hidden="true"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input id="" type="search" name="search" class="form-control" aria-describedby="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-body -->--}}
{{--                                <div class="col-md-1">--}}
{{--                                    <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('ID')}}</th>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('Entry')}}</th>
                                    <th>{{ __('Exit')}}</th>
                                    <th>{{ __('Grace')}}</th>
                                    <th>{{ __('Late Fee')}}</th>
                                    <th>{{ __('Absent Fee')}}</th>
                                    <th>{{ __('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shifts as $shift)
                                    <tr>
                                        <td>{{ $shift->id }}</td>
                                        <td>{{ $shift->name }}</td>
                                        <td>{{ $shift->start }}</td>
                                        <td>{{ $shift->end }}</td>
                                        <td>{{ $shift->grace }}</td>
                                        <td>{{ $shift->late_fee }}</td>
                                        <td>{{ $shift->absent_fee }}</td>
                                        <td>
                                            <a  class="btn btn-sm btn-primary" href="{{ url('admin/attendance/shift/edit') }}/{{ $shift->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{ Form::open(['route'=>['shift.destroy',$shift->id],'method'=>'delete','style' => 'display: inline-block','onsubmit'=>'return deleteConfirm()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        {{ __('Showing 1 to 10 of 57 entries')}}</div>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Attendance Setting')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['route'=>'shift.store','method'=>'post']) }}
                <div class="modal-body">
                    {{--<form>--}}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Name*')}}</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="name" class="form-control" id=""  aria-describedby="" >
                                {{--<div class="input-group-prepend">--}}
                                {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Start
                            Time*')}}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="start" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-clock nav-icon"></i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('End
                            Time*')}}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="end" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Grace
                            Time*')}}</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="grace" class="form-control">
                                {{--<div class="input-group-prepend">--}}
                                {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Late
                            Present Fee*')}}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">{{ __('Tk')}}</span>
                                </div>
                                <input type="text" name="late_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Absent
                            Fee*')}}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">{{ __('Tk')}}</span>
                                </div>
                                <input type="text" name="absent_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance Start Time*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" id=""  aria-describedby="" >--}}
                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Exit Attendance End Time*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" id=""  aria-describedby="" >--}}
                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Process*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Notification*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Shift*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row">--}}
                    {{--<label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">User*</label>--}}
                    {{--<div class="col-sm-9">--}}
                    {{--<div class="input-group">--}}
                    {{--<select id="inputState" class="form-control">--}}
                    {{--<option selected>Choose...</option>--}}
                    {{--<option>...</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> {{ __('Add')}}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /Attendance setting add new form End*** -->
@stop

@section('script')
    <script>
        function deleteConfirm() {
            var x = confirm('Are you sure you wan to delete this shift?');
            return !!x;
        }
    </script>
@stop
