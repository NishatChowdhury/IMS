@extends('layouts.fixed')

@section('title','Add Purpose')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Purpose of Leave</li>
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
                    <!-- general form elements -->
                    <div class="card card-light">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!-- /.card-header -->
                        <!-- form start -->
                        {!!  Form::open(['action'=>'LeavePurposeController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('leave_purpose', 'Leave Purpose',['class'=>'control-label' ]) }}
                                        {{ Form::text('leave_purpose', null, ['placeholder' => 'Enter Purpose','class'=>'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success ']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}
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


