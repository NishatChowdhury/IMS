@extends('hrm::layouts.master')

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
        .cardBtn{
            display: inline-block;
            right: 10px;
            position: absolute;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Edit Teacher & Staff') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Staffs')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Add Staffs')}}</li>
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
                            <li class="active"><a href="#tab1" data-toggle="tab">{{ __('General Information') }}</a></li>
                            <li><a href="#tab2" data-toggle="tab">{{ __('Personal Information') }}</a></li>
                            <li><a href="#tab3" data-toggle="tab">{{ __('Address & Images') }}</a></li>
                            <li><a href="#tab4" data-toggle="tab">{{ __('Other Inoformation') }}</a></li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="row">
                                    {{ Form::model($info,['route'=>['staff.update_staff',$info->id], 'method' => 'PATCH', 'files'=>true]) }}
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
                                                    <textarea name="address" class="form-control" placeholder="Enter Address .. . . " id="" cols="30" rows="5">
                                                       {{ $info->address ?? '' }}
                                                    </textarea>
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
                                <input type="hidden" name="role_id" value="2">
                                {{ Form::close() }}
                            </div>

                            <div class="tab-pane" id="tab4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Academic Information

                                                        <div class="text-right cardBtn">
                                                            <button onclick="addModel('academicModel','{{route('staff.store_academic')}}')"  class="btn btn-sm btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            @foreach($academic as $ac)
                                                                <tr>
                                                                    <td>
                                                                        {{$ac->ac_label_education ?? ''}}
                                                                    </td>
                                                                    <td class="text-right">

                                                                        <button class="btn btn-sm btn-primary" onclick="openModel('academicModel', {{$ac->id}},'{{route('staff.update_academic')}}')">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                {{--    academic info--}}
 @endforeach
                                                                <div class="modal fade" id="academicModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog model-lg" role="document" >
                                                                        <div class="modal-content" style="width: 700px">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Academic Info Edit</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>


                                                                            <form method="post" class="trainingForm">
                                                                            @csrf
                                                                            <input type="hidden" class="id" name="id">
                                                                            <input type="hidden"  value="{{ $info->id }}" name="staff_id">
                                                                            <div class="row takeAcademic" style="margin-top: 10px">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label for="inputEmail4">Level of Education *</label>
                                                                                                <input type="hidden" name="role_id" value="2">
                                                                                                {{ Form::text('ac_label_education',null,['id'=>'ac_label_education','class'=>'form-control','placeholder' => 'Level of Education']) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Exam/Degree Title</label>
                                                                                                {{--                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">--}}
                                                                                                {{ Form::text('ac_degree',null,['id'=>'ac_degree','class'=>'form-control','placeholder' => "Exam/Degree Title"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Concentration/ Major/Group</label>
                                                                                                <div class="input-group">

                                                                                                    {{--                                                                            <input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">--}}
                                                                                                    {{ Form::text('ac_major',null,['id'=>'ac_major','class'=>'form-control','placeholder' => "Concentration/ Major/Group"]) }}
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Institute</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_institute',null,['id'=>'ac_institute','class'=>'form-control','placeholder' => "institute"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Board</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_board',null,['id'=>'ac_board','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Result</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_result',null,['id'=>'ac_result','class'=>'form-control','placeholder' => "Result"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Year</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_year',null,['id'=>'ac_year','class'=>'form-control','placeholder' => "Year"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Duration</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_duration',null,['id'=>'ac_duration','class'=>'form-control','placeholder' => "Duration"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Achievement</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('ac_achievement',null,['id'=>'ac_achievement','class'=>'form-control','placeholder' => "Achievement"]) }}
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <button type="submit" class="btn btn-primary btn-block btn-sm">Save</button>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>



                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>Experience Information</b>
                                                        <div class="text-right cardBtn">
                                                             <button onclick="addModel('experienceModel','{{route('staff.store_experience')}}')"  class="btn btn-sm btn-dark">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            @foreach($experience as $ex)
                                                                <tr>
                                                                    <td>
                                                                        {{$ex->er_designation ?? ''}}
                                                                    </td>
                                                                    <td class="text-right">
                                                                         <button class="btn btn-sm btn-dark" onclick="openModel('experienceModel', {{$ex->id}},'{{route('staff.update_experience')}}')">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                                <div class="modal fade" id="experienceModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog model-lg" role="document" >
                                                                        <div class="modal-content" style="width: 700px">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Experience Info Edit</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                          <form method="post" class="trainingForm">
                                                                            @csrf
                                                                            <input type="hidden" class="id" name="id">
                                                                            <input type="hidden"  value="{{ $info->id }}" name="staff_id">

                                                                            <input type="hidden" name="id" value="{{$ex->id}}">
                                                                            <div class="row takeExperience" style="margin-top: 10px">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label for="inputEmail4">Company *</label>
                                                                                                <input type="hidden" name="role_id" value="2">
                                                                                                {{ Form::text('er_company',null,['id'=>'er_company','class'=>'form-control','placeholder' => 'Company']) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Institute</label>
                                                                                                {{--                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">--}}
                                                                                                {{ Form::text('er_institute',null,['id'=>'er_institute','class'=>'form-control','placeholder' => "Institute"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Designation</label>
                                                                                                <div class="input-group">
                                                                                                    {{--<input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">--}}
                                                                                                    {{ Form::text('er_designation',null,['id'=>'er_designation','class'=>'form-control','placeholder' => "Designation"]) }}
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Area Of Experience</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('er_experience',null,['id'=>'er_experience','class'=>'form-control','placeholder' => "Area Of Experience"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Starting Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('er_start',null,['id'=>'er_start','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Ending Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('er_end',null,['id'=>'er_end','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Location</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('er_location',null,['id'=>'er_location','class'=>'form-control','placeholder' => "Location"]) }}
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <button type="submit" class="btn btn-primary btn-block btn-sm">Save</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                              </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Training Information
                                                        <div class="text-right cardBtn">
                                                            <button onclick="addModel('trainingModel','{{route('staff.store_training')}}')"  class="btn btn-sm btn-danger">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            @foreach($training as $tr)
                                                                <tr>
                                                                    <td >
                                                                        {{$tr->tr_title ?? ''}}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <button class="btn btn-sm btn-danger" onclick="openModel('trainingModel', {{$tr->id}},'{{route('staff.update_training')}}')">
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <div class="modal fade" id="trainingModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog model-lg" role="document" >
                                                                    <div class="modal-content" style="width: 700px">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Training Info Edit</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <form method="post" class="trainingForm">
                                                                            @csrf
                                                                            <input type="hidden" id="tr_id" name="id">
                                                                            <input type="hidden"  id="tr_staff" name="staff_id">
                                                                            <div class="row takeTraining" style="margin-top: 10px">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label for="inputEmail4">Title *</label>
                                                                                                <input type="hidden" name="role_id" value="2">
                                                                                                {{ Form::text('tr_title',null,['id' => 'tr_title','class'=>'form-control','placeholder' => 'Title']) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Topic Cover</label>
                                                                                                {{--                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">--}}
                                                                                                {{ Form::text('tr_topic_cover',null,['id' => 'tr_topic_cover','class'=>'form-control','placeholder' => "Topic Cover"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Institute</label>
                                                                                                <div class="input-group">
                                                                                                    {{--<input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">--}}
                                                                                                    {{ Form::text('tr_institute',null,['id' => 'tr_institute','class'=>'form-control','placeholder' => "Institute"]) }}
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Location</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('tr_location',null,['id' => 'tr_location','class'=>'form-control','placeholder' => "Location"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Passing Year</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::selectRange('tr_year',2020, 2024, null, ['id' => 'tr_year','class'=>'form-control','placeholder' => "Select Year"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Starting Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('tr_start',null,['id' => 'tr_start','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Ending Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('tr_end',null,['id' => 'tr_end','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Duration</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('tr_duration',null,['id' => 'tr_duration','class'=>'form-control','placeholder' => "DUration"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Country</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('tr_country',null,['id' => 'tr_country','class'=>'form-control','placeholder' => "Country"]) }}
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <button type="submit" class="btn btn-primary">save</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>Course Information</b>
                                                        <div class="text-right cardBtn">
                                                             <button onclick="addModel('courseModel','{{route('staff.store_course')}}')"  class="btn btn-sm btn-info">Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            @foreach($course as $co)
                                                                <tr>
                                                                    <td>
                                                                        {{$co->co_title ?? ''}}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <button class="btn btn-sm btn-info"
                                                                                onclick="openModel('courseModel', {{$co->id}},'{{route('staff.update_course')}}')"
                                                                        >
                                                                            <i class="fa fa-eye"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <div class="modal fade" id="courseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog model-lg" role="document" >
                                                                        <div class="modal-content" style="width: 700px">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Course Info Edit</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                          <form method="post" class="trainingForm">
                                                                            @csrf
                                                                            <input type="hidden" class="id" name="id">
                                                                            <input type="hidden" name="staff_id" value="{{ $info->id }}">
                                                                            <div class="row takeCourse" style="margin-top: 10px">
                                                                                <div class="col-md-12">
                                                                                    <div class="card">
                                                                                        <div class="card-body row">
                                                                                            <div class="form-group col-md-12">
                                                                                                <label for="inputEmail4">Title *</label>
                                                                                                <input type="hidden" name="role_id" value="2">
                                                                                                {{ Form::text('co_title',null,['id'=>'co_title','class'=>'form-control','placeholder' => 'Title']) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Topic Cover</label>
                                                                                                {{--                                                                    <input type="text" name="father_husband" class="form-control" id="" placeholder="" value="{{$info->father_husband ?? ''}}">--}}
                                                                                                {{ Form::text('co_topic_cover',null,['id'=>'co_topic_cover','class'=>'form-control','placeholder' => "Topic Cover"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Institute</label>
                                                                                                <div class="input-group">
                                                                                                    {{--<input id="mobile" name="mobile" class="form-control" aria-describedby="" required value="{{$info->mobile ?? ''}}">--}}
                                                                                                    {{ Form::text('co_institute',null,['id'=>'co_institute','class'=>'form-control','placeholder' => "Institute"]) }}
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Location</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('co_location',null,['id'=>'co_location','class'=>'form-control','placeholder' => "Location"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Passing Year</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::selectRange('co_year',2020, 2024, null, ['id'=>'co_year','class'=>'form-control','placeholder' => "Select Year"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Starting Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('co_start',null,['id'=>'co_start','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Ending Date</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::date('co_end',null,['id'=>'co_end','class'=>'form-control','placeholder' => "Board"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Result</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('co_result',null,['id'=>'co_result','class'=>'form-control','placeholder' => "Result"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Certificate</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('co_c_no',null,['id'=>'co_c_no','class'=>'form-control','placeholder' => "Certificate"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Duration</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('co_duration',null,['id'=>'co_duration','class'=>'form-control','placeholder' => "DUration"]) }}
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label for="">Country</label>
                                                                                                {{--                                                                    <input type="text" name="nid" class="form-control" id="" placeholder="" value="{{$info->nid ?? ''}}">--}}
                                                                                                {{ Form::text('co_country',null,['id'=>'co_country','class'=>'form-control','placeholder' => "Country"]) }}
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <button type="submit" class="btn btn-primary btn-block btn-sm">Save</button>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          </form>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


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
        function openModel(modelName,id,action){
            $('.trainingForm').attr('action', action);

            if(modelName == 'trainingModel'){
                $.get("/admin/staff/staff_training/"+id, function (data) {
                    $('#tr_id').val(data.id);
                    $('#tr_staff').val(data.staff_id);
                    $('#tr_title').val(data.tr_title);
                    $('#tr_topic_cover').val(data.tr_topic_cover);
                    $('#tr_institute').val(data.tr_institute);
                    $('#tr_location').val(data.tr_location);
                    $('#tr_year').val(data.tr_year);
                    $('#tr_start').val(data.tr_start);
                    $('#tr_end').val(data.tr_end);
                    $('#tr_duration').val(data.tr_duration);
                    $('#tr_country').val(data.tr_country);
                });
            }else if(modelName == 'courseModel'){
                $.get("/admin/staff/staff_course/"+id, function (data) {
                    $('.id').val(data.id);
                    $('#co_title').val(data.co_title);
                    $('#co_topic_cover').val(data.co_topic_cover);
                    $('#co_institute').val(data.co_institute);
                    $('#co_location').val(data.co_location);
                    $('#co_year').val(data.co_year);
                    $('#co_start').val(data.co_start);
                    $('#co_end').val(data.co_end);
                    $('#co_result').val(data.co_result);
                    $('#co_c_no').val(data.co_c_no);
                    $('#co_duration').val(data.co_duration);
                    $('#co_country').val(data.co_country);

                });
            }else if(modelName == 'experienceModel'){

                $.get("/admin/staff/staff_experience/"+id, function (data) {
                    $('.id').val(data.id);
                    $('#er_company').val(data.er_company);
                    $('#er_institute').val(data.er_institute);
                    $('#er_designation').val(data.er_designation);
                    $('#er_experience').val(data.er_experience);
                    $('#er_start').val(data.er_start);
                    $('#er_end').val(data.er_end);
                    $('#er_location').val(data.er_location);

                });
            }else if(modelName == 'academicModel'){
                 $.get("/admin/staff/staff_academic/"+id, function (data) {
                 $('.id').val(data.id);
                $('#ac_label_education').val(data.ac_label_education);
                $('#ac_degree').val(data.ac_degree);
                $('#ac_major').val(data.ac_major);
                $('#ac_year').val(data.ac_year);
                $('#ac_institute').val(data.ac_institute);
                $('#ac_board').val(data.ac_board);
                $('#ac_result').val(data.ac_result);
                $('#ac_duration').val(data.ac_duration);
                $('#ac_achievement').val(data.ac_achievement);
                });
            }
















            $('#'+modelName).modal('show');

        }
        function addModel(id,action){
            let staff = "{{ $info->id }}"
            $('#tr_staff').val(staff);

            if(id == 'trainingModel'){
                $('#tr_title').val('');
                $('#tr_topic_cover').val('');
                $('#tr_institute').val('');
                $('#tr_location').val('');
                $('#tr_year').val('');
                $('#tr_start').val('');
                $('#tr_end').val('');
                $('#tr_duration').val('');
                $('#tr_country').val('');
            }else if(id == 'courseModel'){
                    $('#co_title').val('');
                    $('#co_topic_cover').val('');
                    $('#co_institute').val('');
                    $('#co_location').val('');
                    $('#co_year').val('');
                    $('#co_start').val('');
                    $('#co_end').val('');
                    $('#co_result').val('');
                    $('#co_c_no').val('');
                    $('#co_duration').val('');
                    $('#co_country').val('');
            }else if(id == 'experienceModel'){

                    $('#er_company').val('');
                    $('#er_institute').val('');
                    $('#er_designation').val('');
                    $('#er_experience').val('');
                    $('#er_start').val('');
                    $('#er_end').val('');
                    $('#er_location').val('');
            }else if(id == 'academicModel'){
                 $('#ac_label_education').val('');
                $('#ac_degree').val('');
                $('#ac_major').val('');
                $('#ac_year').val('');
                $('#ac_institute').val('');
                $('#ac_board').val('');
                $('#ac_result').val('');
                $('#ac_duration').val('');
                $('#ac_achievement').val('');
            }

            $('.trainingForm').attr('action', action);
            $('#'+id).modal('show');
        }
    </script>
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
