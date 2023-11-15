@extends('settings::layouts.master')

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
                        <li class="breadcrumb-item"><a href="#">{{ __('Classes') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Subjects') }}</li>
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
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5>{{ $class->academicClasses->name ?? '' }} - {{ $class->section->name ?? '' }}{{ $class->group->name ?? '' }}</h5>
                                            <p>{{ $class->academicClasses->short_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Subject</button>
                                    </div>
                                    {{--                                    <div style="float: right;">--}}
                                    {{--                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> Class Schedule</button>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Short Name') }}</th>
                                    <th>{{ __('Teacher') }}</th>
                                    <th>{{ __('Optional') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assignedSubjects as $sub)
                                    <tr>
                                        <td>{{$sub->subject->code}}</td>
                                        <td>{{$sub->subject->name}}</td>
                                        <td>{{$sub->subject->short_name}}</td>
                                        <td>{{ $sub->staff }}</td>
                                        <td>{{$sub->is_optional ? 'YES' : 'NO'}}</td>
                                        <td></td>
                                        <td>
                                            {{ Form::open(['route'=>['institution.unAssignSubject',$sub->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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

    <!-- ***/ Pop Up Model for subjects -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Assign Subject') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>'institution.assign.subject', 'method'=>'post']) }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($subjects as $key => $subject)
                                    @if($key == 1)
                                        <div class="col-md-4">
                                            <h5 class="mb-1">{{ __('Compulsory') }}</h5>
                                            <hr>
                                            @foreach($subject as  $sb)
                                                <div class="form-check form-check-inline mb-3" style="justify-content: normal">
                                                    <input type="checkbox" name="subjects[]" value="{{ $sb->id }}" class="form-check-input sub" id="sub-{{ $sb->id }}">
                                                    <label class="form-check-label" for="sub-{{ $sb->id }}">{{ $sb->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif($key ==2)
                                        <div class="col-md-4">
                                            <h5 class="mb-1">Optional</h5>
                                            <hr>
                                            @foreach($subject as  $sb)
                                                <div class="form-check form-check-inline mb-3" style="justify-content: normal">
                                                    <input type="checkbox" name="subjects[]" value="{{ $sb->id }}" class="form-check-input sub" id="sub-{{ $sb->id }}">
                                                    <label class="form-check-label" for="sub-{{ $sb->id }}">{{ $sb->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif($key == 3)
                                        <div class="col-md-4">
                                            <h5 class="mb-1">Selective</h5>
                                            <hr>
                                            @foreach($subject as  $sb)
                                                <div class="form-check form-check-inline mb-3" style="justify-content: normal">
                                                    <input type="checkbox" name="subjects[]" value="{{ $sb->id }}" class="form-check-input sub" id="sub-{{ $sb->id }}">
                                                    <label class="form-check-label" for="sub-{{ $sb->id }}">{{ $sb->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{ Form::hidden('academic_class_id',$class->id) }}
                                @endforeach

                                <div class="form-group col-md-12" style="float: right">
                                    <button type="submit" class="btn btn-success btn-sm pull-right" > <i class="fas fa-plus-circle"></i> Assign Subjects</button>
                                </div>

                            </div>
                        </div>

                    </div>
                    {{ Form::close() }}
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

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure, you want to unmount this subject?');
            return !!x;
        }
        // check all checkbox
        $('#allSelect').click(function(){
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            }else{
                $('input[type=checkbox]').prop('checked', false);
            }
        })
    </script>
@stop
