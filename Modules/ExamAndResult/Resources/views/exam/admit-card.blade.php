@extends('examandresult::layouts.master')

@section('title', 'Exam Mgmt | Admit Card')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Admit Card') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Exam Mgmt') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Admit Card') }}</li>
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
                    <div class="card">
                        <!-- form start -->
                        {{ Form::open(['route' => ['exam.admitCard', basename(request()->path())], 'method' => 'get', 'role' => 'form']) }}
                        <div class="card-body">
                            <div class="form-row">
                                <input type="hidden" name="exam_id" value="{{ basename(request()->path()) }}">
                                <div class="col">
                                    <label for="">{{ __('Student ID') }}</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId', null, ['class' => 'form-control', 'placeholder' => 'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">{{ __('Group') }}</label>
                                    <div class="input-group">
                                        <select name="academic_class" class="form-control">
                                            @foreach ($repository->academicClasses() as $class)
                                                <option value="{{ $class->id }}">
                                                    {{ $class->academicClasses->name ?? '' }}&nbsp;
                                                    {{ $class->section->name ?? '' }}&nbsp;
                                                    {{ $class->group->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <label for=""></label>
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @foreach ($students as $studentAcademic)
                            <div class="card-body page-break">
                                <div class="row" style="padding-bottom: 50px;">
                                    <div class="col-md-2">
                                        <div class="logo" style="float: left">
                                            <img style="width: 100px; height: auto;"
                                                src="{{ asset('assets/img/logos') }}/{{ siteConfig('logo') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="scl-dev text-center">
                                            <h4 style="color: #879BE8;">{{ siteConfig('name') }}</h4>
                                            <p>{{ siteConfig('address') }}</p>
                                        </div>
                                        <div class="admit-dec" style="text-align: center; color: #00cc66;">
                                            <h3> <span style="text-transform: uppercase;">{{ __(' Admit Card') }} </span>
                                                <br>
                                                {{ $exam->name }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="stuimg" style="float: right">
                                            <img style="width: 100px; height: auto;"
                                                src="{{ asset('assets/img/students') }}/{{ $studentAcademic->studentId }}.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stu-dec">

                                        </div>
                                    </div>
                                </div>
                                <table id="example2" class="table table-bordered">
                                    <tr>
                                        <th>{{ __('Student\'s Name') }} : </th>
                                        <td>{{ $studentAcademic->student->name ?? '' }}</td>
                                        <th>StudentID : </th>
                                        <td>{{ $studentAcademic->student->studentId ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Class :</th>
                                        <td>
                                            {{ $studentAcademic->classes->name ?? '' }}
                                            {{ $studentAcademic->section->name ?? '' }}
                                            {{ $studentAcademic->group->name ?? '' }}</td>
                                        <th>Rank :</th>
                                        <td> {{ $studentAcademic->rank }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Father\'s Name') }} :</th>
                                        <td>{{ $studentAcademic->student->father->f_name ?? '' }}</td>
                                        <th>{{ __('Mother\'s Name') }} : </th>
                                        <td>{{ $studentAcademic->student->mother->m_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Room No') }} :</th>
                                        <td>
                                            @foreach ($exam->rooms as $room)
                                                @if ($studentAcademic->rank >= $room->roll_form && $studentAcademic->rank <= $room->roll_to)
                                                    {{ $room->room }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <th>{{ __('Seat No') }} :</th>
                                        <td>{{ $studentAcademic->student->studentId ?? '' }}</td>
                                    </tr>
                                </table>

                                <table id="example2" class="table table-bordered table-hover table-sm"
                                    style="margin-top: 20px;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Subjects') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Start Time') }}</th>
                                            <th>{{ __('End Time') }}</th>
                                            <th>{{ __('Exam Mark') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->subject->name }}</td>
                                                <td>{{ $schedule->date }}</td>
                                                <td>{{ $schedule->start }}</td>
                                                <td>{{ $schedule->end }}</td>
                                                <td>{{ $schedule->objective_full + $schedule->written_full + $schedule->practical_full + $schedule->viva_full }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col">
                                            <p>{{ __('বিঃদ্রঃ অনিবার্য কারণ বশতঃ পরীক্ষার সময়সূচী পরিবর্তন সাধনের ব্যাপারে
                                                                                            কর্তৃপক্ষের সিদ্ধান্ত চুড়ান্ত।') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="sign" style="text-align: center;padding-bottom:20px">
                                                <img src="{{ asset('assets/img/signature/signature.png') }}" width="100"
                                                    height="50" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div style="border-top: 1px solid #333;text-align: center;font-weight: bold;">
                                                {{ __(' Principal Signature') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop
