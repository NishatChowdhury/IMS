@extends('layouts.fixed')

@section('title','Role Lists')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Roles</li>
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
                        <a href="{{ route('role.create')  }}" class="btn btn-dark btn-sm">Create Role</a>
                        <a href="{{ route('module.create')  }}" class="btn btn-primary btn-sm">Create Module</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        @if(count($role->permissions) > 0)
                                            <span class="badge badge-danger">{{ count($role->permissions) }}</span>
                                        @else
                                            <span class="badge badge-danger">No Permission Found :)</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
