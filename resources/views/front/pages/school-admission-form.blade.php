@extends('layouts.front-inner')

@section('title','Applied Students | School')

@section('style')
    <style>
        ul.parent_info {
            list-style: none;
            line-height: 7px;
        }

        ul.parent_info p {
            margin: 0px;
            padding: 0px;
        }

        ul.parent_info label {
            font-weight: 800;
            margin: 0px;
        }.cus_courl h1{
             color: #61c721;
             font-weight: 900;
         }
        /* for image upload  */
        .drop-zone {
            max-width: 50%;
            height: 300px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 1px solid #b9c1b3;
            border-radius: 10px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }

        .showImg{
            width: 155px;
            height: 185px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }
        span.red{
            color: red;
        }
    </style>
@endsection

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('online admission')  }}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __ ('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ __ ('Result')}} </a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('online admission') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-50 border-bottom bg-light-v4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center cus_courl">
                    <h4>{{ __('Online Admission Form') }}</h4>
                    <h1>Class {{ $onlineAdmission->classes->name ?? '' }} {{ $onlineAdmission->group->name ?? '' }}</h1>
                </div>


                {!! Form::open(['action'=>'Front\OnlineApplyController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert border border-success text-success bg-success-0_1 px-4 py-3 alert-dismissible fade show" role="alert">
                            <div class="media align-items-center">
                                <i class="mr-2 ti-check font-size-20"></i>
                                <div class="media-body">
                                    <strong>{{ __(' Well done') }}!</strong>  {{ session('status') }}
                                </div>
                            </div>
                            <button type="button" class="close font-size-14 absolute-center-y" data-dismiss="alert" aria-label="Close">
                                <i class="ti-close"></i>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-body  border">
                                <h4 class="mb-3"><b>{{__('Personal Info')}}</b></h4>
                                <div class="row">

                                    <div class="form-group col-6">
                                        {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                                        <span class="red">*</span>
                                        {{ Form::text('name', null, [ 'id' => 'name', 'placeholder' => 'Student\'s  Name...', 'class' => 'form-control' ]) }}
                                        @error('name')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{Form::label('name','Student\'s name Bangla',['class'=>'control-label'])}}
                                        <span class="red">*</span>
                                        {{ Form::text('name_bn', null, ['id' => 'name_bn', 'placeholder' => 'Student\'s  Name Bangla...', 'class' => 'form-control' ]) }}
                                        @error('name_bn')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        {{Form::label('name','Student\'s Birth Certificate',['class'=>'control-label'])}}
                                        <span class="red">*</span>
                                        {{ Form::number('birth_certificate', null, ['id' => 'birth_certificate','placeholder' => 'Student\'s  Birth Certificate...', 'class' => 'form-control' ]) }}
                                        @error('birth_certificate')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('dob','Date of Birth',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::date('dob',null,['id' => 'dob','class' => 'form-control', 'placeholder'=>'Date of Birth']) }}
                                        @error('dob')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::select('gender_id', $data['gender'], null, ['id' => 'gender_id','class'=>'form-control','placeholder' => 'Select Gender...']) }}
                                        @error('gender_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    {{-- for 2nd section --}}

                                    <div class="form-group col-6">
                                        {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::select('blood_group_id', $data['blood'], null, ['id' => 'blood_group_id','placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                        @error('blood_group_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::select('religion_id', $data['religion'], null, ['id' => 'religion','placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                        @error('religion_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-12">
                                        <div class="form-group files color">
                                            {{ Form::label('stuPic', 'Student Picture', ['class' => 'control-label']) }}
                                            {{ Form::file('pic',['class'=>'form-control', 'id'=>"file-input"]) }}
                                            @error('pic')
                                                    <b style="color: red">{{ $message }}</b>
                                            @enderror
                                            <div id="thumb-output"></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body border">
                                <h4 class="mb-3"><b>{{__('Address Info')}} {{ $onlineAdmission->group_id }}</b></h4>
                                <div class="row">
                                    <input type="hidden" name="class_id" value="{{ $onlineAdmission->class_id }}">
                                    <input type="hidden" name="group_id" value="{{ $onlineAdmission->group_id }}">
                                    <input type="hidden" name="session_id" value="{{ $onlineAdmission->session_id }}">
                                    {{-- <div class="form-group col-6">
                                        {{ Form::label('class_id','Class Name',['class'=>'control-label']) }}
                                        {{ Form::select('class_id', $data['class'], null, ['placeholder' => 'Select Class...','class'=>'form-control']) }}
                                        @error('class_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('group_id','Group',['class'=>'control-label']) }}
                                        {{ Form::select('group_id', $data['group'], null, ['placeholder' => 'Select Group...','class'=>'form-control']) }}
                                        @error('group_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group col-12">
                                        {{ Form::label('streetAddress','Address',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::textarea('address',null,['id' => 'address','class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address']) }}
                                        @error('address')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('area',null,['id' => 'area','class'=>'form-control', 'placeholder'=>'Area Town']) }}
                                        @error('area')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('zip',null,['id' => 'zip','class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                                        @error('zip')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        {{ Form::label('city_id','City',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::select('city_id',$data['city'], null, ['id' => 'city_id','placeholder' => 'Select City','class'=>'form-control']) }}
                                        @error('city_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('country','Country',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::select('country_id', $data['country'], null, ['id' => 'country_id','placeholder' => 'Select Country...','class'=>'form-control']) }}
                                        @error('country_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('nationality','Nationality',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('nationality',null,['id' => 'nationality','class'=>'form-control', 'placeholder'=>'Nationality']) }}
                                        @error('nationality')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>{{__('Father Info')}}</b></h4>
                                <div class="row">
                                    <div class="form-group col-6">
                                        {{ Form::label('f_name','Father Name',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('f_name', !empty($father) ? $father->f_name : null,['id' => 'f_name','class'=>'form-control', 'placeholder'=>'Father Name']) }}
                                        @error('fname')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('f_name_bn','Father Name Bangla',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('f_name_bn',!empty($father) ? $father->f_name_bn : null,['id' => 'f_name_bn','class'=>'form-control', 'placeholder'=>'Father Name Bangla']) }}
                                        @error('f_name_bn')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('f_mobile','Father Mobile',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('f_mobile',!empty($father) ? $father->f_mobile : null,['id' => 'f_mobile','class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                                        @error('f_mobile')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('f_email','Father Email',['class'=>'control-label']) }}
                                        {{ Form::email('f_email',!empty($father) ? $father->f_email : null,['id' => 'f_email','class'=>'form-control', 'placeholder'=>'Father Email']) }}
                                        @error('f_email')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('f_dob','Father Date of Birth',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::date('f_dob',!empty($father) ? $father->f_dob : null,['id' => 'f_dob','class' => 'form-control', 'placeholder'=>'Father Date of Birth']) }}
                                        @error('f_dob')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('f_occupation','Father Occupation',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('f_occupation',!empty($father) ? $father->f_occupation : null,['id' => 'f_occupation','class'=>'form-control', 'placeholder'=>'Father Occupation']) }}
                                        @error('f_occupation')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('f_nid','Father NID',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::number('f_nid',!empty($father) ? $father->f_nid : null,['id' => 'f_nid','class'=>'form-control', 'placeholder'=>'Father NID']) }}
                                        @error('f_nid')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('f_birth_certificate','Father Birth Certificate',['id' => 'f_birth_certificate','class'=>'control-label']) }}
                                        {{ Form::number('f_birth_certificate',!empty($father) ? $father->f_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Father Birth Certificate']) }}
                                        @error('f_birth_certificate')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>{{__('Mother Info')}}</b></h4>
                                <div class="row">
                                    <div class="form-group col-6">
                                        {{ Form::label('m_name','Mother Name',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('m_name',!empty($mother) ? $mother->m_name : null,['id' => 'm_name','class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                                        @error('m_name')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('m_name_bn','Mother Name Bangla',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('m_name_bn',!empty($mother) ? $mother->m_name_bn : null,['id' => 'm_name_bn','class'=>'form-control', 'placeholder'=>'Mother Name Bangla']) }}
                                        @error('m_name_bn')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('m_mobile','Mother Mobile',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('m_mobile',!empty($mother) ? $mother->m_mobile : null,['id' => 'm_mobile','class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                                        @error('m_mobile')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('m_email','Mother Email',['class'=>'control-label']) }}
                                        {{ Form::email('m_email',!empty($mother) ? $mother->m_email : null,['id' => 'm_email','class'=>'form-control', 'placeholder'=>'Mother Email']) }}
                                        @error('m_email')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('m_dob','Mother Date of Birth',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::date('m_dob',!empty($mother) ? $mother->m_dob : null,['id' => 'm_dob','class' => 'form-control', 'placeholder'=>'Mother Date of Birth']) }}
                                        @error('m_dob')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('m_occupation','Mother Occupation',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('m_occupation',!empty($mother) ? $mother->m_occupation : null,['id' => 'm_occupation','class'=>'form-control', 'placeholder'=>'Mother Occupation']) }}
                                        @error('m_occupation')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('m_nid','Mother NID',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::number('m_nid',!empty($mother) ? $mother->m_nid : null,['id' => 'm_nid','class'=>'form-control', 'placeholder'=>'Mother NID']) }}
                                        @error('m_nid')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('m_birth_certificate','Mother Birth Certificate',['class'=>'control-label']) }}
                                        {{ Form::number('m_birth_certificate',!empty($mother) ? $mother->m_birth_certificate : null,['id' => 'm_birth_certificate','class'=>'form-control', 'placeholder'=>'Mother Birth Certificate']) }}
                                        @error('m_birth_certificate')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>{{__('Guardian Info')}}</b></h4>
                                <div class="row">
                                    <div class="form-group col-6">
                                        {{ Form::label('g_name','Guardian Name',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('g_name',!empty($guardian) ? $guardian->g_name : null,['id' => 'g_name','class'=>'form-control', 'placeholder'=>'Guardian Name']) }}
                                        @error('g_name')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('g_name_bn','Guardian Name Bangla',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('g_name_bn',!empty($guardian) ? $guardian->g_name_bn : null,['id' => 'g_name_bn','class'=>'form-control', 'placeholder'=>'Guardian Name Bangla']) }}
                                        @error('g_name_bn')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('g_mobile','Guardian Mobile',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('g_mobile',!empty($guardian) ? $guardian->g_mobile : null,['id' => 'g_mobile','class'=>'form-control', 'placeholder'=>'Guardian Mobile']) }}
                                        @error('g_mobile')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('g_email','Guardian Email',['class'=>'control-label']) }}
                                        {{ Form::email('g_email',!empty($guardian) ? $guardian->g_email : null,['id' => 'g_email','class'=>'form-control', 'placeholder'=>'Guardian Email']) }}
                                        @error('g_email')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('g_dob','Guardian Date of Birth',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::date('g_dob',!empty($guardian) ? $guardian->g_dob : null,['id' => 'g_dob','class' => 'form-control', 'placeholder'=>'Guardian Date of Birth']) }}
                                        @error('g_dob')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('g_occupation','Guardian Occupation',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::text('g_occupation',!empty($guardian) ? $guardian->g_occupation : null,['id' => 'g_occupation','class'=>'form-control', 'placeholder'=>'Guardian Occupation']) }}
                                        @error('g_occupation')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        {{ Form::label('g_nid','Guardian NID',['class'=>'control-label']) }}
                                        <span class="red">*</span>
                                        {{ Form::number('g_nid',!empty($guardian) ? $guardian->g_nid : null,['id' => 'g_nid','class'=>'form-control', 'placeholder'=>'Guardian NID']) }}
                                        @error('g_nid')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('g_birth_certificate','Guardian Birth Certificate',['class'=>'control-label']) }}
                                        {{ Form::number('g_birth_certificate',!empty($guardian) ? $guardian->g_birth_certificate : null,['id' => 'g_birth_certificate','class'=>'form-control', 'placeholder'=>'Guardian Birth Certificate']) }}
                                        @error('g_birth_certificate')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="card card-body border">
                                <h4></h4>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                                            <span class="red">*</span>
                                            {{ Form::text('mobile',null,['id' => 'mobile','class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
                                            @error('mobile')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('email','E-mail',['class'=>'control-label']) }}
                                            {{ Form::email('email',null,['id' => 'email','class'=>'form-control', 'placeholder'=>'email@gmail.com']) }}
                                            @error('email')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('freedom_fighter','Freedom Fighter',['class'=>'control-label']) }}
                                            <span class="red">*</span>
                                            <br>
                                            {{ Form::radio('freedom_fighter', 1, false, ['id'=>'active', 'class'=> 'checked_f']) }}&nbsp;{{ Form::label('active','Yes') }}
                                            {{ Form::radio('freedom_fighter', 0, true, ['id'=>'inactive', 'class'=> 'checked_f']) }}&nbsp;{{ Form::label('inactive','No') }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('disability','Disability',['class'=>'control-label']) }}
                                            <span class="red">*</span>
                                            <br>
                                            {{ Form::radio('disability', 1, false, ['id'=>'active', 'class'=>"checked_d"]) }}&nbsp;{{ Form::label('active','Yes') }}
                                            {{ Form::radio('disability', 0, true, ['id'=>'inactive', 'class'=>"checked_d"]) }}&nbsp;{{ Form::label('inactive','No') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="">{{__('Student Picture')}}</label>
                                        <span class="red">*</span>
                                        <div class="drop-zone">
                                            <span class="drop-zone__prompt">{{__('Drop file here or click to upload')}}</span>
                                            {{-- <input type="file" name="myFile" class="drop-zone__input"> --}}
                                            {{ Form::file('pic',['class'=>'drop-zone__input', 'id'=>"file-input"]) }}
                                            <p></p>
                                            @error('pic')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            {{-- {!! Form::submit(__('Preview'), ['class' => 'form-control, btn btn-success btn-block']) !!} --}}
                                            <button onClick="add()" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal__large">Preview</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal__large" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal__large">Preview Information</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <p class="mb-2"><b>{{__('Student Info')}}</b></p> <hr>
                                                                    <ul class="parent_info">
                                                                        <li>
                                                                            <label for="">{{__('Name')}}</label>
                                                                            <p id="sname"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Name bangla')}}</label>
                                                                            <p id="sname_bn"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Birth Certificate')}}</label>
                                                                            <p id="sbirth_certificate"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Date of Birth')}}</label>
                                                                            <p id="sdob"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Gender')}}</label>
                                                                            <p id="sgender_id"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Blood Group')}}</label>
                                                                            <p id="sblood_group_id"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Religion')}}</label>
                                                                            <p id="sreligion"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Contact Number')}}</label>
                                                                            <p id="smobile"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Email')}}</label>
                                                                            <p id="semail"></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-4">
                                                                    <p class="mb-2"><b>{{__('Address Info')}}</b></p> <hr>
                                                                    <ul class="parent_info">
                                                                        <li>
                                                                            <label for="">{{__('Address')}}</label>
                                                                            <p id="saddress"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Area / Town')}}</label>
                                                                            <p id="sarea"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Post / Zip Code')}}</label>
                                                                            <p id="szip"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('City')}}</label>
                                                                            <p id="scity_id"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Country')}}</label>
                                                                            <p id="scountry_id"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Nationality')}}</label>
                                                                            <p id="snationality"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Freedom Fighter')}}</label>
                                                                            <p id="sf_fighter"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Disability')}}</label>
                                                                            <p id="sf_dis"></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-4 p-5">
                                                                    <div class="showImg"></div>
                                                                </div>


                                                                <div class="col-4">
                                                                    <p class="mb-2"><b>{{__('Father Info')}}</b></p> <hr>
                                                                    <ul class="parent_info">
                                                                        <li>
                                                                            <label for="">{{__('Name')}}</label>
                                                                            <p id="sf_name"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Email')}}</label>
                                                                            <p id="sf_email"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">Nu{__{('')}}mber</label>
                                                                            <p id="sf_mobile"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Date of Birth')}}</label>
                                                                            <p id="sf_dob"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Occupation')}}</label>
                                                                            <p id="sf_occupation"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('NID')}}</label>
                                                                            <p id="sf_nid"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Birth Certificate')}}</label>
                                                                            <p id="sf_birth_certificate"></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-4">
                                                                    <p class="mb-2"><b>{{__('Mother Info')}}</b></p> <hr>
                                                                    <ul class="parent_info">
                                                                        <li>
                                                                            <label for="">{{__('Name')}}</label>
                                                                            <p id="sm_name"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Email')}}</label>
                                                                            <p id="sm_email"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Number')}}</label>
                                                                            <p id="sm_mobile"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Date of Birth')}}</label>
                                                                            <p id="sm_dob"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Occupation')}}</label>
                                                                            <p id="sm_occupation"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('NID')}}</label>
                                                                            <p id="sm_nid"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Birth Certificate')}}</label>
                                                                            <p id="sm_birth_certificate"></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-4">
                                                                    <p class="mb-2"><b>{{__('Guardian Info')}}</b></p>
                                                                    <hr>
                                                                    <ul class="parent_info">
                                                                        <li>
                                                                            <label for="">{{__('Name')}}</label>
                                                                            <p id="sg_name"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Email')}}</label>
                                                                            <p id="sg_email"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Number')}}</label>
                                                                            <p id="sg_mobile"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Date of Birth')}}</label>
                                                                            <p id="sg_dob"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Occupation')}}</label>
                                                                            <p id="sg_occupation"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('NID')}}</label>
                                                                            <p id="sg_nid"></p>
                                                                        </li>
                                                                        <li>
                                                                            <label for="">{{__('Birth Certificate')}}</label>
                                                                            <p id="sg_birth_certificate"></p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
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
                {!! Form::close() !!}
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>



@stop

@section('script')
    <script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".drop-zone");

            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });

            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
            });

            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
         */
        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // First time - remove the prompt
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }

            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }



            thumbnailElement.dataset.label = file.name;

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                let showImg = document.querySelector('.showImg');
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                    showImg.style.backgroundImage = `url('${reader.result}')`;

                };




            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }



        $("select").change(function(){
            var selectedCountry = $(this).children("option:selected").text();
            // console.log($(this).attr("id"));
            if($(this).attr("id") == 'gender_id'){
                $('#sgender_id').text(selectedCountry);
            }
            if($(this).attr("id") == 'blood_group_id'){
                $('#sblood_group_id').text(selectedCountry);
            }
            if($(this).attr("id") == 'religion'){
                $('#sreligion').text(selectedCountry);
            }
            if($(this).attr("id") == 'city_id'){
                $('#scity_id').text(selectedCountry);
            }
            if($(this).attr("id") == 'country_id'){
                $('#scountry_id').text(selectedCountry);
            }

        });
        function add(){

            console.log();


            $('#sImg').attr('src',$('#file-input').val());

            $('#sname').text($('#name').val());
            $('#sname_bn').text($('#name_bn').val());
            $('#sbirth_certificate').text($('#birth_certificate').val());
            $('#sdob').text($('#dob').val());

            $('#smobile').text($('#mobile').val());
            $('#semail').text($('#email').val());

            $('#saddress').text($('#address').val());
            $('#sarea').text($('#area').val());
            $('#szip').text($('#zip').val());

            $('#snationality').text($('#nationality').val());

            if($('input[class=checked_f]:checked').val() == 1){
                $('#sf_fighter').text('Yes');
            }else{
                $('#sf_fighter').text('No');
            }
            if($('input[class=checked_d]:checked').val() == 1){
                $('#sf_dis').text('Yes');
            }else{
                $('#sf_dis').text('No');
            }



            $('#sf_name').text($('#f_name').val());
            $('#sf_name_bn').text($('#f_name_bn').val());
            $('#sf_mobile').text($('#f_mobile').val());
            $('#sf_email').text($('#f_email').val());
            $('#sf_dob').text($('#f_dob').val());
            $('#sf_occupation').text($('#f_occupation').val());
            $('#sf_nid').text($('#f_nid').val());
            $('#sf_birth_certificate').text($('#f_birth_certificate').val());

            $('#sm_name').text($('#m_name').val());
            $('#sm_name_bn').text($('#m_name_bn').val());
            $('#sm_mobile').text($('#m_mobile').val());
            $('#sm_email').text($('#m_email').val());
            $('#sm_dob').text($('#m_dob').val());
            $('#sm_occupation').text($('#m_occupation').val());
            $('#sm_nid').text($('#m_nid').val());
            $('#sm_birth_certificate').text($('#m_birth_certificate').val());

            $('#sg_name').text($('#g_name').val());
            $('#sg_name_bn').text($('#g_name_bn').val());
            $('#sg_mobile').text($('#g_mobile').val());
            $('#sg_email').text($('#g_email').val());
            $('#sg_dob').text($('#g_dob').val());
            $('#sg_occupation').text($('#g_occupation').val());
            $('#sg_nid').text($('#g_nid').val());
            $('#sg_birth_certificate').text($('#g_birth_certificate').val());

        }














    </script>
@endsection