@extends('layouts.fixed')

@section('title','Library Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Library Management')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Books')}}</li>
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
                            <h3 class="card-title">{{ __('Add A New Book')}}</h3>
                            <a href="{{ route('newBook.add') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i>
                                {{ __('Add New Book')}}</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>#{{ __('SL')}}</th>
                                <th>{{ __('Title')}}</th>
                                <th>{{ __('Author')}}</th>
                                <th>{{ __('Description')}}</th>
                                <th>{{ __('Category')}}</th>
                                <th>{{ __('No. Of Issues')}}</th>
                                <th>{{ __('Shelve No')}}.</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allData as $key => $value)
                                <tr class="{{$value->id}}">
                                    <td>{{  $key+1 }}</td>
                                    <td>{{  $value->book_title }}</td>
                                    <td>{{  $value->author_name }}</td>
                                    <td>{{  $value->description }}</td>
                                    <td>{{  $value->category->book_category }}</td>
                                    <td>{{  $value->no_of_issue }}</td>
                                    <td>{{  $value->shelve }}</td>
                                    <td class="text-center">
                                        {{ Form::open(['route'=>['newBook.delete',$value->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('Backend\BookController@edit',$value->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop

