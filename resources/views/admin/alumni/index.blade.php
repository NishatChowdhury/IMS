@extends('layouts.fixed')

@section('title','Alumni List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Alumni List')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Alumni List')}}</li>
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
                <div class="card">

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ __('Id')}}</th>
                                <th>{{ __('Applied At')}}</th>
                                <th>{{ __('Applicant')}}</th>
                                <th>{{ __('Mobile')}}</th>
                                <th>{{ __('Email')}}</th>
                                <th>{{ __('Image')}}</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($alumnis as $key => $d)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $d->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->mobile }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $d->image }}" alt=""></td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">

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
