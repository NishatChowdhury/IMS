@extends('layouts.fixed')

@section('title', 'Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Student') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Students') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action' => 'Backend\StudentController@index', 'role' => 'form', 'method' => 'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">{{ __('Student ID') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId', null, ['class' => 'form-control', 'placeholder' => 'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Name') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Class') }}</label>
                                    <div class="input-group">
                                        <select name="academic_class_id" id="class" class="form-control">
                                            @foreach ($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">
                                                    {{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
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


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header ">
                        @if (request()->academic_class_id)
                            <strong>Class : {{ request()->academic_class_id ?? '' }}</strong> &nbsp; &nbsp; &nbsp;
                            <span> student found : {{ $students->total() ?? '' }}</span>
                        @endif

                        <div class=" float-right">
                            <a href="{{ route('student.add') }}" class="btn btn-success btn-sm"
                                style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="{{ route('csv') }}" target="_blank" class="btn btn-primary btn-sm"><i
                                    class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Student') }}</th>
                                    <th>{{ __('Mobile') }}</th>
                                    <th>{{ __('Father/Mother') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->studentId }}</td>
                                        <td>{{ $student->name }}
                                            @if ($student->status == 2)
                                                <span class="badge badge-danger">Drop Out</span>
                                            @endif
                                        </td>
                                        <td> {{ $student->mobile }}</td>
                                        <td> {{ $student->father ? $student->father->f_name : '' }} ||<br>
                                            {{ $student->mother ? $student->mother->m_name : '' }}


                                        </td>
                                        <td><img src="{{ asset('storage/uploads/students/') }}/{{ $student->image }}"
                                                height="100" alt=""></td>
                                        <td>
                                            <a href="{{ action('Backend\StudentController@studentProfile', $student->id) }}"
                                                role="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ action('Backend\StudentController@edit', $student->id) }}"
                                                role="button" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ action('Backend\StudentController@subjects', $student->id) }}"
                                                role="button" class="btn btn-info btn-sm"><i class="fas fa-book"></i></a>
                                            <a href="{{ action('Backend\StudentController@dropOut', $student->id) }}"
                                                role="button" class="btn btn-danger btn-sm" title="DROPOUT"><i
                                                    class="fas fa-sign-out-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ $students->appends(Request::except('page'))->links() }}
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
