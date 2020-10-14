@extends('layouts.fixed')

@section('title','Attendance | Setting')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Weekly Off Setting </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Weekly Off Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="col-md-12">
                            <div class="card" style="margin: 10px;">
                                <div class="card-header">
                                    <h3 class="card-title">Select Off Day/Days:</h3>
                                </div>
                                <form role="form" action="{{ route('weeklyOff.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }} {{ method_field('POST') }}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="saturday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Saturday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="sunday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Sunday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="monday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Monday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="tuesday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Tuesday
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="wednesday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Wednesday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="thursday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Thursday
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="friday" type="checkbox" name="show_option[]">
                                                        <label class="form-check-label" for="">
                                                            Friday
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">


                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <br>
                                        <br>
                                        @foreach ($all as $item)
                                        <h3 style="background-color: #0c5460;padding-top: 5px;padding-bottom: 5px;color: white;text-align: center">Existing Weekly Off Of the School: <span style="margin-left: 5px">{{$item->show_option}}</span> </h3>
                                        <h3>Wanna Customize?</h3>
                                            <a href="{{ route('weeklyOff.edit',$item->id) }}" class="btn btn-xs btn-info ">Edit</a>
                                        @endforeach
                                    </div>

                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
