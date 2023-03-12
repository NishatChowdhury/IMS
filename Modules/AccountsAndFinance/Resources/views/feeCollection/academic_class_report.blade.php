@extends('accountsandfinance::layouts.master')

@section('title', 'Fee Collection')
@section('style')
    <style>
        @media print {
            .no_print {
                display: none;
            }
        }
        /*span.showDiscountMsg {*/
        /*    background: #90abb1;*/
        /*    padding: 2px 5px 2px 4px;*/
        /*    border-radius: 16px;*/
        /*    font-size: 11px;*/
        /*    font-weight: 900;*/
        /*    cursor: pointer;*/
        /*}*/

    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Monthly Wise Class Report') }}</h1>
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
                        <form method="get" action="{{ route('report.academic_class') }}">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Academic Class  </label>
                                    <select name="academic_class" id="" class=" form-control  " required>
                                        <option value="">Select class </option>
                                        @foreach ($academic_class as $class)
                                            <option value="{{ $class->id }}">{{ $class->classes->name }}
                                                {{ $class->section->name ?? '' }} {{ $class->group->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Month</label>
                                    {{ Form::selectMonth('month_id', null, ['class' => 'form-control ', 'required']) }}
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Year</label>
                                    {{ Form::selectYear('year_id', date('Y'), date('Y') - 50, null, ['class' => 'form-control ', 'required']) }}
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <button type="submit" class="btn btn-info btn-md btn-block"><i
                                            class="fa fa-search"></i>&nbsp</button>
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <button class="btn btn-warning btn-md btn-block"
                                        onclick="window.print(); return false;"><i
                                            class="fa fa-print"></i>&nbsp</button>
                                </div>
{{--                                <div class="form-group col-md-1" style="margin-top: 30px">--}}
{{--                                    <a href="{{ route('pdf.classReport') }}" target="_blank" id="pdfdown" class="btn btn-success btn-md btn-block"><i--}}
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

    @if (isset($students))
        {{-- {{ dd($students[0]->academics[0]->classes->name) }} --}}
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Class Report</h3>
                                <h5 class="mb-4">
                                    {{-- {{ request()->academic_class ? 'Class: ' . request()->academic_class : '' }}
                                    {{ request()->month_id ? date('F', mktime(0, 0, 0, request()->month_id, 10)) . ',' : '' }}
                                    {{ request()->year_id ? request()->year_id : '' }} --}}

                                    {{ $students[0]->academics[0]->classes->name ?? '' }}
                                    {{ $students[0]->academics[0]->section->name ?? '' }}
                                    {{ $students[0]->academics[0]->group->name ?? '' }}
                                    {{ request()->month_id ? date('F', mktime(0, 0, 0, request()->month_id, 10)) . ' - ' : '' }}
                                    {{ request()->year_id ? request()->year_id : '' }}
                                </h5>

                            </div>
                            <table class="table table-bordered  table-sm">
                                <thead>
                                    <tr>
                                        <th>StudentID</th>
                                        <th>Name</th>
                                        <th class="text-right">Discount</th>
                                        <th class="text-right">Current Fee Due</th>
                                        <th class="text-right">Current Transport Due</th>
                                        <th class="text-right">Paid</th>
                                    </tr>
                                </thead>
                                <tbody> {{-- dd($students) --}}

                                <?php
                                    $total = 0;
                                ?>
                                    @forelse ($students as $student)

                                        <tr>
                                            <td>{{ $student->studentId }}</td>
                                            <td>{{ $student->name }}</td>
                                            @php
                                                $due = $student->feeSetupStudents->sum('amount');
                                                $paid = $student->academics[0]->payments->sum('amount');
                                                $currentDue = $due - $paid;
                                                $discount = $student->academics[0]->payments->sum('discount');
                                                $total += $paid;
                                            @endphp
                                            <td class="text-right">
                                                @if($discount > 0)
                                                    <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="
                                                                @foreach($student->academics[0]->payments as $rr)
                                                                    {{ $rr->remarks ? $rr->remarks : 'Nothing'}}
                                                                @endforeach
                                                            "></i>
                                                @endif
                                                {{ $discount }}
                                            </td>
                                            <td class="text-right">{{ $currentDue }}</td>
                                            <td class="text-right">{{ $student->studentAcademic->transport->sum('amount') ?? 00.00 - $student->studentAcademic->transportPayment->sum('amount') ?? 00.00}}</td>
                                            <td class="text-right">{{ number_format($paid, 2) }}</td>
                                        </tr>

                                    @empty
                                        <td colspan="6" class="text-center text-danger">
                                            <h5>No data found !!</h5>
                                        </td>
                                    @endforelse
                                    <tr>
                                        <td colspan="5">
                                            <b>Total</b>
                                        </td>
                                        <td class="text-right">
                                           <b> {{ number_format(intval($total), 2) }} TK</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif

@stop

@section('plugin')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
@stop
@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $('.select2').select2();
    </script>
@stop
