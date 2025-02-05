@extends('settings::layouts.master')

@section('title','Settings | Chairman Message')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Chairman Message') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Chairman Message') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***Site info Inner Content Start-->
    <section class="content">
        <div class="container-fluid">
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>{{ __('Chairman Message') }}</h5>
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
                            <form action="{{route('instituteMessageUpdate')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('patch')
                                <input type="hidden" value="{{$message->alias ?? 'chairman'}}" name="alias">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{$message->title ?? ''}}">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $message->body ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group slim"
                                             data-label="Chairman Image"
                                             data-ratio="5:4"
                                             data-max-file-size="3"
                                             data-instant-edit="true">
                                            <img src="{{asset('storage/uploads/message/')}}/{{ $message->image }}" alt="">
                                            <input type="file" name="image" class="form-control" multiple="">
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="mb-3">--}}
{{--                                    <label for="formFile" class="form-label">{{ __('Chairman Image')}}</label>--}}
{{--                                    <br>--}}
{{--                                    <input name="image"  class="btn btn-outline-success" type="file" id="formFile">--}}
{{--                                </div>--}}
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value=" Save ">
                                </div>
                            </form>
                        </div>
                    </div>
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <p>{{$message->title ?? ''}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            @if($errors->any())--}}
{{--                                <ul class="text-danger">--}}
{{--                                    @foreach($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <img style="margin-top: 10px" height="200px" width="160px" src="{{asset('storage/uploads/message/')}}/{{ $message->image ?? '' }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <h2>--}}
{{--                                        <small class="text-primary d-block">--}}
{{--                                            {{ __(' Chairman')}}--}}
{{--                                        </small>--}}
{{--                                        {{ __('Message')}}--}}
{{--                                    </h2>--}}

{{--                                    {!! $message->body ?? ''!!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>


@stop

@section('plugin-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@stop

@section('plugin')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    {{--<script src= "{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>--}}
    {{--<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>--}}
    {{--    <script src="{{ asset('plugins/ckeditor5/build/ckeditor.js') }}"></script>--}}
    {{--    <script src="{{ asset('plugins/summernote/summernote.js') }}"></script>--}}
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
