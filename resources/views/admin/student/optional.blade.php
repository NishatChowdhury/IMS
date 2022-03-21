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
                            <div class="col-6">
                                <div class="form-group">
                                    <lable>Class Name</lable>
                                    <select name="class_id" class="form-control" id="">
                                        @foreach($classes as $cs)
                                            <option value="{{$cs->id}}">{{$cs->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <lable>Subject Type</lable>
                                    <select name="subject_type" class="form-control" id="">
                                        <option value="1">Compulsory</option>
                                        <option value="2">Optional</option>
                                        <option value="3">Selective</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-block btn-dark">Assign Subject</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                    @if($students)
                        <div class="card-body">
                           <table class="table-striped table table-sm table-hover">

                                   @foreach($students as $key => $student)
                               <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$student->student->name}}</td>


                                       @foreach($student->studentSubject as $subject)
                                            <td>{{$subject->subject->name}}</td>
                                        @endforeach


{{--                                   @for($x = 0; $x <= $student->student_subject->c; $x++)--}}
{{--                                            <td>--}}
{{--                                                <select name="subjects[]" id="">--}}
{{--                                                @foreach($subjects as $key => $sb)--}}
{{--                                                    <option value="{{$sb->id}}"--}}
{{--                                                        {{$sb->type == 1 ? 'selected' : ''}}--}}
{{--                                                    >{{$sb->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                                </select>--}}
{{--                                            </td>--}}
{{--                                   @endfor--}}
                               </tr>

                                   @endforeach
                           </table>
                        </div>
                    @else
                        <p>No Record Founds</p>
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
