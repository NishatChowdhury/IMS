@extends('media::layouts.master')

@section('title', 'Gallery | Multiple Image')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('All Image') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Gallery') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Image') }}</li>
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
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i
                                                class="fas fa-image"
                                                style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>{{ __('Total
                                    Found')}} : {{$image->count()}}</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px;"><i class="fas fa-image"></i>
                                        {{ __('Add Image')}}</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mr-2">
                                @foreach($image as $img)
                                    <div class="card-deck col-md-4 mr-2 mb-4">
                                        <div class="card p-1 bg-dark">
                                            <img height="250px" class="card-img-top"
                                                 src="{{ url('storage/gallery/'.$img->image) }}" alt="Card image cap">
                                            <div class="card-body m-0 p-1">
                                                <a href="{{ route('GalleryImage.destroy', [$img->id]) }}"
                                                   class="btn btn-danger"
                                                   onclick="return confirm('Are you sure?')">{{ __('Delete')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('GalleryCornerStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Image') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"
                                   style="font-weight: 500; text-align: right">{{ __('Image')}}*</label>
                            <div class="col-sm-10">
                                <div class="form-group files color">
                                    <input type="file" name="image[]" class="form-control" multiple="multiple"required>
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="modal-footer"><button type="submit" class="btn btn-success  btn-sm"><i
                                        class="fas fa-image"></i> {{ __('Upload')}}</button>
                        </div>
                    </form>


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
        @if (session('status'))
            Swal.fire({
                title: "Success",
                text: "{{ session('status') }}",
                icon: "success",
            });
        @endif
        function confirmDelete() {
            // var x = confirm('Are you sure you want to delete this album? All images in this album will also be deleted!!!');
            // return !!x;
        }
    </script>
@stop
