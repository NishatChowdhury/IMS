@extends('layouts.fixed')

@section('title','Database Backup')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Student</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Database Backup')}}</li>
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
                        <div class="card-header">
                            {{ __('Database Backup')}}
                        </div>
                        {{-- @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                    <div class="card-body text-center">
                        <div class="downloadBtn">
                            <a href="{{ url('admin/download-database') }}" class="btn btn-dark btn-sm">{{ __('Download
                                Database')}}</a>
                        </div>
                        <table id="example1" class="mt-5 table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ __('No')}}.</th>
                                <th>{{ __('Date')}}</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>20-02-2022</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">{{ __('Download')}}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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

@section('script')

@stop
