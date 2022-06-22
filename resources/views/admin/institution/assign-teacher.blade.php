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
                        <li class="breadcrumb-item active">Assign Teacher</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
{{--                <div class="col-3"></div>--}}
                <div class="col-6 text-center offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="header">
                                <h6>Class: {{$academic->classes->name ?? ''}}, Group: {{$academic->group->name ?? 'N/A'}}</h6>
                                <h6>Section: {{$academic->section->name ?? 'N/A'}}, Session: {{$academic->session->year ?? 'N/A'}}</h6>
                                <br>
                                <h3><b><i>Assign Teacher On Subject</i></b></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 text-center offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm">
                                    <tr>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($subjects as $subs)
                                        <form action="{{ route('institution.assignTeacher.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="assign_subject_id" value="{{ $subs->id }}">
                                            <tr>
                                                <td>{{$subs->subject->name ?? ''}}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="staff_id" class="form-control" id="">
                                                            @foreach($teachers as $t)
                                                            <option
                                                                    @isset($subs)
                                                                        {{ $subs->teacher_id == $t->id ? 'selected' : '' }}
                                                                    @endisset
                                                                    value="{{$t->id}}"
                                                              >{{$t->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-dark btn-sm btn-block">Save Change</button>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
