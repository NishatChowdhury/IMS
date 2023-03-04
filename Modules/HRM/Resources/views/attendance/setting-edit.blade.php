@extends('hrm::layouts.master')

@section('title','Attendance | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Attendance Setting Edit')}}</h1>
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


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <button type="button" class="btn btn-dark btn-sm" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>{{ __('
                                Go Back')}}</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
<div class="row">
    <div class="col-12">
                        {{ Form::open(['route'=>'shift.update','method'=>'post']) }}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">{{ __('Name*')}}</label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" name="name" value="{{ $shift->name }}" class="form-control" id=""  aria-describedby="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Start Time*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="start" value="{{ $shift->start }}" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
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
                                <input type="text" name="end" value="{{ $shift->end }}" class="form-control" aria-describedby="" placeholder="hh:mm:ss">
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
                                <input type="text" name="grace" value="{{ $shift->grace }}" class="form-control">
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
                                <input type="text" name="late_fee" value="{{ $shift->late_fee }}" class="form-control" id="" placeholder="0"  aria-describedby="" >
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
                                <input type="text" name="absent_fee" value="{{ $shift->absent_fee }}" class="form-control" id="" placeholder="0"  aria-describedby="" >
                                <input type="hidden" name="id" value="{{ $shift->id }}">
                            </div>
                        </div>
                    </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> {{ __('Edit')}}</button>
                </div>
                {{ Form::close() }}
    </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')
    <script>
        function deleteConfirm() {
            var x = confirm('Are you sure you wan to delete this shift?');
            return !!x;
        }
    </script>
@stop
