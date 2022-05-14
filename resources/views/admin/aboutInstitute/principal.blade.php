@extends('layouts.fixed')

@section('title','Settings | Principal Message')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Principal Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Principal Message</li>
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
                            <form action="{{route('instituteMessageUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$message->alias ?? 'principal'}}" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{$message->title ?? ''}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Principal Message</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4">{{$message->body ?? ''}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Chairman Image</label>
                                    <br>
                                    <input name="image"  class="btn btn-outline-success" type="file" id="formFile">
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
        </div>
    </section>
{{--    --}}{{--read more--}}
{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <div class="row">--}}
{{--                                    <h5>Principal Message</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-header -->--}}
{{--                            <div class="card-body">--}}
{{--                                @if($errors->any())--}}
{{--                                    <ul class="text-danger">--}}
{{--                                        @foreach($errors->all() as $error)--}}
{{--                                            <li>{{ $error }}</li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <img style="margin-top: 10px"  height="200px"  width="200px" src="{{asset('uploads/message/')}}/{{ $message->image ?? '' }}" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <h2>--}}
{{--                                            <small class="text-primary d-block">--}}
{{--                                                Principal--}}
{{--                                            </small>--}}
{{--                                            Message--}}
{{--                                        </h2>--}}
{{--                                        <p>{{$message->title ?? ''}}</p>--}}
{{--                                        <span aria-hidden="true">{!! $message->body ?? '' !!}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                </div>--}}
{{--                <div class="modal-footer"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{--read more--}}
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
    {{--    <script>--}}
    {{--        //Initialize Select2 Elements--}}
    {{--        $('.select2').select2();--}}
    {{--    </script>--}}
    {{--    <script>--}}
    {{--        ClassicEditor--}}
    {{--            .create( document.querySelector( '#editor1' ),{--}}
    {{--                toolbar: [ 'heading', '|', 'bold', 'italic', 'underline', 'link', 'bulletedList', 'numberedList', 'blockQuote','|','imageUpload','insertTable'],--}}
    {{--                heading: {--}}
    {{--                    options: [--}}
    {{--                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },--}}
    {{--                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },--}}
    {{--                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },--}}
    {{--                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }--}}
    {{--                    ]--}}
    {{--                },--}}
    {{--                image: {--}}
    {{--                    toolbar: [ 'imageTextAlternative' ]--}}
    {{--                }--}}
    {{--            })--}}
    {{--            .then( editor => {--}}
    {{--                console.log( editor );--}}
    {{--            } )--}}
    {{--            .catch( error => {--}}
    {{--                console.error( error );--}}
    {{--            } );--}}
    {{--    </script>--}}

    <script>
        /**
         *  Document   : summernote-init.js
         *  Author     : redstar
         *  Description: script for set summernote properties
         *
         **/
        // $('#summernote').summernote({
        //     placeholder: '',
        //     tabsize: 2,
        //     tooltip: false,
        //     height: 150
        // });
        // $('#formsummernote').summernote({
        //     placeholder: '',
        //     tabsize: 2,
        //     tooltip: false,
        //     height: 500
        // });
        $('#formsummernote').summernote({
            placeholder: '',
            tabsize: 2,
            //tooltip: false,
            height: 500,
        });
    </script>
@stop
