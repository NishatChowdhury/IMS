@extends('settings::layouts.master')

@section('title','Settings | Principal Message')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Principal Message') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Principal Message') }}</li>
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
                                <h5>{{ __('Principal Message') }}</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($errors->any())
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-body">
                                {{ Form::open(['route'=>'instituteMessageUpdate','method'=>'patch','files'=>true]) }}
                                <input type="hidden" value="{{$message->alias ?? 'principal'}}" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{$message->title ?? ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{ __('Principal Message') }}</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4">{{$message->body ?? ''}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">{{ __('Principal Image') }}</label>
                                    <br>
                                    <input name="image"  class="btn btn-outline-success" type="file" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value=" Save ">
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <img   height="200px"  width="180px" src="{{asset('uploads/message/')}}/{{ $message->image ?? '' }}" alt="">
                                </div>
                                <div class="col-md-7 ml-4">
                                    <h2>
                                        {{$message->title ?? ''}}
                                    </h2>
                                    {!! $message->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@stop

@section('plugin-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@stop

@section('plugin')
    <!-- Select2 -->
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
