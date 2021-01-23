@extends('layouts.fixed')

@section('title','Add New Book')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Books</li>
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
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!-- /.card-header -->
                        <!-- form start -->
                        {!!  Form::open(['action'=>'NewBookController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('book_title', 'Title Of Book',['class'=>'control-label' ]) }}
                                        {{ Form::text('book_title', null, ['placeholder' => 'Enter Book Title','class'=>'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('author_name', 'Author Name',['class'=>'control-label' ]) }}
                                        {{ Form::text('author_name', null, ['placeholder' => 'Enter Author Name','class'=>'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('description', 'Book Description',['class'=>'control-label' ]) }}
                                        {{ Form::textarea('description', null, ['placeholder' => 'Enter Book Description','class'=>'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('category_id', 'Book Category',['class'=>'control-label' ]) }}
                                        {{ Form::select('category_id',$category, null, ['placeholder' => 'Select Category','class'=>'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        {{ Form::label('no_of_issue', 'Number Of Issues',['class'=>'control-label' ]) }}
                                        {{ Form::number('no_of_issue', null, ['placeholder' => 'How Many Issues Are There?','class'=>'form-control']) }}
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'form-control, btn btn-success ']) !!}
                            </div>
                        </div>

{{--                            <table class="table table-bordered table-striped">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th class="text-center">#SL</th>--}}
{{--                                        <th class="text-center">Category Name</th>--}}
{{--                                        <th class="text-center">Action</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @php $i = 1; @endphp--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-center"> {{ $i++ }}</td>--}}
{{--                                        <td class="text-center"> {{ $category->book_category }} </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            {{ Form::open(['route'=>['bookCategory.delete',$category->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                                <i class="fa fas fa-trash"></i>--}}
{{--                                            </button>--}}
{{--                                            {{ Form::close() }}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}


                        {!! Form::close() !!}
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


