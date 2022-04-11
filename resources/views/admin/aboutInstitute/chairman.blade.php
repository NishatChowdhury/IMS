@extends('layouts.fixed')

@section('title','Settings | Chairman Message')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chairman Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Chairman Message</li>
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
                                <h5>Chairman Message</h5>
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
                            <form action="{{route('instituteMessageUpadte')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" value="{{$message->alias}}" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{$message->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Chairman Message</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4">{{$message->body}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Chairman Image</label>
                                    <input name="image" class="form-control" class="btn btn-outline-success" type="file" id="formFile">
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
                                <p>{{$message->title}}</p>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="margin-top: 10px"  height="200px"  width="160px" src="{{asset('uploads/message/'.$message->image)}}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h2>
                                        <small class="text-primary d-block">
                                            Chairman
                                        </small>
                                        Message
                                    </h2>

                                    <span aria-hidden="true">{!!  Str::limit($message->body, 1000) !!}</span>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" > More..</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{--read more--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($message->alias == 'chairman')
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h5>Principal Message</h5>
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/'.$message->image)}}" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h2>
                                            <small class="text-primary d-block">
                                                Principal
                                            </small>
                                            Message
                                        </h2>
                                        <p>{{$message->title}}</p>
                                        <span aria-hidden="true">{!! $message->body !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{--read more--}}

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
