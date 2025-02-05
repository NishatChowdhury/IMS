@extends('layouts.fixed')

@section('title', 'Exam Mgmt | Examination Results')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Examination Results')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Examination')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Set Final Result Rule')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['action'=>'Backend\ResultController@finalResultNew','method'=>'post']) }}
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Exam Name')}}</th>
                                    <th>{{ __('Academic Yea')}}r</th>
                                    <th>{{ __('Start Date')}}</th>
                                    <th>{{ __('End Dat')}}e</th>
                                    <th>{{ __('Status')}}</th>
                                    <th>{{ __('Is Selecte')}}d</th>
                                    <th>{{ __('Percent')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->session->year }}</td>
                                    <td>{{ $exam->start }}</td>
                                    <td>{{ $exam->end }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        {{ Form::text($exam->id,null,['class'=>'form-control']) }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: right; margin-top: 20px;">
                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Save')}} </button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
