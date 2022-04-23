@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Assign Subject</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Students</li>
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
                <div class="card card-info">
                {{ Form::open(['action'=>'Backend\StudentController@optional','method'=>'get']) }}
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <lable>Class Name</lable>
                                    <select name="academic_class_id" class="form-control" id="">
                                        @foreach($academicclasses as $cs)
                                            <option value="{{$cs->id}}">{{$cs->classes->name ?? ''}} {{$cs->section->name ?? ''}} {{$cs->group->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mt-4">
                                <button class="btn btn-block btn-dark">Search Students</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="card mt-5">
                    @if($students)
                        <div class="card-header bg-primary">

                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                               <table class="table-striped table table-sm table-hover">
                                   <tr>
                                       <th>SL.</th>
                                       <th>Name</th>
                                       <th>Compulsory</th>
                                       <th>Selective</th>
                                       <th>Optional</th>
                                       <th>Action</th>
                                   </tr>

                                   @foreach($students as $key => $student)
                               <tr>
                                   <form action="{{ route('subject.student') }}" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{$student->student->id}}">
                                       <td>{{$key+1}}</td>
                                   <td width="15%">{{$student->student->name}}</td>
                                   <td width="15%%">
                                       @if($student->studentSubject->count() > 0)
                                       @foreach($student->studentSubject as $subject)
                                                <select name="subjects[]" id="" class="form-control mb-1">
                                                    @foreach($subjects as $key => $sb)
                                                        <option value="{{$sb->id}}"
                                                            {{$subject->subject_id == $sb->id ? 'selected' : ''}}
                                                        >{{$sb->name}}</option>
                                                    @endforeach
                                                </select>
                                        @endforeach
                                        @endif
                                   </td>
                                   <td>selective</td>
                                   <td>optional</td>
                                   <td>
                                       <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                   </td>
                                   </form>
                               </tr>

                                   @endforeach
                           </table>
                           </div>
                        </div>
                    @else
                        <p>No Record Founds :) </p>
                    @endif
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
        $("#sub").change(function(){
            var subject = $("#sub").val();
            $(".sub").val(subject);
        })
    </script>
@stop
