@extends('layouts.fixed')

@section('title','Role Lists')

@section('content')
@section('style')
  <link rel="stylesheet" href="{{asset('/plugins/select2/select2.css')}}">
{{--  <link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
@endsection
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All User</li>
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
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">{{__('Create User')}}</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
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



     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="ChnageUrl" action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for="">{{__('Name')}}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name . .">
                        </div>

                        <div class="form-group col-12">
                            <label for="">{{__('Email')}}</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email . . ">
                        </div>
                        <div class="form-group col-12">
                          <label>{{__('Assign Role')}}</label>
                          <select class="select2" multiple="multiple" name="role_id[]" id="role_id" data-placeholder="Select a State" style="width: 100%;">
                            <option>Select Roles</option>

                            @foreach($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="">{{__('Password')}}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password . .">
                        </div>


                        <input type="hidden" name="id" id="onlineId" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Save User</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>




@section('script')
    <script src="{{asset('/plugins/select2/select2.js')}}"></script>
    <script>
          $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
              theme: 'bootstrap4'
            })
        })
    </script>
@endsection






@stop
