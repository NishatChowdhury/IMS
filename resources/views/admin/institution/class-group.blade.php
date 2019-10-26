@extends('layouts.fixed')

@section('title','Institution Mgnt | Classes')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classes & Groups</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Group</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p>1000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card-header">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ClassModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                        <h3 style="display: inline-block; float: right">Class</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Class Name</th>
                                <th>Numerical</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 0)
                            @foreach( $classes ?? '' as $class)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$class->name}}</td>
                                    <td class="text-center">{{$class->numeric_class}}</td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-sm edit_class" value='{{$class->id}}'
                                           style="margin-left: 5px;"> <i class="fas fa-edit"></i>Edit
                                        </a>

                                        <a type="button" href="{{action('InstitutionController@delete_class',$class->id)}}"
                                           class="btn btn-danger btn-sm"
                                           style="margin-left: 5px;"> <i class="fas fa-trash "></i>Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card-header">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#GroupModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                        <h3 style="display: inline-block; float: right">Groups</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups ?? '' as $group)
                                <tr>
                                    <td>{{$group->name}}</td>
                                    <td>
                                        <a type="button" class="btn btn-info btn-sm edit_group" value='{{$group->id}}'
                                           style="margin-left: 5px;"> <i class="fas fa-edit"></i>Edit
                                        </a>
                                        <a type="button" href="{{action('InstitutionController@delete_grp',$group->id)}}"
                                           class="btn btn-danger btn-sm delete_grp"
                                           style="margin-left: 10px;"> <i class="fas fa-trash "></i>Delete
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
    </section>

    <!-- ***/ Pop Up Model for Class Creation -->
    <div class="modal fade" id="ClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 900px !important; padding: 0px 100px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/create-class', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right">Class Name*</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right"> Numerical Class Name</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="number" name="numeric_class" class="form-control" id="" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Class End-->


    <!-- ***/ Pop Up Model for Group Creation -->
    <div class="modal fade" id="GroupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:40%; width: 700px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/create-group', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right">Group Name*</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="" required="required" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Groups End-->


    {{--Edit Class Model--}}
    <div class="modal fade" id="edit_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 900px !important; padding: 0px 100px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/update-class', 'method'=>'post']) !!}
                    {!! Form::hidden('id', null, ['id' => 'class_id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right">Class Name*</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="class_name" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right"> Numerical Class Name</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="number" name="numeric_class" class="form-control" id="numeric_class" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    {{--Edit Class Model--}}

    <!-- ***/ Pop Up Model for Edit Group -->
    <div class="modal fade" id="edit_group" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:40%; width: 700px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/update-group', 'method'=>'post']) !!}
                    {!! Form::hidden('group_id', null, ['id'=>'group_id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-3 col-form-label" style="font-weight: 500; text-align: right">Group Name*</label>
                        <div class="col-9">
                            <div class="input-group">
                                <input type="text" name="group_name" class="form-control" id="group_name" required="required" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i>Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for Edit Groups End-->


@stop
@section('script')
    <script>
        $(document).on('click', '.edit_class', function () {
            $("#edit_class").modal("show");
            var class_id = $(this).attr('value');
            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-class')}}",
                data:{class_id:class_id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#class_id").val(response.id);
                    $("#class_name").val(response.name);
                    $("#numeric_class").val(response.numeric_class);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });

        $(document).on('click', '.edit_group', function () {
            $("#edit_group").modal("show");
            var id = $(this).attr('value');
            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-group')}}",
                data:{id:id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#group_id").val(response.id);
                    $("#group_name").val(response.name);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop