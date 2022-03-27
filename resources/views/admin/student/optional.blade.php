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
                                            <option value="{{$cs->id}}">{{$cs->classes->name}} {{$cs->group_id ? '('. $cs->group->name .')' : ''}}</option>
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
                            <h6>Class {{ $className->classes->name }}{{$className->group_id ? '('. $cs->group->name .')' : ''}} All Students Information</h6>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                               <table class="table-striped table table-sm table-hover">

                                   @foreach($students as $key => $student)
                               <tr>
                                   <form action="{{ route('subject.student') }}" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{$student->student->id}}">
                                       <td>{{$key+1}}</td>
                                   <td>{{$student->student->name}}</td>

                                       @if($student->studentSubject->count() > 0)
                                       @foreach($student->studentSubject as $subject)
                                            <td>
                                                <select name="subjects[]" id="" class="form-control">
                                                    @foreach($subjects as $key => $sb)
                                                        <option value="{{$sb->id}}"
                                                            {{$subject->subject_id == $sb->id ? 'selected' : ''}}
                                                        >{{$sb->name}}</option>
                                                    @endforeach
                                                </select>
                                                </td>
                                        @endforeach
                                       @else
                                           @foreach( $notAssignsubjects as $srp)
                                           <td>
                                                <select name="subjects[]" id="" class="form-control">
                                                    <option>--select--</option>
                                                    @foreach($academicsubjects as $key => $sb)
                                                        <option value="{{$sb->subject->id}}">{{$sb->subject->name}}</option>
                                                    @endforeach
                                                </select>
                                           </td>
                                           @endforeach

                                       @endif
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
