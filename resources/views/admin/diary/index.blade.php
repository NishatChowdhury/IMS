@extends('layouts.fixed')

@section('title','Dairy List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Dairy List')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Dairy List')}}</li>
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
                    <div class="card-header">
                        <a href="{{ route('diary.create') }}" class="btn btn-sm btn-primary">{{ __('Create Dairy')}}</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <form action="{{ route('diary.index') }}" method="get">
                        <div class="form-row">
                                @csrf
                                 <div class="col">
                                          <div class="form-group">
                                              <input type="date" class="form-control" name="date">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <select name="academic_class_id" id="" class="form-control">
                                                  <option disabled selected>{{ __('--Select Class--')}}</option>
                                                  @foreach($academicClass as $ac)
                                                  <option value="{{ $ac->id }}">{{ $ac->classes->name ?? '' }} {{ $ac->group->name ?? '' }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                        <div class="col-1">
                                            <button type="submit" class="btn btn-primary bt-sm btn-block">Search</button>
                                        </div>
                                        <div class="col-1">
                                            <a href="{{ route('diary.index') }}" class="btn btn-dark bt-sm btn-block">Reload</a>
                                        </div>
                               </div>
                            </form>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ __('Id')}}</th>
                                <th>{{ __('Date')}}</th>
                                <th>{{ __('Class Name')}}</th>
                                <th>{{ __('Subject')}}</th>
                                <th>{{ __('Teacher')}}</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($diaries as $key => $d)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $d->date }}</td>
                                    <td>{{ $d->academicClass->classes->name ?? 'N\A' }} {{ $d->academicClass->group->name ?? 'N\A' }}</td>
                                    <td>{{ $d->subject->name ?? 'N\A' }}</td>
                                    <td>{{ $d->teacher->name ?? 'N\A' }}</td>
                                    <td>
                                        <a href="{{ route('diary.edit', $d->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

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
