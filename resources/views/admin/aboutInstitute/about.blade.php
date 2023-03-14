@extends('layouts.fixed')

@section('title','Settings | About Institute')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('About Institute')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('About Institute')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***Site info Inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>{{ __('About Institute')}}</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        @if($errors->any())
                            <div class="card-body">
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            {{ Form::model($aboutInstitute,['route'=>'instituteMessageUpdate','method'=>'post']) }}
                            {{ Form::hidden('alias','about') }}
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlTitle">{{ __('Title')}}</label>
                                    {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter About Institute']) }}
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{ __('About Institute')}}</label>
                                    {{ Form::textarea('body',null,['id'=>'formsummernote','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">{{ __('Save') }}</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>{{ __('About Institute')}}</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h4>{{ $aboutInstitute->title ?? '' }}</h4>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                    <p>{!! $aboutInstitute->body ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('plugin-css')
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@stop

@section('plugin')
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@stop

@section('script')
    <script>
        $('#formsummernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 500,
        });
    </script>
@stop
