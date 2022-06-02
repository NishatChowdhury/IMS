@extends('layouts.fixed')

@section('title','Dairy List')

@section('content')
    @section('style')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endsection
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dairy List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Dairy List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('diary.index') }}" class="btn btn-sm btn-dark">Go Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @php
                            $data =  session('data');
                        @endphp
                        <form action="{{ $data ? route('diary.update', $data['id']) : route('diary.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date" value="{{ $data['date'] ?? ''  }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="academic_class_id" id="" class="form-control">
                                            <option disabled selected>--Select Class--</option>
                                            @foreach($academicClass as $ac)
                                                <option value="{{ $ac->id }}" @isset($data){{ $data['academic_class_id'] == $ac->id ? 'selected' : '' }} @endisset>{{ $ac->classes->name ?? '' }} {{ $ac->section->name ?? '' }} {{ $ac->group->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="subject_id" id="" class="form-control">
                                            <option disabled selected>--Select Subject--</option>
                                            @foreach($subjects as $sb)
                                                <option value="{{ $sb->id }}" @isset($data) {{ $data['subject_id'] == $sb->id ? 'selected' : '' }}  @endisset>{{ $sb->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="teacher_id" id="" class="form-control">
                                            <option disabled selected>--Select Teacher--</option>
                                            @foreach($teachers as $t)
                                                <option value="{{ $t->id }}" @isset($data) {{ $data['teacher_id'] == $t->id ? 'selected' : '' }}  @endisset>{{ $t->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea name="description" id="summernote">
                                                @isset($data) {{ $data['description'] ?? ''}} @endisset
                                            </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-primary">Save Dairy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
