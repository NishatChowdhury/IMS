@extends('layouts.fixed')

@section('title','Student | Design Student ID')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Design Student ID</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 10px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="float: right !important; margin-right: 20px; margin-bottom: 10px;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header" style="background-color: #7f24ff;">
                                        <div class="left" style="float: left;">
                                            <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="75" alt="">
                                        </div>
                                        <div class="right" style="float:right;">
                                            <div class="scl-cd-dec" style="text-align: right; color: #ffffff;">
                                                <h5>{{ siteConfig('name') }}</h5>
                                                <p>{{ siteConfig('address') }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h3 class="card-title" style="margin-bottom: 10px;"> <strong>ID CARD</strong></h3>
                                        <img style="border: 1px solid darkgray" src="{{asset('assets/img/students/S20701.jpg')}}" width="75" alt="">
                                        <h4 class="card-title text-bold">Student Name</h4>
                                        <div class="row">
                                            <div class="right" style="float:left; margin-top: 10px;">
                                                <div class="stu-cd-dec" style="text-align: left">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td><strong> Name </strong></td>
                                                            <td>:</td>
                                                            <td><strong> Student Name </strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Guardian </td>
                                                            <td>:</td>
                                                            <td>Lorem ipsum.</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Class </td>
                                                            <td>:</td>
                                                            <td>Lorem ipsum.</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Contact </td>
                                                            <td>:</td>
                                                            <td>Lorem ipsum.</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Blood Group </td>
                                                            <td>:</td>
                                                            <td>Lorem ipsum.</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 10px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p style="text-align: left"><strong>ID : S306319</strong></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p style="text-align: right;"><strong style="border-top: 1px solid red;">Principal</strong></p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="card-footer" style="background-color: #7f24ff; height: 40px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {{ Form::open(['action'=>'IdCardController@pdf','method'=>'post','class'=>'form-inline']) }}
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="nick" checked>
                                                <label for="checkbox1">
                                                    Nick Name
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="name" checked>
                                                <label for="checkbox1">
                                                    Name
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="father" checked>
                                                <label for="checkbox1">
                                                    Father Name
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="mother" checked>
                                                <label for="checkbox1">
                                                    Mother Name
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="class" checked>
                                                <label for="checkbox1">
                                                    Class
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="section" checked>
                                                <label for="checkbox1">
                                                    Section
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="group" checked>
                                                <label for="checkbox1">
                                                    Group
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="blood" checked>
                                                <label for="checkbox1">
                                                    Blood Group
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="contact" checked>
                                                <label for="checkbox1">
                                                    Contact
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="roll" checked>
                                                <label for="checkbox1">
                                                    Roll
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="department" checked>
                                                <label for="checkbox1">
                                                    Department
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="designation" checked>
                                                <label for="checkbox1">
                                                    Designation
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="checkbox">
                                                <input type="checkbox" class="largerCheckbox"
                                                       name="checkBox2" checked>
                                                <label for="checkbox1">
                                                    Show Student Nick Name
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Header & Footer Background Color</h5>
                                            <input type="text" name="bg-color" id="bghf" class="form-control my-colorpicker1 colorpicker-element">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Header & Footer Font Color</h5>
                                            <input type="text" name="bg-font" id="hffc" class="form-control my-colorpicker1 colorpicker-element">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Card Body Header Font Color</h5>
                                            <input type="text" name="card-header" id="cbhfc" class="form-control my-colorpicker1 colorpicker-element">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>User</h5>
                                        <div class="form-group">
                                            {{ Form::select('user',['1'=>'Teacher','2'=>'Student'],null,['class'=>'form-control','placeholder'=>'Select User (required)','required']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Class</h5>
                                        <div class="form-group">
                                            {{ Form::select('class',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class (required)','required']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Section</h5>
                                        <div class="form-group">
                                            {{ Form::select('section',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section (optional)']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Download PDF</button>
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
        .checkbox label{
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }
        .radio-inline input{
            width: 15px;
            height: 15px;
            background-color: transparent;
        }
        label span{
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }
        .table td, .table th {
            padding: 3px;
            vertical-align: top;
            border-top: 0;
        }
        .card-body{
            padding: 5px 10px;
        }

    </style>
@stop

@section('script')
    <script>

        $("body").click(function () {
            var bghf = $("#bghf").val();
            var hffc = $("#hffc").val();
            var cbhfc = $("#cbhfc").val();

            $(".card-header,.card-footer").css({"background-color":bghf});
            $(".scl-cd-dec").css({"color":hffc});
            $(".card-title").css({"color":cbhfc});
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


        $(document).ready(function () {
            $('.my-colorpicker1').colorpicker();
        });
    </script>


@stop


@section('plugin')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>{{--
    <script src= "{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>--}}
@stop

