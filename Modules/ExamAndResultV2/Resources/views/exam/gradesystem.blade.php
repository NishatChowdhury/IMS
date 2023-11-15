@extends('examandresultv2::layouts.master')

@section('title', 'Exam Mgmt | Grade System')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Grade System') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam Mgmt') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Grade System') }}</li>
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
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#gradesystem" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            {{ __('New') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('System No') }}</th>
                                        <th>{{ __('Mark From') }}</th>
                                        <th>{{ __('Mark To') }}</th>
                                        <th>{{ __('Point From') }}</th>
                                        <th>{{ __('Point') }} </th>
                                        <th>{{ __('Grade') }}</th>
                                        <th>{{ __('Comments') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gradings as $grade)
                                        <tr>
                                            <td>{{ $grade->system }}</td>
                                            <td>{{ $grade->mark_from }}</td>
                                            <td>{{ $grade->mark_to }}</td>
                                            <td>{{ $grade->point_from }}</td>
                                            <td>{{ $grade->point_to }}</td>
                                            <td>{{ $grade->grade }}</td>
                                            <td>{{ $grade->comment }}</td>
                                            <td>
                                                <a type="button" href="{{ route('exam.delete_grade_v2', $grade->id) }}"
                                                    class="btn btn-danger btn-sm" style="margin-left: 5px;" title="Delete">
                                                    <i class="fas fa-trash "></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for  New Grade System Item button -->
    <div class="modal fade" id="gradesystem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'exam.store_grade_v2', 'method' => 'post']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Grade System Item') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Result
                                                                                                                                                                                                        System') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" name="system" class="form-control" id="system"
                                    placeholder="1 / 2....." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Mark
                                                                                                                                                                                                        From') }}*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" name="mark_from" class="form-control" id="mark_from" placeholder="0"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Mark
                                                                                                                                                                                                        To') }}*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="number" name="mark_to" class="form-control" id="mark_to" aria-describedby=""
                                    placeholder="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Point
                                                                                                                                                                                                        From') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="point_from" class="form-control" id="point_from"
                                    aria-describedby="" placeholder="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Point
                                                                                                                                                                                                        To') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="point_to" class="form-control" id="point_to"
                                    aria-describedby="" placeholder="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Grade') }}*</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="grade" class="form-control" id="grade"
                                    aria-describedby="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">{{ __('Comments') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="comment" class="form-control" id="comment"
                                    aria-describedby="" placeholder="Excellent">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success  btn-sm"> <i
                            class="fas fa-plus-circle"></i>
                        {{ __('Add') }}</button></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for  New Grade System Item button -->
@stop
