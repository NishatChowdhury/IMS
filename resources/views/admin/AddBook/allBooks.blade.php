@extends('layouts.fixed')

@section('title','Library Management')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Books In Library</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'NewBookController@search','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Search Your Book By Name:</label>
                                    <div class="input-group">
                                        {{ Form::text('book_title',null,['class'=>'form-control','id'=>'book_title','placeholder'=>'Enter Your book Name Here:']) }}
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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>#SL</th>
                                <th>Book Title</th>
                                <th>Author Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Available</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="search">
                            @foreach($allBooks as $key => $value)
                                <tr class="{{$value->id}}">
                                    <td>{{  $key+1 }}</td>
                                    <td>{{  $value->book_title }}</td>
                                    <td>{{  $value->author_name }}</td>
                                    <td>{{  $value->description }}</td>
                                    <td>{{  $value->category->book_category }}</td>
                                    <td><a class="btn btn-success">{{  $value->no_of_issue }} </a></td>
                                    <td>
                                        {{ Form::open(['route'=>['newBook.delete',$value->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                        <a href="{{ action('NewBookController@edit',$value->id) }}" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
    @section('script')
        <script>
            $('#book_title').keyup(function () {
                var text = $(this).val();
                var csrf = "{{csrf_token()}}";
                $.ajax({
                    type:"get",
                    url:"{{route('allBooks.search')}}",
                    data: {text:text,_token:csrf},
                    success:function(data) {
                        $('#search').html(data);
                    }
                })
            });
        </script>
    @stop
@stop

