@extends('layouts.fixed')

@section('title','Staff | Add')
@section('style')
    <style>
        ul.nav.nav-tabs.customNextForm {
            padding: 28px;
            /* background: #5fdaff; */
            display: inline-flex;
        }

        ul.nav.nav-tabs.customNextForm li {
            margin-left: 10px;
        }

        ul.nav.nav-tabs.customNextForm li a {
            color: #fff;
            font-weight: 800;
            text-decoration: none;
            font-size: 15px;
            background: #343a40;
            padding: 8px 44px 8px 44px;
            border-radius: 5px;
        }

        ul.nav.nav-tabs.customNextForm li .active{
            background: #5582af;
        }
        input.form-control.customImage {
            border: none;
        }

.form-group.files.color {
    border-radius: 3px;
    height: 136px;
    border: 1px solid#ced4da;
}
    </style>
@endsection
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if($errors->any())
                            <ul style="color:red">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/teacher page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <ul class="nav nav-tabs customNextForm">
                            <li class="active"><a href="#tab1" data-toggle="tab">General Information</a></li>
                            <li><a href="#tab2" data-toggle="tab">Personal Information</a></li>
                            <li><a href="#tab3" data-toggle="tab">Address & Images</a></li>
                        </ul>
                        {!! Form::open(['action'=>'Backend\StaffController@store_staff', 'method'=>'post', 'files'=>true]) !!}
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body row">
                                                <div class="form-group col-6">
                                                    <label for="inputEmail4">Card ID</label>
                                                    <div class="input-group ">
                                                        <input id="text" name="card_id" placeholder="Card ID" class="form-control" aria-describedby="" value="{{ $info->card_id ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Code</label>
                                                    {{ Form::text('code',null,['class'=>'form-control','placeholder' => 'Enter Code']) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Email</label>
                                                    {{ Form::email('email',null,['class'=>'form-control','placeholder' => 'Enter Email']) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Job Title</label>
                                                    {{ Form::text('title',null,['class'=>'form-control','placeholder' => 'Enter Job Title']) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Job Type</label>
                                                    <div class="input-group">
                                                        {!! Form::select('job_type_id', ['1'=>'Temporary', '2'=>'Permanent'], $info->job_type_id ?? null, ['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Staff type*</label>
                                                    <div class="input-group">
                                                        {!! Form::select('staff_type_id', ['1'=>'Staff', '2'=>'Teacher'], $info->staff_type_id ?? null, ['class'=>'form-control']) !!}
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Joining Date</label>
                                                        <div class="input-group">
                                                            {{Form::text('joining', $info->joining ?? null,['class'=>'form-control datePicker','placeholder' => 'Enter Job Joining Date'])}}
                                                            <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                                                <i class="far fa-calendar-alt"></i>
                                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Shift type*</label>
                                                    <div class="input-group">
                                                        {!! Form::select('shift_id', $shifts, $info->shift_id ?? null, ['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4">Full Name*</label>
                                                    <input type="hidden" name="role_id" value="2">
                                                    {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'Enter Full Name']) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Father/Husband's Name</label>
                                                    {{--                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">--}}
                                                    {{ Form::text('father_husband',null,['class'=>'form-control','placeholder' => "Enter Father/Husband's Name"]) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Mobile</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-phone"></i></span>
                                                        </div>
                                                        {{--                                                                            <input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">--}}
                                                        {{ Form::text('mobile',null,['class'=>'form-control','placeholder' => "Enter Mobile Number"]) }}
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Date Of Birth</label>
                                                    <div class="input-group">
                                                        {{--<input id="" type="text" class="form-control datePicker" aria-describedby="">--}}
                                                        {{Form::text('dob',  $info->dob ?? null, ['class'=>'form-control datePicker','placeholder' => "Enter Date Of Birth"])}}
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">National ID</label>
                                                    {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                    {{ Form::number('nid',null,['class'=>'form-control','placeholder' => "Enter NID Card Number"]) }}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Gender </label>
                                                    <div class="input-group">
                                                        {!! Form::select('gender_id', $genders,  $info->gender_id ?? '', ['class'=>'form-control', 'required']) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Blood Group</label>
                                                    <div class="input-group">
                                                        {!! Form::select('blood_group_id', $blood_groups,  $info->blood_group_id ?? '', ['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea name="address" class="form-control" placeholder="Enter Address .. . . " id="" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="inputEmail4">Add File</label>
                                                    <div class="form-group files color">
                                                        <input type="file" name="image" class="form-control customImage">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm btn-block">Save Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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

        $('.btnNext').click(function(){
            $('.nav-tabs > .active').next('li').find('a').trigger('click');
        });

        $('.btnPrevious').click(function(){
            $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });
    </script>
@stop
