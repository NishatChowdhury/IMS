{ __{('')}}@extends('examandresult::layouts.master')

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
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam Mgmt')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Examination Results')}}</li>
                    </ol>
                    {
                    {
                 __('/div')
                }
                }
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['route'=>'exam.getfinalresultrule','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">{{ __('Session')}}</label>
                                    <div class="input-group">
                                        {{ Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session']) }}
                                    </div>
                                </div>
                                {{--<div class="col">--}}
                                    {{--<label for="">Exam Name</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--{{ Form::select('exam_id',$repository->exams(),null,['class'=>'form-control','placeholder'=>'Exam Name']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Class')}}</label>
                                    <div class="input-group">
                                        {{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Section')}}</label>
                                    <div class="input-group">
                                        {{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Group')}}</label>
                                    <div class="input-group">
                                        {{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">

                                    <div style="float: right;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addexam" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Details Pdf')}} </button>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addexam" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Notify')}}</button>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addexam" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('Summery Pdf')}}</button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addexam" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('CSV')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Name')}}</th>
                                    <th>{{ __('ID')}}</th>
                                    <th>{{ __('Class')}}</th>
                                    <th>{{ __('Current Rank')}}</th>
                                    <th>{{ __('Grade')}}</th>
                                    <th>{{ __('Grade Point')}}</th>
                                    <th>{{ __('Result Rank')}}</th>
                                    <th>{{ __('Total Marks')}}</th>
                                    <th>{{ __('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{ $result->student->name ?? '' }}</td>
                                        <td>{{ $result->student->studentId ?? '' }}</td>
                                        <td>{{ $result->academicClass->name ?? '' }} {{ $result->student->section->name ?? '' }}{{ $result->student->group->name ?? '' }}</td>
                                        <td>{{ $result->student->rank ?? '' }}</td>
                                        <td>{{ $result->grade }}</td>
                                        <td>{{ $result->gpa < 1 ? 0 : $result->gpa }}</td>
                                        <td>{{ $result->rank }}</td>
                                        <td>{{ number_format($result->total_mark,2) }}</td>
                                        <td><a href="{{route('exam.finalResultDetails',$result->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-folder"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">{{ __('First')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Previous')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Next')}}</a></li>
                                            <li class="page-item"><a class="page-link" href="#">{{ __('Last')}}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
