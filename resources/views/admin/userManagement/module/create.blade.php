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
                        <li class="breadcrumb-item active">Create Roles</li>
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
                <div class="card card-info">
                    <div class="card-header">
                    <h4>Create Module & Permission</h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('module.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Module Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Module Name" >
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <h4><span class="badge badge-dark">Modules Permissions</span></h4>
                                </div>
                                <div class="col-12 text-center">
                                     <div class="col-12">
                                        <table class="table table-striped addExtraCol">
                                            <tr>
                                                <td>Name</td>
                                                <td>Action</td>
                                            </tr>
                                            <tr>
                                               <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="permission[]" placeholder="example.index">
                                                </div>
                                               </td>
                                               <td>
                                                <button class="btn btn-sm btn-dark" type="button" onclick="add()" id="extraAdd">Add</button>
                                               </td>
                                            </tr>
                                        </table>
                                        <hr/>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-block btn-primary">Save Permission</button>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@stop
@section('script')
  <script>
    function add(){
        $('.addExtraCol').append(`<tr>
                               <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="permission[]" placeholder="example.index">
                                </div>
                               </td>
                               <td>
                                <button class="btn btn-sm btn-dark removeRxtraAdd" type="button">Remove</button>
                               </td>
                            </tr>`);
    }

    // $('.removeRxtraAdd').click(function(){
    //     console.log("object");
    // })

    $(document).on('click', '.removeRxtraAdd', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection