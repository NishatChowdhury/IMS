@extends('media::layouts.master')

@section('title', 'Settings | Notices')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notices</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Notices</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- ***/Notices page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">

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
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo"
                                        style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                        New</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Total Notice</th>
                                        {{--                                    <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->notices->count() }}</td>
                                            <td>
                                                <a href="{{ route('notice-category.edit', $category->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">First</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button Start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['route' => 'notice-category.store', 'method' => 'post']) }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form> --}}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"
                            style="font-weight: 500; text-align: right">Name*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" id=""  aria-describedby=""> --}}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"
                            style="font-weight: 500; text-align: right">Short Desc</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{-- <textarea type="text" class="form-control" rows="5" id=""> </textarea> --}}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'row' => 5]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success  btn-sm"> <i
                            class="fas fa-plus-circle"></i>
                        Add</button></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Pop Up Model for button End***-->
@stop
<!-- /Notices page inner Content End***-->
