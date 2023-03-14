@extends('hrm::layouts.master')

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
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;  ">
                                            <div class="  " style="   background: linear-gradient(#3C3CB9, #3C3CB9 45%, #3C3CB9 45%,  #3C3CB9 100%);    height: 1.9in;">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="left ">
                                                            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                                                style=" height: 54px;  width: 73px;  text-align: center; margin: 5px;   border-radius: 6px;"
                                                                class="text-center  mx-auto d-block ">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="right text-center">
                                                            <div class="scl-cd-dec text-wrap text-bold ">
                                                                <h2
                                                                    style="position: relative;top: 10px; margin: 1px;text-align: center;  font-size: 17px;  color: #fff; font-weight: bold;     font-family: sans-serif;">
                                                                    <strong>{{ siteConfig('name') }}</strong>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" style="    width: 90px;  height: 90px;   position: relative; left: 1px; top: 15px;" class="text-center rounded mx-auto d-block border border-dark">
                                            </div>
                                            <div style=" text-align: center; font-size: 18px; font-weight: bold; position: relative; top: 28px;">
                                               <p>{{ __('Student Identity Card') }}</p>
                                                 </div>
                                            <div class="card-body text-center">

                                            <div  style=" text-align: center; margin-top: 13px; font-size: 18px; font-weight: bold;  color: white;  background-color: #3C3CB9;   height: 34px;  width: 2.487in; margin-left: -10px; padding: 2px;">
                                                <p class="p-0 nName">{{ __('Student Name') }}</p>
                                            </div>
                                                <div class="row">
                                                    <div class="right col-12" style="float:left; margin-top: 3px;">
                                                        <div class="stu-cd-dec" style="text-align: left">
                                                            <table class="table" style="font-size: 12px;">
                                                            <tbody>
                                                                <tr class="tname" style="display: block;">
                                                                    <td><strong> {{ __('Name') }} </strong></td>
                                                                    <td>:</td>
                                                                    <td><strong> {{ __('Student') }} </strong></td>
                                                                </tr>
                                                                <tr class="tfname" style="display: block;">
                                                                    <td><b>{{ __('Father') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td><strong> {{ __('Father') }} </strong></td>
                                                                </tr>
                                                                <tr class="tmname" style="display: block;">
                                                                    <td> <b>{{ __('Mother') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td><strong> {{ __('Mother') }} </strong></td>
                                                                </tr>
                                                                <tr class="tcname" style="display: block;">
                                                                    <td> <b>{{ __('Class') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td> {{ __('Class') }} </td>
                                                                </tr>
                                                                <tr class="tsname">
                                                                    <td><b>{{ __('Section') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Section') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="trname" style="display: block;">
                                                                    <td><b>{{ __('Roll') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Roll') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="tgname">
                                                                    <td><b>{{ __('Group') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Group') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="tbname">
                                                                    <td><b>{{ __('Blood Group') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Blood') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="tpname" style="display: block;">
                                                                    <td><b>{{ __('Contact') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Contact') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="tdname">
                                                                    <td><b>{{ __('Depertmant') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Department') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="tdobname">
                                                                    <td><b>{{ __('Date Of Birth') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('DOB') }}
                                                                    </td>
                                                                </tr>
                                                                <tr class="taname">
                                                                    <td><b>{{ __('Admission Date') }}</b>
                                                                    </td>
                                                                    <td>:</td>
                                                                    <td>{{ __('Date') }}
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="sinn">
                                                <img src="{{asset('assets/img/signature/jalalabadSignature.png')}}"  alt="" style="height: 26px;  width: 55px; position: relative;  left: 162px;   top: 72px;">
                                                 <hr style="position: relative; top: 40px; width: 97px;  left: 142px;">
                                                <h5 id="idsignature" style=" position: relative; top: 22px; left: 159px; font-size: 15px;">{{ __('Signature') }} </h5>
                                            </p>
                                           
                                        </div>
                                    </div>
                                    <div class="col-12" style="padding-top: 50px;">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;">
                                            <div class="card-body text-center">
                                            <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" 
                                                    width="60" style="  height: 71px;  width: 94px;  text-align: center;  margin: 10px;   border-radius: 6px;">

                        
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-back-dec text-bold"
                                                            style="text-align: left; margin-top: -16px;font-size: 12px">
                                                            <h2 style="    text-align: center;   position: relative;  top: 23px;   font-size: 20px;  font-weight: bold;">{{ __('If Found Please Return The Card To') }}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="row">
                                                    <div class="" style="margin-top: 25px;">
                                                        <p style="margin-bottom: 7px;"><strong>{{ siteConfig('name') }} <br> </strong>
                                                            <p style=" margin-bottom: 5px;">
                                                                {{ siteConfig('address') }}
                                                            </p>
                                                        </p>
                                                    </div>
                                                    <div class="crd-add-dec text-bold"
                                                        style="    text-align: center;   position: relative; left: 58px;top: -6px;">
                                                        <table class="table" style="font-size: 12px;">
                                                            <tbody>
                                                                <tr>
                                                                    <td> {{ __('Phone') }} </td>
                                                                    <td>:</td>
                                                                    <td id="bphone">
                                                                        {{ __('01892-962257') }} 
                                                                        <br>
                                                                        {{ __('01878-895646') }}  
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{ Form::open(['route' => 'student.pdf_V4', 'method' => 'post']) }}

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
                                                <input id="idSignature" name="signature" type="text"
                                                    class="form-control" placeholder="signature">
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

            .item2 span{
            top: 3px;
            position: relative;
            color: #fff;

        }


        .logoo3 {
            position: absolute;
            height: 35px;
            width: 140px;
            bottom: 20px;
            left: -35px;

        }

        .logoo3 img {
            height: 100%;
            width: 50%;
            color: white;
            border-radius: 10px;
            background-position-x: bottom;
        }
    </style>
@stop

@section('script')
    <script>
        $(function() {
            $(".nName").css({
                "display": "none"
            }); // for nick name
            $(".tname").css({
                "display": "block"
            }); // for name
            $(".tfname").css({
                "display": "none"
            }); // for farther name
            $(".tmname").css({
                "display": "none"
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
                    "display": "block"
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