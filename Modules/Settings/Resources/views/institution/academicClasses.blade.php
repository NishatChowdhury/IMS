@extends('settings::layouts.master')

@section('title', 'Institution Mgnt | Academic Classes')

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
                    @if (session('status'))
                        <div class="alert alert-warning">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>
                                            New</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#schedule" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i
                                                class="fas fa-plus-circle"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#schedule" data-whatever="@mdo"
                                            style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i
                                                class="fas fa-plus-circle"></i> </button>
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
                                        <th>Students</th>
                                        <th>Subjects</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 0)
                                    @foreach ($classes as $class)
                                        <tr>
                                            <td>{{ $class->id }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-primary">{{ $class->academicClasses->name ?? '' }}</span>
                                                <span class="badge badge-secondary">{{ $class->section->name ?? '' }}</span>
                                                <span class="badge badge-dark">{{ $class->group->name ?? '' }}</span>
                                                <span class="badge badge-success">{{ $class->sessions->year ?? '' }}</span>

                                            </td>
                                            <td> {{ $class->student_academic_count }} </td>
                                            <td>{{ $class->subjects->count() }}</td>
                                            <td>
                                                {{ Form::open(['route' => ['institution.delete_SessionClass', $class->id], 'method' => 'delete', 'onsubmit' => 'return confirmDelete()']) }}
                                                <a href="{{ route('student.downloadBlank', $class->id) }}" role="button"
                                                    class="btn btn-primary btn-sm" title="Download CSV"><i
                                                        class="fas fa-file-download"></i></a>
                                                <a href="{{ route('student.uploadStudent', $class->id) }}" role="button"
                                                    class="btn btn-light btn-sm" title="Upload Student"><i
                                                        class="fas fa-file-upload"></i></a>
                                                <a href="{{ route('institution.classSubjects', $class->id) }}"
                                                    role="button" class="btn btn-info btn-sm" title="Assign Subject"><i
                                                        class="fas fa-book"></i></a>
                                                <a href="{{ route('institution.class.schedule.index', $class->id) }}"
                                                    role="button" class="btn btn-success btn-sm" title="Class Schedule"><i
                                                        class="fas fa-clock"></i></a>
                                                <a href="{{ route('fee-setup.list', $class->id) }}"
                                                    class="btn btn-dark btn-sm"><i class="fas fa-funnel-dollar"></i></a>
                                                {{-- <a href="{{ route('institution.assignTeacher',$class->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-user"></i></a> --}}
                                                <a type="button" class="btn btn-warning btn-sm edit"
                                                    value='{{ $class->id }}' title="Edit"> <i
                                                        class="fas fa-edit"></i></a>
                                                <button type="submit" disabled class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this Academic Class?')" title="Delete"><i class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
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
                {!! Form::open(['route' => 'institution.storeAcademicClass', 'method' => 'post']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Session</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('session_id', $repository->sessions(), null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Session',
                                    'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Class</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('class_id', $repository->classes(), null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Class',
                                    'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Section</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('section_id', $repository->sections(), null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Section',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('group_id', $repository->groups(), null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Select Group',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row"> --}}
                    {{-- <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class Name*</label> --}}
                    {{-- <div class="col-sm-9"> --}}
                    {{-- <div class="input-group"> --}}
                    {{-- {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Class Name']) !!} --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}

                    {{-- <div class="form-group row"> --}}
                    {{-- <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Numeric Class*</label> --}}
                    {{-- <div class="col-sm-9"> --}}
                    {{-- <div class="input-group"> --}}
                    {{-- {!! Form::text('numeric_class', null, ['class'=>'form-control', 'placeholder'=>'E.g. 1/2/3']) !!} --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-success  btn-sm"> <i
                            class="fas fa-plus-circle"></i>
                        Add</button></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Academic Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'institution.updateAcademicClass', 'method' => 'post']) !!}
                    {!! Form::hidden('id', null, ['id' => 'id']) !!}
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Session</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('session_id', $repository->sessions(), null, [
                                    'class' => 'form-control session_id',
                                    'placeholder' => 'Select Session',
                                    'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Class</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('class_id', $repository->classes(), null, [
                                    'class' => 'form-control class_id',
                                    'placeholder' => 'Select Class',
                                    'required',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Section</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('section_id', $repository->sections(), null, [
                                    'class' => 'form-control section_id',
                                    'placeholder' => 'Select Section',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"
                            style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                {!! Form::select('group_id', $repository->groups(), null, [
                                    'class' => 'form-control group_id',
                                    'placeholder' => 'Select Group',
                                ]) !!}
                            </div>
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-warning btn-sm">
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
        $(document).on('click', '.edit', function() {
            $("#edit").modal("show");
            var id = $(this).attr('value');

            $.ajax({
                method: "post",
                url: "{{ url('admin/institution/edit-AcademicClass') }}",
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#id").val(response.id);
                    $(".session_id").val(response.session_id);
                    $(".class_id").val(response.class_id);
                    $(".section_id").val(response.section_id);
                    $(".group_id").val(response.group_id);

                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@stop
