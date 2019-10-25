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
                                        <a type="button" href="{{action('InstitutionController@delete_class',$class->id)}}"
                                           class="btn btn-danger btn-sm"
                                           style="margin-left: 10px;"> <i class="fas fa-trash "></i>Delete
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


    {{--Edit Session Model--}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/update-session', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Academic Year*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="year" class="form-control" id="year" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" name="start" class="form-control" id="start" aria-describedby="" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" name="end" class="form-control" id="end" aria-describedby="" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right"> Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <textarea name="description" class="form-control" rows="3" id="description"> </textarea>
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
    {{--Edit Session Model--}}
@stop
@section('script')
    <script>
        $(document).on('click', '.edit', function () {
            $("#edit").modal("show");
            var session_id = $(this).val();
            alert(session_id);
            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-session')}}",
                data:{session_id:session_id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#year").val(response.year);
                    $("#start").val(response.start);
                    $("#end").val(response.end);
                    $("#description").val(response.description);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop