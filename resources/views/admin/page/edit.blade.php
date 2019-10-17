@extends('layouts.fixed')

@section('title','Page | Edit')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($page,['action'=>['PageController@update',$page->id],'method'=>'patch','files'=>true]) }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">Page Name*</label>
                                {{ Form::select('id',$pages,null,['class'=>'form-control select2']) }}
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">Content*</label>
{{--                                <textarea name="content" id="txtEditor">{{ $page->content }}</textarea>--}}
                                {{ Form::textarea('content',null,['id'=>'editor1']) }}
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">Order*</label>
                                <div class="input-group">
                                    {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                    {{ Form::text('order',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Image*</label>
                                <div class="col-sm-10">
                                    <div class="form-group files color">
                                        <input type="file" name="image" class="form-control" multiple="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop

@section('plugin-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
@stop

@section('plugin')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script src= "{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
@stop

@section('script')
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        // $(document).ready(function() {
        //     $("#content").Editor();
        // });

        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                });

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: { fa: true }
            })
        })
    </script>
@stop