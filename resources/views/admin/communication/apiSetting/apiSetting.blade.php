@extends('layouts.fixed')

@section('title','Add API')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Api</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Api</li>
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
                    {{--                    <div class="card card-light">--}}
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::model($apiData = \App\CommunicationSetting::all(),['route'=>'apiSetting.store','method'=>'post','enctype'=>'multipart/form-data']) }}
                                    @include('admin.communication.apiSetting.form-api-setting')
                                    {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success ']) !!}
                                    {{ Form::close() }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#SL</th>
                                    <th class="text-center">Api Key</th>
                                    <th class="text-center">Sender Id</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $i = 1; @endphp
                                @foreach($apiData as $data)
                                    <tr>
                                        <td class="text-center"> {{ $i++ }}</td>
                                        <td class="text-center"> {{ $data->api_key }} </td>
                                        <td class="text-center"> {{ $data->sender_id }} </td>
                                        <td class="text-center">
                                            {{ Form::open(['route'=>['apiSetting.delete',$data->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                            <a href="{{ action('apiSettingController@edit',$data->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fas fa-trash"></i>
                                            </button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            {{--                </div>--}}
            <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop