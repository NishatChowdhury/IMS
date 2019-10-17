@extends('layouts.fixed')

@section('title','Settings | Slider')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Slider page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <h4 class="modal-title" id="exampleModalLabel" style="padding: 20px">Add Slider</h4>
                            <form >
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title*</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id=""  aria-describedby="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description*</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea type="text" class="form-control" rows="5" id=""> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Button Text*</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id=""  aria-describedby="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Redirect URL</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id=""  aria-describedby="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Upload Image*</label>
                                    <div class="col-sm-8">
                                        <div class="form-group files color">
                                            <input type="file" class="form-control" multiple="">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div style="float: right;padding-bottom: 50px">
                                <button type="button" class="btn btn-success" > <i class="fas fa-plus-circle"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
<!-- /Slider page inner Content End***-->
<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop