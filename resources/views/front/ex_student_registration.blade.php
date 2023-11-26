@extends('layouts.front-inner')

@section('title','Ex Student Registration Form')

@section('content')

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2>{{ __('Ex Student Registration Form')}}</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('Home')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ ucfirst('Ex Student Registration Form') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-20 border-bottom">
        {{ Form::model($registration,['route'=>'ex_student_registration.store','files'=>true]) }}
                <div class="container">
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
                                    <option value="{{ $BloodGroup->id }}">{{ $BloodGroup->name ?? '' }}</option>
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
                </div>
        {{ Form::close() }}
    </section>
@stop
