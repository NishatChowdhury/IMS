{{--@extends('resources.views.layouts.fixed')--}}
@extends('settings::layouts.master')
@section('title','Page | Create')

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
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('General Form') }}</li>
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
                            <h3 class="card-title">{{ __('Create Page') }}</h3>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open(['route'=>'page.store','method'=>'post','files'=>true]) }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Page Name*') }}</label>
{{--                                {{ Form::select('id',$pages,null,['class'=>'form-control','readonly']) }}--}}
                                {{ Form::text('name',null,['class'=>'form-control']) }}

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Content') }}*</label>
{{--                                <textarea name="content" id="txtEditor">{{ $page->content }}</textarea>--}}
                                <span class="col-md-12"></span>
{{--                                {{ Form::textarea('content',null,['id'=>'editor1','class'=>'form-control']) }}--}}
                                <textarea id="summernote" name="pageContent"></textarea>


{{--                                <textarea name="content" id="formsummernote" cols="30" rows="10"></textarea>--}}
{{--                                {{ Form::textarea('content',null,['id'=>'formsummernote','cols'=>30,'rows'=>10]) }}--}}

                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label for="" class="col-form-label" style="font-weight: 500; text-align: right">Order*</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    --}}{{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
{{--                                    {{ Form::text('order',null,['class'=>'form-control']) }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Image*</label>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    <div class="form-group files color">--}}
{{--                                        <input type="file" name="image" class="form-control" multiple="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> {{ __('Add') }}</button>
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
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('plugin')
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@stop

@section('script')

    <script>
        // $('#formsummernote').summernote({
        //     placeholder: '',
        //     tabsize: 2,
        //     //tooltip: false,
        //     height: 500,
        // });
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
@stop
