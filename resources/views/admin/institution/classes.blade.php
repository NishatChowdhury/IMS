@extends('layouts.fixed')

@section('title','Institution Mgnt | Classes')

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
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
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
                                    <th>Class Code</th>
                                    <th>Group</th>
                                    <th>Section</th>
                                    <th>Total Student</th>
                                    <th>Total Subject</th>
                                    <th>Tuition Fee</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 0)
                                @foreach($classes ?? '' as $class)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$class->class->name}}</td>
                                        <td>{{$class->code}}</td>
                                        <td>{{$class->group ? $class->group->name : ''}}</td>
                                        <td>{{$class->section}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-sm edit" value='{{$class->id}}'
                                               style="margin-left: 10px;"> <i class="fas fa-edit"></i>Edit
                                            </a>

                                            <a type="button" href="{{action('InstitutionController@delete_SessionClass', $class->id)}}"
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
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($academic_classes)===0)
                        <div class="alert alert-warning alert-dismissible" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Please, Create class first. Go to <a href="{{url('institution/class&groups')}}">Create Class</a></strong>
                        </div>
                    @endif

                    {!! Form::open(['url'=>'institution/store-class', 'method'=>'post']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Session*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="session_id">
                                    <option selected disabled="">Select Session</option>
                                    @foreach($sessions ?? '' as $session)
                                        <option value="{{$session->id}}">{{$session->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Class*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="academic_class_id">
                                    <option selected disabled>Select Class</option>
                                    @foreach($academic_classes ?? '' as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class Code</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="code" class="form-control" id=""  aria-describedby="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="group_id">
                                    <option selected disabled>Select Group</option>
                                    @foreach($groups ?? '' as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Sections</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="section" class="form-control" id=""  aria-describedby="" placeholder="e.g. A,B,C..">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Tuition Fee</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="tuition_fee" class="form-control" id=""  aria-describedby="" placeholder="Admission Fee">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Admission Fee</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="admission_fee" class="form-control" id=""  aria-describedby="" placeholder="Admission Fee">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Admission Form Fee </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="admission_form_fee" class="form-control" id=""  aria-describedby="" placeholder="Admission Form Fee">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=>'InstitutionController@update_SessionClass', 'method'=>'post']) !!}
                    {!! Form::hidden('id', null, ['id'=>'id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Session*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="session_id" id="session_id">
                                    <option selected disabled="">Select Session</option>
                                    @foreach($sessions ?? '' as $session)
                                        <option value="{{$session->id}}">{{$session->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Class*</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="academic_class_id" id="academic_class_id">
                                    <option selected disabled>Select Class</option>
                                    @foreach($academic_classes ?? '' as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class Code</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="code" class="form-control" id="code"  aria-describedby="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select class="form-control" name="group_id" id="group_id">
                                    <option selected disabled>Select Group</option>
                                    @foreach($groups ?? '' as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Sections</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="section" class="form-control" id="section"  aria-describedby="" placeholder="e.g. A,B,C..">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Tuition Fee</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="tuition_fee" class="form-control" id="tuition_fee"  aria-describedby="" placeholder="Admission Fee">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Admission Fee</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="admission_fee" class="form-control" id="admission_fee"  aria-describedby="" placeholder="Admission Fee">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Admission Form Fee </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" name="admission_form_fee" class="form-control" id="admission_form_fee"  aria-describedby="" placeholder="Admission Form Fee">
                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-plus-circle"></i> Update
                        </button>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
@stop

@section('script')
    <script>
        $(document).on('click', '.edit', function () {
            $("#edit").modal("show");
            var id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"{{ url('institution/edit-SessionClass')}}",
                data:{id:id,"_token":"{{ csrf_token() }}"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#session_id").val(response.session_id);
                    $("#academic_class_id").val(response.academic_class_id);
                    $("#code").val(response.code);
                    $("#group_id").val(response.group_id);
                    $("#section").val(response.section);
                    $("#tuition_fee").val(response.tuition_fee);
                    $("#admission_fee").val(response.admission_fee);
                    $("#admission_form_fee").val(response.admission_form_fee);

                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
@stop