@extends('examandresult::layouts.master')

@section('title','Exam Management |Tabulation Sheet')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Tabulation Sheet') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam Management') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Tabulation Sheet') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no-print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['route'=>['exam.tabulation',2],'role'=>'form','method'=>'get']) }}
                        <input type="hidden" name="exam_id" value="{{ $examID }}">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="class">{{ __('Class') }}</label>
                                    <div class="input-group">
                                        <select name="class_id" id="class" class="form-control">
                                            @foreach($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">{{ $class->academicClasses->name ?? '' }}&nbsp;{{ $class->group->name ?? '' }}{{ $class->section->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->
    @if($results)

        <section class="content" >
            <div class="row">
               <div class="col-12 text-right p-5">
                  <a href="javascript:window.print()" role="button" class="btn btn-success btn-sm" title="PRINT"><i class="fas fa-print"></i></a>
               </div>
           </div>
            <div class="container-fluid" id="print_page">

                <div class="card-body">
                    <div class="col">
                        <div class="scl-dec">
                            <div class="row">
                                <div class="col-4">
                                    <div class="logo">
                                        <img src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}" alt="logo" height="100">
                                    </div>
                                </div>
                                <div class="col-4 col-offset-2">
                                    <div class="scl-name text-center">
                                        <h2><b>{{ siteConfig('name') }}</b></h2>
                                        <p>{{ siteConfig('address') }}</p>
                                        <h6> <b>{{ __('Exam Name :') }}</b>{{ $results->first()->exam->name }}</h6>
                                        <h6> <b>{{ __('Class Name :') }}</b>{{ $results->first()->studentAcademic->classes->name ?? ''  }}-{{ $results->first()->studentAcademic->group->name ?? ''  }}-{{ $results->first()->studentAcademic->section->name ?? ''  }}</h6>
                                        <h3>{{ __('Tabulation Sheet') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th><b>{{ __('Student ID') }}</b></th>
                                        <th><b>{{ __('Student Name') }}</b></th>
                                        <th><b>{{ __('Roll No') }}</b></th>
                                        @foreach($subjects as $subject)
                                            <td><b>{{ $subject->subject->short_name }}</b></td>
                                        @endforeach
                                        <th><b>{{ __('Total Mark') }}</b></th>
                                        <th><b>{{ __('GPA') }}</b></th>
                                        <th><b>{{ __('Grade') }}</b></th>
                                        <th><b>{{ __('No. Of Fails') }}</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{ $result->studentAcademic->student->studentId ?? ''}}</td>
                                            <td>{{ $result->studentAcademic->student->name ?? '' }}</td>
                                            <td>{{ $result->studentAcademic->rank ?? '' }}</td>
                                            @foreach($subjects as $subject)
                                                @php
                                                   $mark = \App\Models\Backend\Mark::query()
                                                    ->where('academic_class_id',$result->studentAcademic->academic_class_id)
                                                    ->where('exam_id',$result->exam_id)
                                                    ->where('subject_id',$subject->subject_id)
                                                    ->where('student_id',$result->student_academic_id)
                                                    ->first()
                                                    ->total_mark ?? ''
                                                @endphp
                                                
                                                @if($mark < 25)
                                                    <td style="color:red">
                                                        <b>
                                                        {{ \App\Models\Backend\Mark::query()
                                                        ->where('academic_class_id',$result->studentAcademic->academic_class_id)
                                                        ->where('exam_id',$result->exam_id)
                                                        ->where('subject_id',$subject->subject_id)
                                                        ->where('student_id',$result->student_academic_id)
                                                        ->first()
                                                        ->total_mark ?? '' }}
                                                        </b>
                                                    </td>
                                                @else
                                                    <td>
                                                        {{ \App\Models\Backend\Mark::query()
                                                        ->where('academic_class_id',$result->studentAcademic->academic_class_id)
                                                        ->where('exam_id',$result->exam_id)
                                                        ->where('subject_id',$subject->subject_id)
                                                        ->where('student_id',$result->student_academic_id)
                                                        ->first()
                                                        ->total_mark ?? '' }}
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>{{ $result->total_mark  ?? ''}}</td>
                                            <td><b>{{ $result->gpa ?? '' }}</b></td>
                                            <td>{{ $result->grade ?? '' }}</td>
                                            <td>
                                                {{ \App\Models\Backend\Mark::query()
                                                ->where('academic_class_id',$result->studentAcademic->academic_class_id)
                                                ->where('exam_id',$result->exam_id)
                                                ->where('student_id',$result->student_academic_id)
                                                ->where('grade','F')
                                                ->select('grade')
                                                ->get()
                                                ->count()
                                                }}
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

    @endif


@stop

@section('script')
    <script>
        function printPage(){
            var divToPrint =document.getElementById('print_page');

            console.log(divToPrint)
            var newWin = window.open('','Print-Window');
            //
            newWin.document.open();
            //
            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            //
            newWin.document.close();
            //
            // setTimeout(function(){newWin.close();},10);
        }
    </script>
@endsection
