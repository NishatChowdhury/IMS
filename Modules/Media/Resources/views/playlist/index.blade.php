@extends('media::layouts.master')

@section('title', 'Playlists')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Video Playlists</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                        <li class="breadcrumb-item active">Playlist</li>
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
                                {{--                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : {{ $playlists->count() }}</h3> --}}
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px;"><i
                                                class="fas fa-plus-circle"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Videos</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($playlists as $playlist)
                                    <tr>
                                        <th>{{ $playlist->id }}</th>
                                        <td>{{ $playlist->name }}</td>
                                        <td>{{ $playlist->videos->count() }} Video(s)</td>
                                        <td>{{ $playlist->created_at }}</td>
                                        <td>
                                            <div class="row ml-1">
                                                <a href="{{ route('playlist.show',$playlist->id) }}" class="btn btn-info btn-sm mr-1"><i class="fas fa-file-video"></i></a>
                                                <form  action="{{route('playlist.destroy',$playlist->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="right gap-items-2">
                                                        <button class="btn btn-danger btn-sm" name="archive" type="submit" onclick="archiveFunction()"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </form>
                                            </div>

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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['route' => 'playlist.store', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"
                            style="font-weight: 500; text-align: right">Playlist
                            Name</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" id=""  aria-describedby=""> --}}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-plus-circle"></i> Add</button>
                    </div><br>
                    {{ Form::close() }}
                </div>
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
        function confirmDelete() {
            var x = confirm(
                'Are you sure you want to delete this playlist? All albums and images in this playlist will also be deleted!!!'
            );
            return !!x;
        }
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this playlist? All albums and images in this playlist will also be deleted!!!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        }
    </script>
@stop
