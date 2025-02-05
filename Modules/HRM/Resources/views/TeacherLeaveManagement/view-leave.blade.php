@extends('hrm::layouts.master')

@section('title','Teachers Leave Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Teachers Leave Management') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Teachers Leave Management') }}</li>
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
                <div class="card card-info">
                    <div class="card-header">
                            <h3 class="card-title">{{ __('Manage Teachers Leave') }}</h3>
                            <a href="{{ route('TeacherLeaveManagement.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> {{ __('Add Leave') }}</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ __('Leave ID') }}</th>
                                <th>{{ __('Teacher Name') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Purpose') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leaves as $key => $value)
                                <tr>
                                    <td>{{ $value->first()->leaveId }}</td>
                                    <td>
                                        {{ $value->first()->teacher->name }}<br>
                                    <i class="text-secondary">{{ __('ID:') }} {{ $value->first()->teacher->card_id }}</i>
                                    </td>
                                    <td>{{ $value->first()->date->format('Y-m-d') }} {{ __('to') }} {{ $value->last()->date->format('Y-m-d') }}</td>
                                    <td>{{ $value->count() }}</td>
                                    <td>
                                        {{ $value->first()->purpose->leave_purpose ?? '' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('TeacherLeaveManagement.edit',$value->first()->leaveId) }}" role="button" class="btn btn-dark btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

