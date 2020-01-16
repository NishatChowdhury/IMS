@extends('layouts.fixed')

@section('title','Employee | Design Employee ID')

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
                    <div class="card" style="padding: 10px 10px;background-color:#ececec;">
                        {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                        {{--<div style="float: right !important; margin-right: 20px; margin-bottom: 10px;">--}}
                        {{--<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px; ">
                                            <div class="card-header" style="padding: 0.2rem 0.25rem;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="left">
                                                            <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="100%" style="border-radius: 50%;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="right">
                                                            <div class="scl-cd-dec" style="font-size: 8px; padding-top: 6px;">
                                                                <p id="name"><strong>{{ siteConfig('name') }} </strong></p>
                                                                <p id="address">{{ siteConfig('address') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h6  id="idtitle" class="card-title text-bold">  ID CARD </h6>
                                                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="60">
                                                <h6 class="card-title text-bold"> Student Name </h6>
                                                <div class="row">
                                                    <div class="right" style="float:left; margin-top: 10px;">
                                                        <div class="stu-cd-dec" style="text-align: left">
                                                            <table class="table" style="font-size: 12px;">
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
                                                            <p class="card-title" style="text-align: left; font-size: 14px"> <strong>ID : S306319</strong> </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="card-title" style="text-align: right; font-size: 14px"> <strong style="border-top: 1px solid red;">Principal</strong></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer" style="height: 40px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="padding-top: 50px;">
                                        <div class="card" style="width: 2.5in; height: 3.9in; margin-left: 50px;">
                                            <div class="card-body text-center">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-back-dec text-bold" style="text-align: left; margin-top: 10px;font-size: 12px">
                                                            <ul style="margin: 0px !important; padding: 10px 15px !important;">
                                                                <li>This card is valid till <span id="validity">31-Dec-2020</span></li>
                                                                <li>This card is not transferable</li>
                                                                <li>This finder of this card may please drop it to the nearest post office.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="60">
                                                <div class="row">
                                                    <div class="" style="margin-top: 20px;">
                                                        <strong> <p>{{ siteConfig('name') }}  <br> </strong>
                                                        {{ siteConfig('address') }}</p>
                                                    </div>
                                                    <div class="crd-add-dec text-bold" style="margin:5px 10px; text-align: left">
                                                        <table class="table" style="font-size: 10px;">
                                                            <tbody>
                                                            <tr>
                                                                <td> Phone </td>
                                                                <td>:</td>
                                                                <td id="bphone">+880 01714 000 000</td>
                                                            </tr>
                                                            <tr>
                                                                <td> Email </td>
                                                                <td>:</td>
                                                                <td id="bemail">Example99@gmail.com.</td>
                                                            </tr>
                                                            <tr>
                                                                <td> Website </td>
                                                                <td>:</td>
                                                                <td  id="bwebsite">www.example99.org</td>
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
                                {{ Form::open(['action'=>'IdCardController@staffPdf','method'=>'post']) }}

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Option</h5>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Nick Name
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Name
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Father
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Mother
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Class
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Section
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Group
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Blood
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Contact/Phone
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Roll
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Department
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Designation
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Dob
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Joining
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input id="idTitle" type="text" class="form-control"  placeholder="Title..">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" id="inputEmail4" placeholder="signature">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input class="form-control datePicker" placeholder="ex: yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Front Side</h5>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">BG Color</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgcolor" id="bghf" class="form-control my-colorpicker1 colorpicker-element">
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
                                                    <label for="exampleInputEmail1">BG Font Color</label>
                                                    <div class="input-group">
                                                        <input type="text" name="bgfont" id="hffc" class="form-control my-colorpicker1 colorpicker-element">
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
                                                    <label for="exampleInputEmail1">Title Color</label>
                                                    <div class="input-group">
                                                        {{--<input type="text" class="form-control">--}}
                                                        <input type="text" name="titlecolor" id="cbhfc" class="form-control my-colorpicker1 colorpicker-element">
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
                                                    <div class="input-group">
                                                        <input name="name_size" id="nameSize" type="text" class="form-control" placeholder="A. Size ...">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="address_size" id="addressSize" type="text" class="form-control" placeholder="Title Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="title_size" id="titleSize" type="text" class="form-control" placeholder="Body Size..">
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> Back Side</h5>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Phone</label>
                                                    <div class="input-group">
                                                        <input name="bPhone" id="bPhone" type="number" class="form-control">
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
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <div class="input-group">
                                                        <input name="bemail" id="bEmail" type="email" class="form-control">
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
                                                    <label for="exampleInputEmail1">Website</label>
                                                    <div class="input-group">
                                                        <input name="bWebsite" id="bWebsite" type="text" class="form-control">
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
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"> View Cards</h5>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('user',[1=>'Teacher',2=>'Staff'],null,['class'=>'form-control','placeholder'=>'Select User','required']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('class',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class','required']) }}
                                                    </div>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        {{ Form::select('section',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
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

            var nameSize = $("#nameSize").val();
            var addressSize = $("#addressSize").val();
            var titleSize = $("#titleSize").val();

            $(".card-header,.card-footer").css({"background-color":bghf});
            $(".scl-cd-dec").css({"color":hffc});
            $(".card-title").css({"color":cbhfc});

            $("#name").css({"font-size":nameSize+"px"});
            $("#address").css({"font-size":addressSize+"px"});
            $(".card-title").css({"font-size":titleSize+"px"});
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
        $(document).ready(function () {
            //colorPicker
            $('.my-colorpicker1').colorpicker();

            // datePicker
            $('.datePicker').datepicker({
                format: 'yyyy-mm-dd'
            });

            // Print entered text value

            $("#idTitle").on("input", function(){
                // Print entered value in a div box
                $("#idtitle").text($(this).val());
            });

            $("#bPhone").on("input", function(){
                // Print entered value in a div box
                $("#bphone").text($(this).val());
            });

            $("#bEmail").on("input", function(){
                // Print entered value in a div box
                $("#bemail").text($(this).val());
            });

            $("#bWebsite").on("input", function(){
                // Print entered value in a div box
                $("#bwebsite").text($(this).val());
            });


        });

    </script>
@stop


<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

{{--js file--}}
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>{{--
    <script src= "{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>--}}
@stop

