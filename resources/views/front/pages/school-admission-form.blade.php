@extends('layouts.front-inner')

@section('title','Inner Page')
@section('style')
<style>
    .custom_shadow{
        box-shadow: rgb(100 100 111 / 26%) 0px 7px 29px 0px;
    }
    .cl1{
        background: #0e5a66;
    }
    span.form-header {
    font-size: 21px;
    font-weight: 600;
    /* background: rebeccapurple; */
    color: #fff;
}
.cus_courl h1{
    color: #61c721;
    font-weight: 900;
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
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> Result </a>
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
                    <h4>Online Admission Form</h4>
                    <h1>Class {{ $onlineAdmission->classes->name  }}
                        {{ $onlineAdmission->group_id ? $onlineAdmission->group->name : ''  }}</h1>
                  </div>


                {!!  Form::open(['action'=>'OnlineApplyController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                <div class="col-12">
                    @if (session('status'))
                    <div class="alert border border-success text-success bg-success-0_1 px-4 py-3 alert-dismissible fade show" role="alert">
                        <div class="media align-items-center">
                          <i class="mr-2 ti-check font-size-20"></i>
                          <div class="media-body">
                            <strong> Well done!</strong>  {{ session('status') }}
                          </div>
                        </div>
                        <button type="button" class="close font-size-14 absolute-center-y" data-dismiss="alert" aria-label="Close">
                          <i class="ti-close"></i>
                        </button>
                      </div>
                    @endif
               
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-body  border">
                                <h4 class="mb-3"><b>Personal Info</b></h4>   
                                <div class="row">

                                    <div class="form-group col-6">
                                        {{Form::label('name','Student\'s name',['class'=>'control-label'])}}
                                        {{ Form::text('name', null, ['placeholder' => 'Student\'s  Name...', 'class' => 'form-control' ]) }}
                                        @error('name')
                                            <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{Form::label('name','Student\'s name Bangla',['class'=>'control-label'])}}
                                        {{ Form::text('name_bn', null, ['placeholder' => 'Student\'s  Name Bangla...', 'class' => 'form-control' ]) }}
                                        @error('name_bn')
                                            <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        {{Form::label('name','Student\'s Birth Certificate',['class'=>'control-label'])}}
                                        {{ Form::text('birth_certificate', null, ['placeholder' => 'Student\'s  Birth Certificate...', 'class' => 'form-control' ]) }}
                                        @error('birth_certificate')
                                            <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>                                        
                                    
                                    <div class="form-group col-6">
                                        {{ Form::label('dob','Date of Birth',['class'=>'control-label']) }}
                                        {{ Form::date('dob',null,['class' => 'form-control', 'placeholder'=>'Date of Birth']) }}
                                        @error('dob')
                                            <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-6">
                                        {{ Form::label('gender','Gender',['class'=>'control-label']) }}
                                        {{ Form::select('gender_id', $data['gender'], null, ['class'=>'form-control','placeholder' => 'Select Gender...']) }}
                                        @error('gender_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    {{-- for 2nd section --}}
                                    
                                    <div class="form-group col-6">
                                        {{ Form::label('bloodGroup','Blood Group',['class'=>'control-label']) }}
                                        {{ Form::select('blood_group_id', $data['blood'], null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                        @error('blood_group_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        {{ Form::label('religion_id','Religion',['class'=>'control-label']) }}
                                        {{ Form::select('religion_id', $data['religion'], null, ['placeholder' => 'Select Blood Group...','class'=>'form-control']) }}
                                        @error('religion_id')
                                        <b style="color: red">{{ $message }}</b>
                                        @enderror
                                    </div>
                                  
                                    <div class="col-12">
                                        <div class="form-group files color">
                                            {{ Form::label('stuPic', 'Student Picture', ['class' => 'control-label']) }}
                                            {{ Form::file('pic',['class'=>'form-control', 'id'=>"file-input"]) }}
                                            @error('pic')
                                                    <b style="color: red">{{ $message }}</b>
                                            @enderror
                                            <div id="thumb-output"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-body border">
                                <h4 class="mb-3"><b>Address Info</b></h4>
                                    <div class="row">
                                        <input type="hidden" name="class_id" value="{{ $onlineAdmission->class_id }}">
                                        <input type="hidden" name="group_id" value="{{ $onlineAdmission->group_id }}">
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
                                            {{ Form::textarea('address',null,['class'=>'form-control', 'rows'=>1, 'placeholder'=>'Address']) }}
                                            @error('address')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-12">
                                            {{ Form::label('area','Area / Town',['class'=>'control-label']) }}
                                            {{ Form::text('area',null,['class'=>'form-control', 'placeholder'=>'Area Town']) }}
                                            @error('area')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('postCode','Post / Zip Code',['class'=>'control-label']) }}
                                            {{ Form::text('zip',null,['class'=>'form-control', 'placeholder'=>'Post / Zip Code']) }}
                                            @error('zip')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
        
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('city_id','City',['class'=>'control-label']) }}
                                            {{ Form::select('city_id',$data['city'], null, ['placeholder' => 'Select City','class'=>'form-control']) }}
                                            @error('city_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('country','Country',['class'=>'control-label']) }}
                                            {{ Form::select('country_id', $data['country'], null, ['placeholder' => 'Select Country...','class'=>'form-control']) }}
                                            @error('country_id')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('nationality','Nationality',['class'=>'control-label']) }}
                                            {{ Form::text('nationality',null,['class'=>'form-control', 'placeholder'=>'Nationality']) }}
                                            @error('nationality')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                      
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>Father Info</b></h4>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {{ Form::label('f_name','Father Name',['class'=>'control-label']) }}
                                            {{ Form::text('f_name', !empty($father) ? $father->f_name : null,['class'=>'form-control', 'placeholder'=>'Father Name']) }}
                                            @error('fname')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('f_name_bn','Father Name Bangla',['class'=>'control-label']) }}
                                            {{ Form::text('f_name_bn',!empty($father) ? $father->f_name_bn : null,['class'=>'form-control', 'placeholder'=>'Father Name Bangla']) }}
                                            @error('f_name_bn')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('f_mobile','Father Mobile',['class'=>'control-label']) }}
                                            {{ Form::text('f_mobile',!empty($father) ? $father->f_mobile : null,['class'=>'form-control', 'placeholder'=>'Father Mobile']) }}
                                            @error('f_mobile')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('f_email','Father Email',['class'=>'control-label']) }}
                                            {{ Form::email('f_email',!empty($father) ? $father->f_email : null,['class'=>'form-control', 'placeholder'=>'Father Email']) }}
                                            @error('f_email')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('f_dob','Father Date of Birth',['class'=>'control-label']) }}
                                            {{ Form::date('f_dob',!empty($father) ? $father->f_dob : null,['class' => 'form-control', 'placeholder'=>'Father Date of Birth']) }}
                                            @error('f_dob')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('f_occupation','Father Occupation',['class'=>'control-label']) }}
                                            {{ Form::text('f_occupation',!empty($father) ? $father->f_occupation : null,['class'=>'form-control', 'placeholder'=>'Father Occupation']) }}
                                            @error('f_occupation')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('f_nid','Father NID',['class'=>'control-label']) }}
                                            {{ Form::text('f_nid',!empty($father) ? $father->f_nid : null,['class'=>'form-control', 'placeholder'=>'Father NID']) }}
                                            @error('f_nid')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('f_birth_certificate','Father Birth Certificate',['class'=>'control-label']) }}
                                            {{ Form::text('f_birth_certificate',!empty($father) ? $father->f_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Father Birth Certificate']) }}
                                            @error('f_birth_certificate')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>Mother Info</b></h4>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {{ Form::label('m_name','Mother Name',['class'=>'control-label']) }}
                                            {{ Form::text('m_name',!empty($mother) ? $mother->m_name : null,['class'=>'form-control', 'placeholder'=>'Mother Name']) }}
                                            @error('m_name')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('m_name_bn','Mother Name Bangla',['class'=>'control-label']) }}
                                            {{ Form::text('m_name_bn',!empty($mother) ? $mother->m_name_bn : null,['class'=>'form-control', 'placeholder'=>'Mother Name Bangla']) }}
                                            @error('m_name_bn')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('m_mobile','Mother Mobile',['class'=>'control-label']) }}
                                            {{ Form::text('m_mobile',!empty($mother) ? $mother->m_mobile : null,['class'=>'form-control', 'placeholder'=>'Mother Mobile']) }}
                                            @error('m_mobile')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('m_email','Mother Email',['class'=>'control-label']) }}
                                            {{ Form::email('m_email',!empty($mother) ? $mother->m_email : null,['class'=>'form-control', 'placeholder'=>'Mother Email']) }}
                                            @error('m_email')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('m_dob','Mother Date of Birth',['class'=>'control-label']) }}
                                            {{ Form::date('m_dob',!empty($mother) ? $mother->m_dob : null,['class' => 'form-control', 'placeholder'=>'Mother Date of Birth']) }}
                                            @error('m_dob')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('m_occupation','Mother Occupation',['class'=>'control-label']) }}
                                            {{ Form::text('m_occupation',!empty($mother) ? $mother->m_occupation : null,['class'=>'form-control', 'placeholder'=>'Mother Occupation']) }}
                                            @error('m_occupation')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('m_nid','Mother NID',['class'=>'control-label']) }}
                                            {{ Form::text('m_nid',!empty($mother) ? $mother->m_nid : null,['class'=>'form-control', 'placeholder'=>'Mother NID']) }}
                                            @error('m_nid')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('m_birth_certificate','Mother Birth Certificate',['class'=>'control-label']) }}
                                            {{ Form::text('m_birth_certificate',!empty($mother) ? $mother->m_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Mother Birth Certificate']) }}
                                            @error('m_birth_certificate')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
    
                                    </div>
                            </div>
                        </div>
                        <div class="col-6 mt-5">
                            <div class="card card-body border">
                                <h4 class="mb-4"><b>Guardian Info</b></h4>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            {{ Form::label('g_name','Guardian Name',['class'=>'control-label']) }}
                                            {{ Form::text('g_name',!empty($guardian) ? $guardian->g_name : null,['class'=>'form-control', 'placeholder'=>'Guardian Name']) }}
                                            @error('g_name')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('g_name_bn','Guardian Name Bangla',['class'=>'control-label']) }}
                                            {{ Form::text('g_name_bn',!empty($guardian) ? $guardian->g_name_bn : null,['class'=>'form-control', 'placeholder'=>'Guardian Name Bangla']) }}
                                            @error('g_name_bn')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('g_mobile','Guardian Mobile',['class'=>'control-label']) }}
                                            {{ Form::text('g_mobile',!empty($guardian) ? $guardian->g_mobile : null,['class'=>'form-control', 'placeholder'=>'Guardian Mobile']) }}
                                            @error('g_mobile')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('g_email','Guardian Email',['class'=>'control-label']) }}
                                            {{ Form::email('g_email',!empty($guardian) ? $guardian->g_email : null,['class'=>'form-control', 'placeholder'=>'Guardian Email']) }}
                                            @error('g_email')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('g_dob','Guardian Date of Birth',['class'=>'control-label']) }}
                                            {{ Form::date('g_dob',!empty($guardian) ? $guardian->g_dob : null,['class' => 'form-control', 'placeholder'=>'Guardian Date of Birth']) }}
                                            @error('g_dob')
                                                <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('g_occupation','Guardian Occupation',['class'=>'control-label']) }}
                                            {{ Form::text('g_occupation',!empty($guardian) ? $guardian->g_occupation : null,['class'=>'form-control', 'placeholder'=>'Guardian Occupation']) }}
                                            @error('g_occupation')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-6">
                                            {{ Form::label('g_nid','Guardian NID',['class'=>'control-label']) }}
                                            {{ Form::text('g_nid',!empty($guardian) ? $guardian->g_nid : null,['class'=>'form-control', 'placeholder'=>'Guardian NID']) }}
                                            @error('g_nid')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {{ Form::label('g_birth_certificate','Guardian Birth Certificate',['class'=>'control-label']) }}
                                            {{ Form::text('g_birth_certificate',!empty($guardian) ? $guardian->g_birth_certificate : null,['class'=>'form-control', 'placeholder'=>'Guardian Birth Certificate']) }}
                                            @error('g_birth_certificate')
                                            <b style="color: red">{{ $message }}</b>
                                            @enderror
                                        </div>
                                   </div>
                            </div>
                        </div>
                        <div class="col-6 mt-5">
                            <div class="card card-body border">
                                <h4></h4>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                {{ Form::label('contactMobile','Contact Mobile',['class'=>'control-label']) }}
                                                {{ Form::text('mobile',null,['class'=>'form-control', 'placeholder'=>'Contact Mobile']) }}
                                                @error('mobile')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <div class="form-group">
                                                {{ Form::label('email','E-mail',['class'=>'control-label']) }}
                                                {{ Form::email('email',null,['class'=>'form-control', 'placeholder'=>'email@gmail.com']) }}
                                                @error('email')
                                                <b style="color: red">{{ $message }}</b>
                                                @enderror
                                            </div>
                                        </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('freedom_fighter','Freedom Fighter',['class'=>'control-label']) }}
                                            {{ Form::radio('freedom_fighter', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Yes') }}
                                            {{ Form::radio('freedom_fighter', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','No') }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('disability','Disability',['class'=>'control-label']) }}
                                            {{ Form::radio('disability', 1, true, ['id'=>'active']) }}&nbsp;{{ Form::label('active','Yes') }}
                                            {{ Form::radio('disability', 0, false, ['id'=>'inactive']) }}&nbsp;{{ Form::label('inactive','No') }}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            {!! Form::submit(__('Preview'), ['class' => 'form-control, btn btn-success btn-block']) !!}
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