@extends('layouts.fixed')

@section('title', 'Fee Collection')

@section('content')
    @section('content')
        @section('style')
            <style>
                .customInWidth{
                    width: 80%;
                    float: right;
                    margin-bottom: 10px;
                }

            </style>
        @endsection
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Collections</h1>
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
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 offset-3">
                        <div class="mx-auto pull-right">
                            <form action="{{ url('admin/fee/fee-collection/view') }}" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search By Student ID"
                                           id="term">
                                    <span class="input-group-btn mr-2">
                                    <button class="btn btn-info" type="submit" title="Search By Student ID">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                    {{-- <a href="{{ url('admin/fee/fee-collection/view') }}" class=""> --}}
                                    <a href="{{ request()->fullUrl() }}" class="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group ">
                                            <li class="list-group-item"><span>Student Id:</span>&nbsp;
                                                {{ $student->studentId }}
                                            </li>
                                            <li class="list-group-item"> <span>Student
                                                Name:</span>&nbsp;{{ $student->name }}
                                            </li>
                                            <li class="list-group-item"><span>Father
                                                Name:</span>&nbsp;{{ $student->father->f_name }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group ">
                                            <li class="list-group-item">
                                                <span>Class:</span>&nbsp;{{ $student->academics->first()->classes->name ?? 'N\A' }} {{ $student->academics->first()->group->name ?? 'N\A' }}
                                            </li>
                                            <li class="list-group-item">
                                                <span>Section:</span>&nbsp;{{ $student->academics->first()->section->name ?? 'N\A'}}
                                            </li>
                                            <li class="list-group-item">
                                                <span>Roll:</span>&nbsp;{{ $student->academics->first()->rank }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--            <div class="row mt-4 mb-4">--}}
                {{--                <div class="col-md-12">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="card-header">--}}
                {{--                            <h6>Academic Fee Collection</h6>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body">--}}
                {{--                            {{ Form::open(['url' => 'admin/fee/fee-collection/store', 'method' => 'POST', 'class' => 'form-horizontal']) }}--}}
                {{--                            <div class="form-row">--}}
                {{--                                {{ Form::hidden('student_id', $student->id, ['class' => 'form-control', 'placeholder' => '']) }}--}}

                {{--                                <div class="col">--}}
                {{--                                    <label for="">{{ __('Date') }}</label> <i class="text-danger">*</i>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::date('date', null, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : null),'placeholder' => 'Select Date']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="col">--}}
                {{--                                    <label for="">{{ __('Due Balance ') }}</label>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::text('balance', $totalDue, ['class' => 'form-control', 'readonly']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="col">--}}
                {{--                                    <label for="">Pay Method</label>  <i class="text-danger">*</i>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::select('payment_method', $payment_method, $payment_method, ['class' => 'form-control']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <div class="col">--}}
                {{--                                    <label for="">{{ __('Paid Amount') }}</label>  <i class="text-danger">*</i>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::text('amount', null, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : null),'placeholder' => 'Paid']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}


                {{--                                <div class="col">--}}
                {{--                                    <label for="">{{ __('Discount') }}</label>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::text('discount', null, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : null),'placeholder' => 'discount']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <div class="col">--}}
                {{--                                    <label for="">{{ __('Remarks') }}</label>--}}
                {{--                                    <div class="input-group">--}}
                {{--                                        {{ Form::text('remarks', null, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : null),'placeholder' => 'Comment']) }}--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}


                {{--                                <div class="button text-center m-4">--}}
                {{--                                    <button style="margin-top: 7px" type="submit"--}}
                {{--                                        class="btn btn-primary">{{ __('Submit') }}</button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            {{ Form::close() }}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}

                <div class="row mt-4 mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ Form::open(['url' => 'admin/fee/fee-collection/store', 'method' => 'POST', 'class' => 'form-horizontal']) }}

                                {{ Form::hidden('student_id', $student->id, ['class' => 'form-control', 'placeholder' => '']) }}
                                <div class="row">
                                    <div class="col-6">
                                        <table width="100%" class="text-right">
                                            <tr>
                                                <td>Date</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="date" class="form-control customInWidth" name="date"  style="width: 80%" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tuition Fee Balance</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="balance" value="{{ $totalDue }}" class="form-control customInWidth text-right" placeholder="00.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transport Balance</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="transportBalance" value="{{ $transportAmount - $paymentTransportAmount}}" class="form-control text-right customInWidth" readonly placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Payable</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control customInWidth text-right" value="{{  $totalDue + ($transportAmount - $paymentTransportAmount)  }}" readonly placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table width="100%" class="text-right">
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>
                                                    <div class="form-group">
                                                        {{--                                                <select name="" id="" class="form-control customInWidth">--}}
                                                        {{ Form::select('payment_method', $payment_method, $payment_method, ['class' => 'form-control customInWidth']) }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tuition Fee </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="amount" id="am" class="form-control customInWidth text-right" placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transport </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="transportAmount" id="tAm" class="form-control text-right customInWidth"  placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Discount </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="discount" id="dis" class="form-control text-right customInWidth"  placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Remarks </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="remarks" class="form-control text-right customInWidth"  placeholder="Optional Remarks">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Payable</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control customInWidth text-right" id="playA" readonly placeholder="00.00">
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-dark btn-sm">Payment</button>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Previous Payment</h5>
                                <table class="table table-bordered table-striped table-sm">
                                    <thead class="thead-white">
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Method') }}</th>
                                        <th class="text-right">{{ __('Amount') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($previousPayment as $value)
                                        <tr>
                                            <td>{{ $value->date->format('Y-m-d') }}</td>
                                            <td>{{ $value->payment_methods->name ?? 'Undifined' }}</td>
                                            <td class="text-right">{{ number_format($value->amount, 2, '.', ',') }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="3">
                                            <h5 class="text-center text-danger"> No data found!!</h5>
                                        </td>
                                    @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Month wise Payment</h5>
                                <table class="table table-bordered table-striped table-sm">
                                    <thead class="thead-white">
                                    <tr>
                                        <th>{{ __('Month') }}</th>
                                        <th class="text-right">{{ __('Amount') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($paidAmount as $value)
                                        <tr>
                                            <td> {{ $value->month }}, &nbsp;{{ $value->year }}</td>
                                            <td class="text-right"> {{ number_format($value->amount, 2, '.', ',') }}</td>
                                        </tr>
                                    @empty
                                        <td colspan="2">
                                            <h5 class="text-center text-danger"> No data found!!</h5>
                                        </td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </section>


    @stop

    @section('script')
        <script>

            //         am
            // tAm
            // dis
            // playA

            let amount = 0;
            let transport = 0;
            let discount = 0;
            let playA = 0;
            $('#am').keyup(function(){
                amount = $(this).val();
                amount = amount > 0 ? amount : 0;
                getTotal();
            });
            $('#tAm').keyup(function(){
                transport = $(this).val();
                transport = transport > 0 ? transport : 0;
                getTotal();
            });
            $('#dis').keyup(function(){
                discount = $(this).val();

                discount = discount > 0 ? discount : 0;
                getTotal();
            });

            function getTotal(){
                let total = parseFloat(amount) + parseFloat(transport);
                let disCOunt = total - parseFloat(discount) ?? 0;
                $('#playA').val(disCOunt);
            }
            getTotal();


        </script>
    @stop
