@extends('settings::layouts.master')

@section('title', 'Institution Mgnt | Classes')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Classes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
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
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px;"><i class="fas fa-plus-circle"></i>
                                            New
                                        </button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#schedule" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px; float: right !important;"><i
                                                class="fas fa-plus-circle"></i></button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#schedule" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px; float: right !important;"><i
                                                class="fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Class Name</th>
                                        <th>Numeric Class</th>
                                        <th>Total Student</th>
                                        <th>Total Subject</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($classes ?? '' as $class)
                                        <tr>
                                            <td>{{ $class->id }}</td>
                                            <td>{{ $class->name }}</td>
                                            <td>{{ $class->numeric_class ?? '' }}</td>
                                            <td>{{ $class->student_academic_count ?? '' }} </td>
                                            <td>{{ $class->subjects->count() }}</td>
                                            <td></td>
                                            <td>
                                                {{--                                            <a href="{{ action('InstitutionController@classSubjects',$class->id) }}" role="button" class="btn btn-info btn-sm" title="Assign Subject"><i class="fas fa-book"></i></a> --}}
                                                <a type="button" class="btn btn-warning btn-sm edit"
                                                    value='{{ $class->id }}' style="margin-left: 10px;"> <i
                                                        class="fas fa-edit"></i>
                                                </a>

                                                <a type="button"
                                                    href="{{ route('institution.delete_SessionClass', $class->id) }}"
                                                    class="btn btn-danger btn-sm delete_session" style="margin-left: 10px;">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
                {!! Form::open(['route' => 'institution.store_class', 'method' => 'post']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Class
                            Name*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Class Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Numeric
                            Class*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('numeric_class', null, ['class' => 'form-control', 'placeholder' => 'E.g. 1/2/3']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-plus-circle"></i> Add
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'institution.update_SessionClass', 'method' => 'post']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('id', null, ['id' => 'id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Class
                            Name*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control class_name', 'placeholder' => 'Class Name']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Numeric
                            Class*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::text('numeric_class', null, ['class' => 'form-control numeric_class', 'placeholder' => 'E.g. 1/2/3']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success btn-sm">
                        <i class="fas fa-plus-circle"></i> Update
                    </button></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop

@section('script')
    <script>
        $(document).on('click', '.edit', function() {
            $("#edit").modal("show");
            var id = $(this).attr('value');
            $.ajax({
                method: "post",
                url: "{{ url('admin/institution/edit-SessionClass') }}",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("#id").val(response.id);
                    $(".class_name").val(response.name);
                    $(".numeric_class").val(response.numeric_class);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@stop
