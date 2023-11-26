@extends('hrm::layouts.master')

@section('title', 'Settings | Ex Students')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Edit Student') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Student') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Student') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Session Message Start -->
    <section class="content">
        <div class="container-fluid">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
        </div>
    </section>
    <!-- Session Message End -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Define Combined Subject') }}</h5>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            {!!  Form::model($student,['route'=>['exStudents.update',$student->id], 'method'=>'patch', 'enctype'=>'multipart/form-data']) !!}
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="example-text-input" class=" col-form-label "><strong>{{ __('শিক্ষার্থীর নামঃ
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('student_name',null,['class'=>'form-control','placeholder' => 'Enter Student Name Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="father" class=" col-form-label "><strong>{{ __('পিতার নামঃ
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('father',null,['class'=>'form-control','placeholder' => 'Enter Father Name Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="mother" class=" col-form-label "><strong>{{ __('মাতার নাম
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('mother',null,['class'=>'form-control','placeholder' => 'Enter Mother Name Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="email" class=" col-form-label "><strong>{{ __('ই-মেইলঃ')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('email',null,['class'=>'form-control','placeholder' => 'Enter Email Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="present_address" class=" col-form-label "><strong>{{ __('বর্তমান ঠিকানাঃ
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('present_address',null,['class'=>'form-control','placeholder' => 'Enter Present Address Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="permanent_address" class=" col-form-label "><strong>{{ __('স্থায়ী ঠিকানাঃ
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('permanent_address',null,['class'=>'form-control','placeholder' => 'Enter Permanent Address Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="passing_year" class=" col-form-label "><strong>{{ __('দাখিল পাসের সাল
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('passing_year',null,['class'=>'form-control','placeholder' => 'Enter Year of Passing']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="mobile"><strong>{{ __('মোবাইল নাম্বারঃ
                                        *')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('mobile',null,['class'=>'form-control','placeholder' => 'Enter Mobile Number Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="blood_group" class=" col-form-label "><strong>{{ __('রক্তের গ্রুপঃ')}}</strong></label>
                                    <select name="blood_group" class="form-control">
                                        <option value="">{{ __('Select Blood Group') }}</option>
                                        @foreach ($BloodGroups as $BloodGroup)
                                            <option value="{{ $BloodGroup->id }}"
                                                @isset($student->blood_group)
                                                    {{ $BloodGroup->id == $student->blood_group ? 'selected' : '' }}
                                                @endisset>
                                                {{ $BloodGroup->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row form-group col-12">
                                    <label for="profession" class=" col-form-label "><strong>{{ __('পেশাঃ (প্রযোজ্য ক্ষেত্রে) ')}}</strong></label>
                                    <div class="input-group">
                                        {{ Form::text('profession',null,['class'=>'form-control','placeholder' => 'Enter Profession Here']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ">
                                    <label for="inputEmail4"><strong>{{ __('শিক্ষার্থীর ছবি *') }}</strong></label>
                                    <div class="form-group slim" data-ratio="3:3" data-instant-edit="true">
                                        {{ Form::file('image',null,['class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group col-12" style="padding-top: 30px">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('SUBMIT') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop
<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });
    </script>
@stop
