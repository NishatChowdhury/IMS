@extends('layouts.fixed')

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
                            <table id="" class="table table-sm">
                                <tr>
                                    <th>{{ __('Student\'s Name')}} : </th>
                                    <td>{{ $result->student->name ?? '' }}</td>
                                    <th>{{ __('Grade')}} : </th>
                                    <td>{{ $result->grade }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('StudentID')}} : </th>
                                    <td>{{ $result->student->studentId }}</td>
                                    <th>{{ __('Grade Point')}} :</th>
                                    <td>{{ $result->gpa }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Class')}} :</th>
                                    <td>{{ $result->academicClass->name ?? '' }} - {{ $result->student->section->name ?? '' }}{{ $result->student->group->name ?? '' }}</td>
                                    <th>{{ __('Total Marks')}} :</th>
                                    <td>{{ number_format($result->total_mark,2) }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Current Rank')}} :</th>
                                    <td>{{ $result->student->rank }}</td>
                                    <th>{{ __('Result Rank')}} :</th>
                                    <td>{{ $result->rank }}</td>
                                </tr>
                            </table>

                            <div style="float: right;" class="no-print">
                                <a href="javascript:window.print()" role="button" class="btn btn-success btn-sm" title="PRINT"><i class="fas fa-print"></i></a>
                                <a href="#" role="button" class="btn btn-danger btn-sm" title="Download PDF"><i class="fas fa-file-pdf" aria-hidden="true"></i></a>
                            </div>

                            <table id="" class="table table-bordered table-sm" style="margin-top: 60px;">
                                <thead>
                                <tr>
                                    <th>{{ __('Subject')}}</th>
                                    <th>{{ __('Code')}}</th>
                                    <th>{{ __('Exam Mark')}}</th>
                                    <th>{{ __('Result Mark')}}</th>
                                    {{--<th>Description</th>--}}
                                    <th>{{ __('Grade')}}</th>
                                    <th>{{ __('Grade point')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($marks as $mark)
                                <tr>
                                    <td>{{ $mark->subject->name ?? '' }}</td>
                                    <td>{{ $mark->subject->code ?? '' }}</td>
                                    <td>{{ $mark->full_mark }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                @if($mark->objective > 0)
                                                {{ __('Objective')}}: <b>{{ $mark->objective }}</b><br>
                                                @endif
                                                @if($mark->written > 0)
                                                {{ __('Written')}}: <b>{{ $mark->written }}</b><br>
                                                @endif
                                                @if($mark->practical > 0)
                                                {{ __('Practical')}}: <b>{{ $mark->practical }}</b><br>
                                                @endif
                                                @if($mark->viva > 0)
                                                {{ __('Viva')}}: <b>{{ $mark->viva }}</b>
                                                @endif
                                            </div>
                                            <div class="col" style="border-left:solid 1px #333333">
                                                {{ __('Total')}}: <b>{{ $mark->objective + $mark->written + $mark->practical + $mark->viva }}</b>
                                            </div>
                                        </div>
                                    </td>
                                    {{--<td></td>--}}
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
