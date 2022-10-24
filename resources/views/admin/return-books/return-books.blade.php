@extends('layouts.fixed')

@section('title','Return Books')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Return Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Return Books</li>
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        {!!  Form::open(['action'=>'Backend\BookController@returnBookStore', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        {{ Form::label('student_id', 'Student ID',['class'=>'control-label' ]) }}
                                        {{ Form::text('student_id',null, ['placeholder' => 'Example - S38','class'=>'form-control','id' => 'getStudentID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        {{ Form::label('book_id', 'Book ID',['class'=>'control-label' ]) }}
                                        {{ Form::select('book_id',[], null, ['placeholder' => 'Return Books List','class'=>'form-control', 'id' => 'listOfBooks']) }}
                                    </div>
                                </div>
                                <div class="col-2" style="margin-top: 30px">
                                    <div class="form-group mt-30">
                                        {!! Form::submit('Return Books', ['class' => 'form-control btn btn-dark ']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <!-- /.card -->
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-body">
                            <p><b>List of all return books</b></p>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#SL</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Book ID</th>
                                        <th>Issue Quantity</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($issuedData as $key => $data)
                                        <tr class="{{$data->id}}">
                                            <td>{{  $key+1 }}</td>
                                            <td>{{  $data->student_name->studentId  ?? ''}}</td>
                                            <td>{{  $data->student_name->name  ?? ''}}</td>
                                            <td>{{  $data->bookCode->book_code  ?? ''}}</td>
                                            <td>{{1}}</td>
                                            <td>{{  $data->created_at }}</td>
                                            <td>{{  $data->created_at == $data->updated_at ? 'Not Yet Return' : $data->updated_at  }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    @section('script')
        <script>
            $('#getStudentID').keyup(function(){
                let searchStudennt = $("#getStudentID").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/admin/library/return_books-search",
                    type: "get",
                    data: {
                        ajaxid: searchStudennt,
                    },
                    success: function(response) {
                        $('#listOfBooks').html(response);

                    },
                    error: function(error) {
                        console.log('error-',error.responseJSON);
                        console.log('error-',error.responseText);
                    }
                });
            });
        </script>
    @stop
@stop


