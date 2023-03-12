@extends('layouts.fixed')

@section('title', 'Student | Design Student ID')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Design Student ID') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Student') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Design Student ID') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 10px 10px;background-color:#ececec;">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float: right !important; margin-right: 20px; margin-bottom: 10px;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo"
                                        style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                        {{ __('Add') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card"
                                            style="width: 3.9in; height: 2.5in; margin-left: 50px;background-color: #191970;">
                                            <div
                                                style="border: 1px solid  white; margin: 10px;     padding: 0;  box-sizing: border-box;height: 223px;">
                                                <div class=" " style="">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="nat">
                                                                <!-- <img src="image/bg2.JPG" alt="" style="height: 70px; width: 280px; border-radius: 3px;"> -->
                                                                <h2> {{ siteConfig('name') }}</h2>
                                                                <h3 style="    font-size: 9px;
                                                                font-weight: bold;"> {{ siteConfig('address') }}
                                                                </h3>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="card-body text-center bg-white"
                                                    style=" position: relative ;  padding: 5px 10px;   height: 1.43in;   margin: 3px;">

                                                    <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                                        style="width:70px ; height:70px ;    width: 70px;   position: absolute; left: 265px;"
                                                        class="text-center rounded mx-auto d-block border border-dark">
                                                    <h1 class=" text-bold  "
                                                        style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    -webkit-text-stroke-width: 0.4px; -webkit-text-stroke-color: rgb(20, 19, 19);  color: red;">
                                                        IDENTITY CARD</h1>
                                                    <h1 class=" text-bold "
                                                        style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    color: rgb(12 96 74);">
                                                        Class-Play</h1>
                                                    <h1 class=" text-bold "
                                                        style="position: relative;top: -2px;margin: 2px;text-align: center; font-size:15px ;    color: rgb(12 96 74);">
                                                        KWS/2020/007/07</h1>


                                                    <div class="row bg-image">
                                                        <div class="right col-12" style="float:left; margin-top: -3px;">
                                                            <div class="stu-cd-dec" style="text-align: left">
                                                                <table class="table" style="font-size: 12px;">
                                                                    <tbody>
                                                                        <tr class="tname" style="display: block;">
                                                                            <td><strong> Name </strong></td>
                                                                            <td>:</td>
                                                                            <td><strong> Student Name </strong></td>
                                                                        </tr>
                                                                        <tr class="tfname">
                                                                            <td><b>{{ __('Father') }}</b></td>
                                                                            <td>:</td>
                                                                            <td><strong> Father's Name </strong></td>
                                                                        </tr>
                                                                        <tr class="tmname">
                                                                            <td> <b>{{ __('Mother') }}</b></td>
                                                                            <td>:</td>
                                                                            <td><strong> Mother's Name </strong></td>
                                                                        </tr>
                                                                        <tr class="tcname">
                                                                            <td> <b>{{ __('Class') }}</b></td>
                                                                            <td>:</td>
                                                                            <td> {{ __('Seven') }} </td>
                                                                        </tr>
                                                                        <tr class="tsname">
                                                                            <td><b>{{ __('Section') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="trname">
                                                                            <td><b>{{ __('Roll') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="tgname">
                                                                            <td><b>{{ __('Group') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="tbname">
                                                                            <td><b>{{ __('Blood Group') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="tpname">
                                                                            <td><b>{{ __('Contact') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="tdname">
                                                                            <td><b>{{ __('Depertmant') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="tdobname">
                                                                            <td><b>{{ __('Date Of Birth') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                        <tr class="taname">
                                                                            <td><b>{{ __('Admission Date') }}</b></td>
                                                                            <td>:</td>
                                                                            <td>{{ __('Lorem ipsum.') }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('assets/img/signature/kingsWaySignature.png') }}" alt="" class="img1"
                                                            style="height: 30px;width: 50px;position: absolute;top: 92px; left: 275px;">

                                                    </div>
                                                </div>
                                                <div class="logoo ">
                                                    <img src="{{ asset('assets/img/logos/kingsWayLogo.jpeg') }}"
                                                        style="height: 120%; Width:130%">
                                                </div>
                                                <div class="wrapperr">
                                                    <div style="text-align: left; margin-top: 3px; margin-left:5px">
                                                        {{ __('Cell : 01837215075') }}</div>
                                                    <div> <img
                                                            src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                                            alt=""
                                                            style="    height: 20px;  width: 35px;  border-radius: 50%;   ">
                                                    </div>
                                                    <div style=" margin-top: 3px;">{{ __('Head Mistress') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="padding-top: 50px;">
                                        <div class="card"
                                            style="    height: 2.5in; width: 3.9in;   margin-left: 50px; background-color: #191970;   color: white; ">
                                            <div class="card-body text-center"
                                                style="border: 1px solid white;   margin: 5px 5px -25px 5px;">


                                                <div class="row text-left  "
                                                    style="text-align: left!important; margin-left: -0.6rem;  margin-right: -0.6rem;  border-bottom: 1px solid white;">
                                                    <div class="col-md-3 ">
                                                        <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                                            style="width=70px;height:50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h3 style="padding-top:5px">{{ __('INSTRUCTION') }}</h3>
                                                    </div>
                                                </div>
                                                <div class="crd-add-dec text-bold "
                                                    style="margin: 1px; height: 1.4in;   text-align: center ;   color: black;   background-color: white;     margin-left: -5px;
                                                    margin-right: -5px;
                                                }">

                                                    <p
                                                        style=" text-align: left;  font-size: 15px;    margin-top: 0;  margin-bottom: 0; padding-left:5px">
                                                        {{ __('1. Useable only for education purpose') }}</p>
                                                    <p
                                                        style=" text-align: left;font-size: 15px;    margin-top: 0;  margin-bottom: 0; padding-left:5px">
                                                        {{ __('2. This Card is valid upto') }} <span class="valid-date">{{ __('31-Dec-2020') }}</span> </p>
                                                    <table class="table" style="font-size: 11px; margin-top:3px">
                                                        <tbody>



                                                            <tr>
                                                                <td> </td>
                                                                <td></td>
                                                                <td>
                                                                    <p
                                                                        style="    margin: -3px; margin-left:10px; text-align: left;  font-size: 16px;">
                                                                        {{ __('IF Found Please Return To') }}</p>
                                                                    <p
                                                                        style="   margin:0px; margin-left: 40px;  text-align: left;  font-size: 16px;">
                                                                        {{ siteConfig('name') }}</p>
                                                                </td>
                                                            </tr>

                                                            <tr>

                                                                <td>{{ __('Address') }}</td>
                                                                <td>:</td>
                                                                <td id="baddress">{{ siteConfig('address') }}</td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                            <div class="wrapperrr">
                                                <div> <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" alt=""
                                                        style="height: 30px;  width: 50px;  border-radius: 50%;   "></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{ Form::open(['action' => 'Backend\IdCardController@pdf_V3', 'method' => 'post']) }}

                                <div class="card mb-3">
                                    <div class="card-header1">
                                        <b>{{ __('Option') }}</b>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input nname" type="checkbox" id="nickname"
                                                        name="nickname">
                                                    <label class="form-check-label" for="nickname">
                                                        {{ __('Nick Name') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input full-name" checked type="checkbox"
                                                        id="fullname" name="fullname">
                                                    <label class="form-check-label" for="fullname">
                                                        {{ __('Name') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input fname" type="checkbox" id="fname"
                                                        name="fname">
                                                    <label class="form-check-label" for="fname">
                                                        {{ __('Father') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input mname" type="checkbox" id="mname"
                                                        name="mname">
                                                    <label class="form-check-label" for="mname">
                                                        {{ __('Mother') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input cname" checked type="checkbox"
                                                        id="class" name="class">
                                                    <label class="form-check-label" for="class">
                                                        {{ __('Class') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input sname" checked type="checkbox"
                                                        id="section" name="section">
                                                    <label class="form-check-label" for="section">
                                                        {{ __('Section') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input gname" checked type="checkbox"
                                                        id="group" name="group">
                                                    <label class="form-check-label" for="group">
                                                        {{ __('Group') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input bname" checked type="checkbox"
                                                        id="blood" name="blood">
                                                    <label class="form-check-label" for="blood">
                                                        {{ __('Blood') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input pname" type="checkbox" id="contact"
                                                        name="contact">
                                                    <label class="form-check-label" for="contact">
                                                        {{ __('Contact/Phone') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input rname" checked type="checkbox"
                                                        id="roll" name="roll">
                                                    <label class="form-check-label" for="roll">
                                                        {{ __('Roll') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input dname" type="checkbox" id="department"
                                                        name="department">
                                                    <label class="form-check-label" for="department">
                                                        {{ __('Department') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input dobname" type="checkbox"
                                                        id="dob" name="dob">
                                                    <label class="form-check-label" for="dob">
                                                        {{ __('Date Of Birth') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input aname" type="checkbox"
                                                        id="admissiondate" name="admissiondate">
                                                    <label class="form-check-label" for="admissiondate">
                                                        {{ __('Admission Date') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input id="idTitle" name="title" type="text" class="form-control"
                                                    placeholder="Title..">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input id="idSignature" name="signature" type="text"
                                                    class="form-control" placeholder="signature">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input id="vtd" name="validity"
                                                            class="form-control datePicker" placeholder="ex: yyyy-mm-dd">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header1">
                                        <b>{{ __('Front Side') }}</b>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('BG Color') }}</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgcolor" id="bghf"
                                                            class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-palette"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('BG Font Color') }}</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgfont" id="hffc"
                                                            class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-palette"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Title Color') }}</label>
                                                    <div class="input-group">
                                                        {{-- <input type="text" class="form-control"> --}}
                                                        <input type="text" name="titlecolor" id="cbhfc"
                                                            class="form-control my-colorpicker1 colorpicker-element">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-palette"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="name_size" type="text"
                                                            class="form-control name-size"
                                                            placeholder="Institute Name Font Size ...">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="address_size" type="text"
                                                            class="form-control add-size"
                                                            placeholder="Institute Address Font Size ...">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="title_size" type="text"
                                                            class="form-control title-size" placeholder="Title Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="body_size" type="text"
                                                            class="form-control body-size" placeholder="Body Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header1">
                                        <b>{{ __('Back Side') }}</b>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Phone') }}</label>
                                                    <div class="input-group">
                                                        <input name="bPhone" id="bPhone" type="number"
                                                            class="form-control">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <input type="checkbox">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Email') }}</label>
                                                    <div class="input-group">
                                                        <input name="bemail" id="bEmail" type="email"
                                                            class="form-control">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <input type="checkbox">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Website') }}</label>
                                                    <div class="input-group">
                                                        <input name="bWebsite" id="bWebsite" type="text"
                                                            class="form-control">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <input type="checkbox">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header1">
                                        <b>{{ __('View Cards') }}</b>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('class', $repository->classes(), null, ['class' => 'form-control', 'placeholder' => 'Select Class', 'required']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('section', $repository->sections(), null, ['class' => 'form-control', 'placeholder' => 'Select Section']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('group', $repository->groups(), null, ['class' => 'form-control', 'placeholder' => 'Select Section']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">PDF</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        .checkbox {
            padding: 10px;
            margin: 10px 0;
        }

        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: transparent;
        }

        .checkbox label {
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }

        .radio-inline input {
            width: 15px;
            height: 15px;
            background-color: transparent;
        }

        label span {
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }

        .table td,
        .table th {
            padding: 1px;
            vertical-align: top;
            border-top: 0;
        }

        .card-body {
            padding: 5px 10px;
        }

        .scl-cd-dec h6 {
            margin-bottom: 0px !important;
            font-size: 10px;
        }

        .scl-cd-dec p {
            font-size: 8px;
        }

        .card-header1 {
            border-bottom: 1px solid #d8d8d8;
            padding: 9px 0px 9px 20px;
            background: #f7f7f7;
        }



        .grid-container {
            position: relative;
            top: 1px;
            border-radius: 10px;
            display: grid;
            background-color: #fff;

        }

        .grid-container>div {

            text-align: center;
            height: 36px;
        }

        .item1 {

            grid-column: 1/ span 2;
            border-radius: 0px 0px 0px 5px;
            background-color: rgb(13, 94, 13);
            font-size: 11px;
            color: #fff;


        }

        .item2 {
            grid-column: 3/ span 3;
            border-radius: 0px 0px 5px 0px;
            background-color: rgb(194, 41, 41);
            font-size: 15px;

        }

        .item2 span {
            top: 3px;
            position: relative;
            color: #fff;

        }





        .nat {
            position: relative;
            background-color: #191970;
            text-align: center;
            border-bottom: 1px solid white;
        }

        .nat h2 {
            color: red;
            font-weight: 700;
            font-size: 1.9rem;
            -webkit-text-stroke-width: .4px;
            -webkit-text-stroke-color: rgb(234, 231, 231);
        }

        .nat h3 {
            color: rgb(248, 246, 246);
            font-weight: 300;
            font-size: 1.1rem;
        }

        .wrapperr {
            display: grid;
            grid-template-columns: 115px 125px 120px;
            color: #fff;
            text-align: center;
            font-size: 10px;
            background-color: #191970;
            position: relative;
            top: -16px;
            height: 20px;
        }

        .logoo {
            opacity: 0.1;
            position: absolute;
            height: 100px;
            width: 100px;
            margin: 2px;
            top: 88px;
            left: 123px;

            align-items: center;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 200px;

        }

        .wrapperrr {
            position: relative;
            top: -8px;
            display: grid;
            grid-template-columns: 110px 140px;
            color: #fff;
            margin-left: 105px;
            text-align: right;
        }
    </style>
@stop

@section('script')
    <script>
        $(function() {
            $(".nName").css({
                "display": "block"
            }); // for nick name
            $(".tname").css({
                "display": "block"
            }); // for name
            $(".tfname").css({
                "display": "block"
            }); // for farther name
            $(".tmname").css({
                "display": "block"
            }); // for mother name
            $(".tcname").css({
                "display": "block"
            }); // for class name
            $(".tsname").css({
                "display": "block"
            }); // for section name
            $(".trname").css({
                "display": "block"
            }); // for roll name
            $(".tgname").css({
                "display": "block"
            }); // for group name
            $(".tbname").css({
                "display": "block"
            }); // for blood
            $(".tpname").css({
                "display": "none"
            }); // for phone
            $(".tdname").css({
                "display": "none"
            }); // for department
            $(".tdobname").css({
                "display": "none"
            }); // for dob
            $(".taname").css({
                "display": "none"
            }); // for admission
        });
        //nick name
        $(document).on('click', '.nname', function() {
            var nName = $(this);
            if (nName.is(':checked')) {
                $(".nName").css({
                    "display": "block"
                })
            } else {
                $(".nName").css({
                    "display": "none"
                })
            }
        });
        //full name
        $(document).on('click', '.full-name', function() {
            var tname = $(this);
            if (tname.is(':checked')) {
                $(".tname").css({
                    "display": "table-row"
                })
            } else {
                $(".tname").css({
                    "display": "none"
                })
            }
        });
        //father name
        $(document).on('click', '.fname', function() {
            var tfname = $(this);
            if (tfname.is(':checked')) {
                $(".tfname").css({
                    "display": "table-row"
                })
            } else {
                $(".tfname").css({
                    "display": "none"
                })
            }
        });
        //mother name
        $(document).on('click', '.mname', function() {
            var tmname = $(this);
            if (tmname.is(':checked')) {
                $(".tmname").css({
                    "display": "table-row"
                })
            } else {
                $(".tmname").css({
                    "display": "none"
                })
            }
        });
        //class name
        $(document).on('click', '.cname', function() {
            var tcname = $(this);
            if (tcname.is(':checked')) {
                $(".tcname").css({
                    "display": "table-row"
                })
            } else {
                $(".tcname").css({
                    "display": "none"
                })
            }
        });
        //section name
        $(document).on('click', '.sname', function() {
            var tsname = $(this);
            if (tsname.is(':checked')) {
                $(".tsname").css({
                    "display": "table-row"
                })
            } else {
                $(".tsname").css({
                    "display": "none"
                })
            }
        });
        //roll name
        $(document).on('click', '.rname', function() {
            var trname = $(this);
            if (trname.is(':checked')) {
                $(".trname").css({
                    "display": "table-row"
                })
            } else {
                $(".trname").css({
                    "display": "none"
                })
            }
        });
        //group name
        $(document).on('click', '.gname', function() {
            var tgname = $(this);
            if (tgname.is(':checked')) {
                $(".tgname").css({
                    "display": "inline"
                })
            } else {
                $(".tgname").css({
                    "display": "none"
                })
            }
        });
        //blood name
        $(document).on('click', '.bname', function() {
            var tbname = $(this);
            if (tbname.is(':checked')) {
                $(".tbname").css({
                    "display": "table-row"
                })
            } else {
                $(".tbname").css({
                    "display": "none"
                })
            }
        });
        //phone name
        $(document).on('click', '.pname', function() {
            var tpname = $(this);
            if (tpname.is(':checked')) {
                $(".tpname").css({
                    "display": "table-row"
                })
            } else {
                $(".tpname").css({
                    "display": "none"
                })
            }
        });
        //dept name
        $(document).on('click', '.dname', function() {
            var tdname = $(this);
            if (tdname.is(':checked')) {
                $(".tdname").css({
                    "display": "table-row"
                })
            } else {
                $(".tdname").css({
                    "display": "none"
                })
            }
        });
        //dop name
        $(document).on('click', '.dobname', function() {
            var tdobname = $(this);
            if (tdobname.is(':checked')) {
                $(".tdobname").css({
                    "display": "table-row"
                })
            } else {
                $(".tdobname").css({
                    "display": "none"
                })
            }
        });
        //admission name
        $(document).on('click', '.aname', function() {
            var taname = $(this);
            if (taname.is(':checked')) {
                $(".taname").css({
                    "display": "table-row"
                })
            } else {
                $(".taname").css({
                    "display": "none"
                })
            }
        });



        $("body").click(function() {
            var bghf = $("#bghf").val();
            var hffc = $("#hffc").val();
            var cbhfc = $("#cbhfc").val();
            var vtd = $("#vtd").val();


            $(".card-header,.card-footer").css({
                "background-color": bghf
            });
            $(".scl-cd-dec").css({
                "color": hffc
            });
            $(".card-title").css({
                "color": cbhfc
            });
            $(".valid-date").text(vtd);

            //institute font size
            var fins = $('.name-size').val();
            $(".scl-cd-name").css({
                "font-size": fins + "px"
            });
            //institute address size
            var fas = $('.add-size').val();
            $(".scl-cd-add").css({
                "font-size": fas + "px"
            });
            //title size
            var ts = $('.title-size').val();
            $(".card-title").css({
                "font-size": ts + "px"
            });
            //body font size
            var bs = $('.body-size').val();
            $(".table").css({
                "font-size": bs + "px"
            });
        });

        //institute font size
        $(document).on('keyup', '.name-size', function() {
            var fas = $(this).val();
            $(".scl-cd-name").css({
                "font-size": fas + "px"
            });
        });
        //institute address size
        $(document).on('keyup', '.add-size', function() {
            var fas = $(this).val();
            $(".scl-cd-add").css({
                "font-size": fas + "px"
            });
        });
        //title size
        $(document).on('keyup', '.title-size', function() {
            var fas = $(this).val();
            $(".card-title").css({
                "font-size": fas + "px"
            });
        });
        //card body size
        $(document).on('keyup', '.body-size', function() {
            var fas = $(this).val();
            $(".table").css({
                "font-size": fas + "px"
            });
        });


        //       $(document).on("click",".ffcolor",function () {
        //           var color = $(this).val();
        //
        //           $(".scl-cd-dec").css({"color":color});
        //       });
        //
        //       $(document).on("click",".hfcolor",function () {
        //           var color = $(this).val();
        //
        //           $(".").css({"background-color":color});
        //       });

        //colorPicker
        $(document).ready(function() {
            //colorPicker
            $('.my-colorpicker1').colorpicker();

            // datePicker
            $('.datePicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            // Print entered text value

            $("#idTitle").on("input", function() {
                // Print entered value in a div box
                $("#idtitle").text($(this).val());
            });

            $("#bPhone").on("input", function() {
                // Print entered value in a div box
                $("#bphone").text($(this).val());
            });

            $("#bEmail").on("input", function() {
                // Print entered value in a div box
                $("#bemail").text($(this).val());
            });

            $("#bWebsite").on("input", function() {
                // Print entered value in a div box
                $("#bwebsite").text($(this).val());
            });

            $("#idSignature").on("input", function() {
                // Print entered value in a div box
                $("#idsignature").text($(this).val());
            });


        });
    </script>
@stop


<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

{{-- js file --}}
@section('plugin')
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js">
    </script>{{--
    <script src= "{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script> --}}
@stop
