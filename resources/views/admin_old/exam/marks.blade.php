@extends('layouts.fixed')

@section('title','Student List')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Enter Marks')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Students')}}</li>
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
                    <div class="card-header">
                        <h3 class="card-title">
                            <span style="padding-right: 10px;"><i class="fas fa-user-graduate" style="border-radius: 50%; padding: 15px; background: #3d807a;"></i></span>

                            <span>
                                {{ $examSchedule->academicClass->academicClasses->name ?? '' }}
                                {{ $examSchedule->academicClass->section->name ?? '' }}
                                {{ $examSchedule->academicClass->group->name ?? '' }}
                            </span>|
                            <span>
                                {{ $examSchedule->exam->name ?? '' }}
                            </span>|
                            <span>
                                {{ $examSchedule->subject->name ?? '' }}
                            </span>
                        </h3>
                        <div class="card-tools">

                            {{--                            <a href="{{route('student.add')}}" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>--}}
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> {{ __('CSV')}}</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    {{ Form::open(['action'=>'Backend\MarkController@store','method'=>'post']) }}
                    {{--                    {{ Form::hidden('session_id',$schedule->session_id) }}--}}
                    {{--                    {{ Form::hidden('class_id',$schedule->class_id) }}--}}
{{--                    {{ $schedule->academic_class_id }}--}}
{{--                    {{ Form::hidden('academic_class_id',$schedule->academic_class_id) }}--}}
                    <input type="hidden" name="academic_class_id" value="{{ $examSchedule->academic_class_id }}">
                    {{ Form::hidden('exam_id',$examSchedule->exam_id) }}
                    {{ Form::hidden('subject_id',$examSchedule->subject_id) }}
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{ __('SL')}}</th>
                                <th>{{ __('Id')}}</th>
                                <th>{{ __('Roll')}}</th>
                                <th>{{ __('Student')}}</th>
                                <th>{{ __('Full Marks')}}</th>
                                <th>{{ __('Objective')}}</th>
                                <th>{{ __('Written')}}</th>
                                <th>{{ __('Practical')}}</th>
                                <th>{{ __('Viva')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <input type="hidden" id="objectiveFull" value="{{  $examSchedule->objective_full }}">
                                    <input type="hidden" id="writtenFull" value="{{  $examSchedule->written_full  }}">
                                    <input type="hidden" id="practicalFull" value="{{ $examSchedule->practical_full  }}">

                            @php $x = 1 @endphp
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>
                                        {{ Form::hidden('student_id[]',$table == 'students' ? $student->id : $student->student_id) }}
                                        {{ $table == 'marks' ? $student->studentInfo->student->studentId : $student->student->studentId }}
                                    </td>
                                    <td>{{ $table == 'marks' ? $student->studentInfo->rank : $student->rank }}</td>
                                    <td>{{ $table == 'marks' ? $student->studentInfo->student->name : $student->student->name }}</td>
                                    <td>100 </td>

                                    <td>
                                        {{ Form::number('objective[]',$student->objective ?? null,['class'=>'form-control objective']) }}
                                    </td>
                                    <td>{{ Form::number('written[]',$student->written ?? null,['class'=>'form-control writtenInput']) }}</td>
                                    <td>{{ Form::number('practical[]',$student->practical ?? null,['class'=>'form-control practical']) }}</td>
                                    <td>{{ Form::number('viva[]',$student->viva ?? null,['class'=>'form-control']) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{ Form::submit('Save Mark',['class'=>'btn btn-primary form-control']) }}
                        {{--                        {{ $students->appends(Request::except('page'))->links() }}--}}
                    </div>
                {{ Form::close() }}
                <!-- /.card-body -->
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
        $('.objective').keyup(function(){
            let marks = $(this).val();
            let fullMarks = $('#objectiveFull').val();
            if(fullMarks <= marks){
                alert("Objective Marks Can't biger then " + fullMarks);
                // $(this).val(0)
            }
        });
        $('.writtenInput').keyup(function(){
            let marks = $(this).val();
            let fullMarks = $('#writtenFull').val();
            if( fullMarks <= marks){
                alert("Written Marks Can't biger then " + fullMarks);
                // $(this).val(0)
            }
        });
        $('.practical').keyup(function(){
            let marks = $(this).val();
            let fullMarks = $('#practicalFull').val();
            if( fullMarks <= marks){
                alert("Practical Marks Can't biger then " + fullMarks);
                // $(this).val(0)
            }
        });


// writtenFull
// practicalFull
    </script>
@endsection
