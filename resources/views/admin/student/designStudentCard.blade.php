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
                                           <img src="{{asset('assets/img/school.png')}}" alt="">
                                       </div>
                                        <div class="right" style="float:right;">
                                           <div class="scl-cd-dec" style="text-align: right; color: #ffffff;">
                                               <h5>Chittagong Grammar <br> School </h5>
                                               <p>Lorem ipsum dolor sit amet, <br>Lorem ipsum dolor.</p>

                                           </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h3 class="card-title" style="margin-bottom: 10px;"> <strong>ID CARD</strong></h3>
                                        <img style="border: 1px solid darkgray" src="{{asset('assets/img/school.png')}}" alt="">
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
                                                    <p style="text-align: left"><strong>ID : example</strong></p>
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
                            <div class="col-md-2">
                                <div class="form-row">
                                    <div class="col-12">
                                        <label for="">Institution Name </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Institution Name Font Size </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Institution Address </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Institution Address Font Size </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Card Body Holder </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Class </label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Department</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Signatory</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Valid Till</label>
                                        <div class="input-group">
                                            <input class="form-control" placeholder="" name="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div><div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div><div class="col-12">
                                        <div class="checkbox">
                                            <input type="checkbox" class="largerCheckbox"
                                                   name="checkBox2" checked>
                                            <label for="checkbox1">
                                                Show Student Nick Name
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
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
                            <div class="col-md-2">
                                <h5>Header & Footer Background Color</h5>
                                <div class="form-group">
                                    <input type="text" id="bghf" class="form-control my-colorpicker1 colorpicker-element">
                                </div>
                                {{--<div>--}}
                                    {{--<div class="col-12">--}}
                                            {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #ffffff"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio bgcolor"value="#fff" type="radio" name="bgcolor"><span style=""> White</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                            {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #000000"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio  bgcolor" value="#000" type="radio" name="bgcolor"><span style=""> Black</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                        {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                            {{--<ul style="list-style: none; padding: 0px;">--}}
                                                {{--<li> <i class="fas fa-circle" style="color: #2faa20"></i> <span>  </span></li>--}}
                                            {{--</ul>--}}
                                        {{--</label>--}}
                                        {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                            {{--<input class="radio  bgcolor" value="#2faa20" type="radio" name="bgcolor"><span style=""> Green</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-md-2">
                                <h5>Header & Footer Font Color</h5>
                                <div class="form-group">
                                    <input type="text" id="hffc" class="form-control my-colorpicker1 colorpicker-element">
                                </div>
                                {{--<div>--}}
                                    {{--<div class="col-12">--}}
                                        {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                            {{--<ul style="list-style: none; padding: 0px;">--}}
                                                {{--<li> <i class="fas fa-circle" style="color: #ffffff"></i> <span>  </span></li>--}}
                                            {{--</ul>--}}
                                        {{--</label>--}}
                                        {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                            {{--<input class="radio ffcolor" value= "#ffffff" type="radio" name="ffcolor"><span style=""> White</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                            {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #000000"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio ffcolor" value="#000000" type="radio" name="ffcolor"><span style=""> Black</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                            {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #0d2bff"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio ffcolor" value="#0d2bff" type="radio" name="ffcolor"><span style=""> Blue</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                            <div class="col-md-2">
                                <h5>Card Body Header Font Color</h5>
                                <div class="form-group">
                                    <input type="text" id="cbhfc" class="form-control my-colorpicker1 colorpicker-element">
                                </div>
                                {{--<div>--}}
                                    {{--<div class="col-12">--}}
                                             {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                 {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #2faa20"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio hfcolor" value="#2faa20" type="radio" name="hfcolor"><span style=""> Green</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                            {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                                {{--<ul style="list-style: none; padding: 0px;">--}}
                                                    {{--<li> <i class="fas fa-circle" style="color: #000000"></i> <span>  </span></li>--}}
                                                {{--</ul>--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                                {{--<input class="radio hfcolor" value="#000000" type="radio" name="hfcolor"><span style=""> Black</span>--}}
                                            {{--</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-12">--}}
                                        {{--<label class="radio-inline" style="margin-left: 5px;">--}}
                                            {{--<ul style="list-style: none; padding: 0px;">--}}
                                                {{--<li> <i class="fas fa-circle" style="color: #ffb142"></i> <span>  </span></li>--}}
                                            {{--</ul>--}}
                                        {{--</label>--}}
                                        {{--<label class="radio-inline" style="position: absolute; left: 40px; top: 2px;">--}}
                                            {{--<input class="radio hfcolor" value="#ffb142" type="radio" name="hfcolor"><span style=""> </span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
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
            margin: 10px 0px;
        }
        input.largerCheckbox {
            width: 20px;
            height: 20px;
            background-color: none;
        }
        .checkbox label{
            position: absolute;
            margin-left: 5px;
            margin-top: -2px;
        }
        .radio-inline input{
            width: 15px;
            height: 15px;
            background-color: none;
        }
        label span{
            margin-left: 15px;
            position: absolute;
            top: -2px;
        }
        .table td, .table th {
            padding: 3px;
            vertical-align: top;
            border-top: 0px;
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

