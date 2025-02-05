@extends('layouts.fixed')

@section('title','Settings | Image')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Image</h1>
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
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
{{--                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : 1000</h3>--}}
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add</button>
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
                                    <th>{{ __('Category')}}</th>
                                    <th>{{ __('Tag')}}</th>
                                    <th>{{ __('Image')}}</th>
                                    <th>{{ __('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                    <tr>
                                        <th>{{ $image->id }}</th>
                                        <td>{{ $image->title }}</td>
                                        <td>
                                            @if($image->album)
                                                {{ $image->album->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($image->album)
                                                @if($image->album->category)
                                                    {{ $image->album->category->name }}
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $image->tags }}</td>
                                        <td>
                                            <img src="{{ asset('storage/uploads/gallery') }}/{{ $image->album ? $image->album->id : '' }}/{{ $image->image }}" alt="{{ $image->title }}" width="75">
                                        </td>
                                        <td>
                                            {{ Form::open(['action'=>['Backend\GalleryController@destroy',$image->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
            <div class="modal-content"  style="width: 700px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Image')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--<form>--}}
                    {{ Form::open(['action'=>'Backend\GalleryController@store','method'=>'post','files'=>true]) }}
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Title')}}</label>
                            <div class="input-group">
                                <input type="text" name="title" class="form-control" id=""  aria-describedby="" placeholder="Title">
                            </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Album')}}</label>
                            <div class="input-group">
                                {{ Form::select('album_id',$repository->albums(),null,['class'=>'form-control','id'=>'inputState']) }}
                            </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Category')}}</label>
                        <div class="input-group">
                            {{ Form::select('gallery_category_id',$repository->categories(),null,['class'=>'form-control','id'=>'inputState']) }}
                        </div>
                    </div>
                     <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Tags')}}</label>
                            <div class="input-group">
                                <input type="text" name="tags" class="form-control" id=""  aria-describedby="" placeholder="Enter Tags Here ..">
                            </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Short
                            Description')}}</label>
                            <div class="input-group">
                                <textarea type="text" name="description" class="form-control" rows="5" id="" placeholder="Enter Some Description About Images . . ."> </textarea>
                            </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label" style="font-weight: 500; text-align: right">{{ __('Image')}}*</label>
                            <div class="form-group files color">
                                <input type="file" name="image[]" class="form-control" multiple="" style="padding: 48px 0px 85px 24%!important">
                            </div>
                    </div>
                        <div class="col-12">

                        <button type="submit" class="btn btn-success  btn-sm btn-block" > <i class="fas fa-plus-circle"></i>
                            {{ __('Add')}}</button>
                        </div>
                    {{ Form::close() }}
                    {{--</form>--}}
                    </div>
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
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.min.css') }}">
@stop

<!-- *** External JS File-->
@section('plugin')
    <script src= "{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
@stop


@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want delete this image?');
            return !!x;
        }
    </script>
@stop




