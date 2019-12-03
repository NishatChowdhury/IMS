@extends('layouts.fixed')

@section('title','Institution Mgnt | Subjects')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subjects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Classes</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
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
                                <div class="col-md-3">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Eight</h5>
                                            <p>VIII</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
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
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Subject</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> Class Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Short Name </th>
                                    <th>Teacher</th>
                                    <th>Pass Mark</th>
                                    <th>Optional</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $sub)
                                    <tr>
                                        <td>{{$sub->code}}</td>
                                        <td>{{$sub->name}}</td>
                                        <td>{{$subshort_name}}</td>
                                        <td></td>
                                        <td>Obj-{{$sub->objective_pass}}; Wrtn-{{$sub->written_pass}}</td>
                                        <td>{{$sub->is_optional?'Optional': 'Compulsory'}}</td>
                                        <td></td>
                                        <td></td>
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

    <!-- ***/ Pop Up Model for subjects -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {!! Form::open(['action'=>'InstitutionController@assign_subject', 'method'=>'post', 'class'=>'form-control']) !!}
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Class*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    {!! Form::select('class_id', $classes, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Select Subject*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    {!! Form::select('subject_id', $subjects, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Teacher*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    {!! Form::select('teacher_id', $staffs, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input name="is_optional" class="form-check-input" type="checkbox" value=1 id="defaultCheck1">
                                </div>
                                <label class="form-check-label" for="defaultCheck1">Is Optional?</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Objective Pass Mark</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" name="objective_pass" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Written Pass Mark</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" name="written_pass" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Practical Pass Mark</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" name="practical_pass" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Viva Pass Mark</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" name="viva_pass" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="float: right">
                            <button type="submit" class="btn btn-success btn-sm pull-right" > <i class="fas fa-plus-circle"></i> Add</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>



    <!-- ***/ Pop Up Model for Add Class Schedule -->
    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Class Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                    <option selected>Select Subjects...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="" aria-describedby="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"> Start* </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="10.00" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4"> End* </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="" aria-describedby="" placeholder="10.00">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-clock nav-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="float: right">
                        <button type="button" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

@stop
