@extends('layouts.fixed')

@section('title', 'Fee Collection')

@section('style')
    <style>
        @media print {
            .no_print {
                display: none;
            }
        }

    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Collection') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Collect Fees') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no_print ">
        <div class="container-fluid">
            {{-- start --}}
            <div class="col-lg-12 col-sm-8 col-md-8 col-xs-12 ">
                <div class="card card-primary card-outline">
                    <div class="card-body" style="padding-bottom:0">
                        <form method="get" action="{{ route('report.generate') }}">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>From</label>
                                    <input type="date" name="from"
                                        @if (isset($from)) value="{{ $from }}" @endif
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>To</label>
                                    <input type="date" name="to"
                                        @if (isset($to)) value="{{ $to }}" @endif
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Academic Class</label>
                                    <select name="academic_class" id="" class="form-control">
                                        <option value="">Select class </option>
                                        @foreach ($academic_class as $key => $class)
                                            <option value="{{ $class->id }}">{{ $class->classes->name }}
                                                {{ $class->section->name ?? '' }} {{ $class->group->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px; margin-right:0px;padding-right: 0px;">
                                    <button type="submit" class="btn btn-info btn-md btn-block" style="padding-left:8px;"><i
                                            class="fa fa-search"></i>&nbsp;Search</button>
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <button class="btn btn-warning btn-md btn-block"
                                        onclick="window.print(); return false;"><i
                                            class="fa fa-print"></i>&nbsp;Print</button>
                                </div>
{{--                                <div class="form-group col-md-1" style="margin-top: 30px">--}}
{{--                                    <a href="{{ route('pdf.dateWiseReport') }}" target="_blank" class="btn btn-success btn-md btn-block"><i--}}
{{--                                            class="fa fa-file-pdf"></i>&nbsp;Pdf</a>--}}
{{--                                </div>--}}

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>{{-- end --}}
    </section>

    @if (isset($stupays))


        <section class="content mt-4">
            <div class="container-fluid">

                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Date Wise Payment Report</h3>
                                <h5 class="mb-4">{{ request()->from }}
                                    {{ request()->to ? 'To ' . request()->to : '' }}</h5>
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>StudentID</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>mobile</th>
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($stupays as $pay)
                                        <tr>
                                            <td>{{ $pay->date->format('Y-m-d') }}</td>
                                            <td>{{ $pay->academics->student->studentId ?? '' }}</td>
                                            <td>{{ $pay->academics->student->name ?? '' }}</td>
                                            <td>{{ $pay->academics->classes->name ?? '' }}</td>
                                            <td>{{ $pay->academics->student->mobile ?? '' }}</td>
                                            <td>{{ $pay->amount }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center text-danger">
                                            <h5>No data found !!</h5>
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif



@stop
