@extends('layouts.fixed')

@section('title','Return Books')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Return Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Return Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-light">
                            {!!  Form::open(['action'=>'NewBookController@returnBookStore', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                            <div class="card-body">
                                <h3 style="background-color: #117a8b;color: white;margin-bottom: 10px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;">Return A Book</h3>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            {{ Form::label('book_code', 'Book ID',['class'=>'control-label' ]) }}
                                            {{ Form::select('book_code',$bookCode, null, ['placeholder' => 'Select Book ID','class'=>'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success ']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                    <!-- /.card -->
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop


