@extends('settings::layouts.master')

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
                <div class="col-md-10 offset-1">
                    <!-- general form elements -->
                    <div class="card ">
                        <div class="card-header">
                            {{ __('Database Backup')}}
                            <a href="{{ route('backup.create') }}" class="float-right btn btn-warning btn-sm"><i
                                        class="fa fa-plus-circle"></i> {{ __('Create Backup')}}</a>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Create_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse( $backups as $key=>$backup)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $backup['file_name'] ?? "n/a" }}</td>
                                        <td>{{ $backup['file_size'] ?? "n/a" }}</td>
                                        <td>{{ $backup['created_at'] ?? "n/a" }}</td>
                                        <td>
                                            <a href="{{ $backup['download_link'] }}" @click="Alert"><i
                                                        class="fa fa-download" aria-hidden="true"></i></a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-danger text-center">
                                                <strong>Sorry!! No data found.</strong>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
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
