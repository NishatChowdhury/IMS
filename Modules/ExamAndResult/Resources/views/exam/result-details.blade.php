@extends('examandresult::layouts.master')

@section('title', 'Exam Mgmt | Result Details')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Result Details')}}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('/assets/img/logos/') }}/{{ siteConfig('logo') }}" alt="" style="width: 100px;height:100px">
                                    <h1>{{ siteConfig('name') }}</h1>
                                    <p>{{ siteConfig('address') }}</p>
                                </div>
                            </div>
                            <table id="" class="table">
                                <tr>

                                    <th>{{ __('Student\'s Name')}} : </th>
                                    <td>{{ $result->studentAcademic->student->name ?? '' }}</td>
                                    <th>{{ __('Exam Name')}} : </th>
                                    <td>{{ $result->exam->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>StudentID : </th>
                                    <td>{{ $result->studentAcademic->student->studentId ?? ''}}</td>
                                    <th>Date : </th>
                                    <td>{{ $result->exam->start }} - {{ $result->exam->end }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Class')}} :</th>
                                    <td>{{ $result->studentAcademic->classes->name ? $result->studentAcademic->classes->name : ''  }}</td>
                                    <th>{{ __('Grade')}} : </th>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Current Rank')}} :</th>
                                    <td>{{ $result->studentAcademic->rank }}</td>
                                    <th>{{ __('Grade Point')}} :</th>
                                    <td>{{ $result->gpa }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Result Rank')}} :</th>
                                    <td>{{ $result->rank }}</td>
                                    <th>{{ __('Total Marks')}} :</th>
                                    <td>{{ $result->total_mark }}</td>
                                </tr>
                            </table>

                            <div style="float: right;" class="no-print">
                                <a href="javascript:window.print()" role="button" class="btn btn-success btn-sm" title="PRINT"><i class="fas fa-print"></i></a>
                                <a href="{{ url('c-p') }}/{{ $result->id }}" role="button" class="btn btn-danger btn-sm" title="Download PDF"><i class="fas fa-file-pdf" aria-hidden="true"></i></a>
                            </div>

                            <table id="" class="table table-bordered" style="margin-top: 60px;">
                                <thead>
                                <tr>
                                    <th>{{ __('Subject')}}</th>
                                    <th>{{ __('Code')}}</th>
                                    <th>{{ __('Exam Mark')}}</th>
                                    <th>{{ __('Result Mark')}}</th>
                                    <th>{{ __('Grade')}}</th>
                                    <th>{{ __('Grade point')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($marks as $mark)
                                    <tr>
                                        <td>{{ $mark->subject->name }}</td>
                                        <td>{{ $mark->subject->code }}</td>
                                        <td>{{ $mark->full_mark }}</td>
                                        <td>
                                            @if($mark->objective > 0)
                                                Objective: {{ $mark->objective }}<br>
                                            @endif
                                            @if($mark->written > 0)
                                                Written: {{ $mark->written }}<br>
                                            @endif
                                            @if($mark->practical > 0)
                                                Practical: {{ $mark->practical }}<br>
                                            @endif
                                            @if($mark->viva > 0)
                                                Viva: {{ $mark->viva }}
                                            @endif
                                        </td>
                                        <td>{{ $mark->grade }}</td>
                                        <td>{{ $mark->gpa }}</td>
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

@stop
