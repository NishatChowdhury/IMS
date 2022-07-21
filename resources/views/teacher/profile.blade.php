@extends('layouts.teacher')

@section('title','User | Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        {{ Form::model($user,['route'=>'teacher.profile.update','method'=>'post']) }}
                        <div class="card">
                            <div class="card-header text-center">Account Information</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    {{--<input type="text" name="name" class="form-control" id="name" aria-describedby="name">--}}
                                    {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->first('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    {{--<input type="email" name="email" class="form-control" id="email" aria-describedby="email">--}}
                                    {{ Form::email('email',$staff->email,['class'=>'form-control','id'=>'email']) }}
                                    @if($errors->first('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                    <input type="hidden" name="id" value="{{ $staff->id }}">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                    <div class="col">
                        <form action="{{ route('teacher.resetPassword') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>New password</label>
                                <input class="form-control" name="password" type="password" placeholder="Enter New Password">
                            </div>
                            <div class="form-group">
                                <label>Confirm new password</label>
                                <input class="form-control" name="password_confirmation"  type="password" placeholder="Enter Confirm New Password">
                            </div>
                            <input type="hidden" name="id" value="{{ $staff->id }}">
                            <button class="btn btn-primary btn-sm">Reset Password</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop
