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
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Back</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="ChnageUrl" action="{{ route('user.assign.role.update') }}" method="post">
                                    @csrf
                                    <div class="modal-body row">
                                        <div class="form-group col-12">
                                            <label for="">{{__('Name')}}</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{__('Email')}}</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group col-12">
                                          <label>{{__('Assign Role')}}</label>
                                          <select class="select2" multiple="multiple" name="role_id[]" id="role_id" data-placeholder="Select a State" style="width: 100%;">
                                            <option>Select Roles</option>

                                            @foreach($roles as $r)
                                                    <option
                                                            @foreach($user->roles as $re)
                                                                {{ $re->id == $r->id ? 'selected' : ''}}
                                                            @endforeach
                                                            value="{{ $r->id }}">
                                                        {{ $r->name }}
                                                    </option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <input type="hidden" name="id" value="{{ $user->id }}" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Update User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
