@extends('layouts.fixed')

@section('title','Institution Mgnt | Academic Year')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Year</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Academic Year</li>
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
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Academic Year Name</th>
                                    <th>Start Date</th>
                                    <th>End date</th>
                                    <th>Descriptions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sessions ?? ''  as $session)
                                    <tr>
                                        <td>{{$session->year}}</td>
                                        <td>{{$session->start}}</td>
                                        <td>{{$session->end}}</td>
                                        <td>{{$session->description}}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-sm edit_session" value='{{$session->id}}'
                                               style="margin-left: 10px;"> <i class="fas fa-edit"></i>Edit
                                            </a>

                                            <a type="button" href="{{action('InstitutionController@delete_session', $session->id)}}"
                                               class="btn btn-danger btn-sm delete_session"
                                               style="margin-left: 10px;"> <i class="fas fa-trash"></i> Delete
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'institution/store-session', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Academic Year*</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="year" class="form-control" id="" aria-describedby="" placeholder="ex-2017-2019">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="date" name="start" class="form-control" id="" aria-describedby="" >
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
                                <input type="date" name="end" class="form-control" id="" aria-describedby="" >
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
                                <textarea name="description" class="form-control" rows="3" id=""> </textarea>
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
    <!-- ***/ Pop Up Model for button End-->

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
                    {!! Form::hidden('session_id', null,['id'=>'session_id']) !!}
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
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <textarea name="description" class="form-control" rows="3" id="description"> </textarea>
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Update </button>
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
        $(document).on('click', '.edit_session', function () {
            $("#edit").modal("show");
            var session_id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-session')}}",
                data:{session_id:session_id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#session_id").val(response.id);
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