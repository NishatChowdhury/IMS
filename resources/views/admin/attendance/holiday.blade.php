@extends('layouts.fixed')

@section('title','Holiday | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Holiday Setting </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Holiday Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    {{ Form::open(['action'=>'Backend\HolidayController@store','method'=>'post']) }}
                                    <div class="form-group">
                                        <label for="email">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" placeholder="Holiday Name" name="name" type="text">
                                        <div class="invalid-feedback">
                                            @error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <div class="input-group">
                                            <input class="form-control datePicker @error('start') is-invalid @enderror" name="start" type="text">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('start') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <div class="input-group">
                                            <input class="form-control datePicker @error('end') is-invalid @enderror" name="end" type="text">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                            </div>
                                            <div class="invalid-feedback">
                                                @error('end') {{ $message }} @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Is Holiday</label>
                                        <input class="checkboxCustom @error('is_holiday') is-invalid @enderror" name="is_holiday" value="1" type="checkbox">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Is SmS</label>
                                        <input class="checkboxCustom @error('is_holiday') is-invalid @enderror" name="is_sms" value="1" type="checkbox">
                                    </div>
                                    <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Is_Holiday</th>
                                            <th>Is_sms</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($holidays as $h)
                                            <tr>
                                                <td>{{ $h->id }}</td>
                                                <td>{{ $h->name }}</td>
                                                <td>
                                                    {{ $h->start}}
                                                </td>
                                                <td>
                                                    {{ $h->end }}
                                                </td>
                                                <td>
                                                    @if($h->is_holiday)
                                                        <span class="badge badge-primary">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($h->is_sms)
                                                        <span class="badge badge-primary">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ Form::open(['action'=>['Backend\HolidayController@destroy',$h->id],'method'=>'delete','onsubmit'=>'return deleteConfirm()']) }}
                                                    <a href="{{ action('Backend\HolidayController@edit',$h->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
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
                {{ Form::open(['action'=>'Backend\ShiftController@store','method'=>'post']) }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="name" class="form-control" id=""  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Start Time*</label>
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
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">End Time*</label>
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
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Grace Time*</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="grace" class="form-control">
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
                                <input type="text" name="late_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
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
                                <input type="text" name="absent_fee" class="form-control" id="" placeholder="0"  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
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
            var x = confirm('Are you sure you wan to delete this holiday?');
            return !!x;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>

@stop

@section('plugin')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop
