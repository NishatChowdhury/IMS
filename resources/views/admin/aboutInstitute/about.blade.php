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
                            <form method="POST" action="{{route('instituteMessageUpdate')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$aboutInstitute->alias}}" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlTitle">{{ __('Titel')}}</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter About a Title" value="{{$aboutInstitute->title ?? ''}}">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{ __('About Institute')}}</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4">{{$aboutInstitute->body}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value=" Save ">
                                </div>
                            </form>


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
                            @if($errors->any())
                                <ul class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="card-body">
                            <h4> <p>{!! $aboutInstitute->title !!}</p></h4>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">

                                    <p>{!! $aboutInstitute->body !!}</p>
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
