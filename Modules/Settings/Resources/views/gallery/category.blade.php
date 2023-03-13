@extends('settings::layouts.master')

@section('title','Settings | Category')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Image')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Image')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                        {{ __('Add') }}</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('ID')}}</th>
                                    <th>{{ __('Name')}} </th>
                                    <th>{{ __('Album')}}</th>
                                    <th>{{ __('Image')}}</th>
                                    <th>{{ __('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->albums->count() }} {{ __('Album(s)')}}</td>
                                    <td>{{ $category->images->count() }} {{ __('Image(s)')}}</td>
                                    <td>
                                        {{ Form::open(['route'=>['gallery-category.destroy',$category->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete')}}</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Image')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>'gallery-category.store','method'=>'post']) }}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">{{ __('Category
                                Name')}}</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    {{--<input type="text" class="form-control" id=""  aria-describedby="">--}}
                                    {{ Form::text('name',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop
<!--/Image page inner Content End***-->

<!-- *** External CSS File-->
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/imageupload.css') }}">
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this category? All albums and images in this category will also be deleted!!!');
            return !!x;
        }
    </script>
@stop