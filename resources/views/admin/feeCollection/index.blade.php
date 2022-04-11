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
                    <h1>Fee Collection</h1>
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
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row no_print">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <h5 class="text-center" style="background-color: rgb(45 136 151);padding:10px;color:white">
                            <b>Search by Student ID for Collect Fees</b></h3>
                            <div class="mx-auto pull-right">
                                <form action="{{ url('admin/fee/fee-collection/view') }}" method="GET" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control mr-2" name="term" placeholder="Ex: S01"
                                            id="term">
                                        <span class="input-group-btn mr-2 ">
                                            <button class="btn btn-info" type="submit" title="Search By Student ID">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        @if (session()->has('receipt'))
                                            <span class="input-group-btn mr-2 ">
                                                <button class="btn btn-warning " onclick="window.print(); return false;"><i
                                                        class="fa fa-print"></i>&nbsp;Print</button>
                                            </span>
                                            <span class="input-group-btn mr-2 ">
                                                <a href="{{ url()->previous() }}" class="btn btn-success "><i
                                                        class="fa fa-arrow-left"></i>&nbsp;Back</a>
                                            </span>
                                        @endif
                                        <a href="{{ request()->fullUrl() }}" class=" ">
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
            </div>
        </div>
    </section>

    @if (session()->has('receipt'))
        @php
            $receipt = session()->get('receipt');
        @endphp
        <section class="content ">
            <div class="container-fluid">
                <div class="row m-5">
                    <div class="col-md-12">
                        <div class="card" style="border: 1px solid black">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="text-center"><u>Money Receit</u></h4>
                                        <h4 class="text-center">
                                            {{-- </i> Web Point Ltd.<br> --}}
                                            {{-- <span>Money Receit</span> --}}

                                        </h4>
                                        <div>
                                            <strong class="float-left">Receipt No:
                                                #00{{ session()->get('spay')['id'] }}</strong>
                                            <b class="float-right">Date:
                                                {{ date('d-m-Y', strtotime(session()->get('spay')['date'])) }}
                                            </b><br>

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">

                                        <address>
                                            <strong>{{ $receipt[0]->fee_setup_students->student->name ?? '' }}</strong><br>
                                            <span>Father's Name:</span> Clinton<br>
                                            <span>Id:</span>
                                            {{ $receipt[0]->fee_setup_students->student->studentId ?? '' }}<br>
                                            <span>Phone No:</span>
                                            {{ $receipt[0]->fee_setup_students->student->mobile ?? '' }}<br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <span>Class:</span>
                                            {{ $receipt[0]->fee_setup_students->student->academics[0]->classes->name ?? '' }}<br>
                                            <span>Section:</span>{{ $receipt[0]->fee_setup_students->student->academics[0]->section->name ?? '' }}<br>
                                            <span>Group:</span>
                                            {{ $receipt[0]->fee_setup_students->student->academics[0]->group->name ?? '' }}<br>
                                            <span>Roll No:</span>
                                            {{ $receipt[0]->fee_setup_students->student->academics[0]->rank ?? '' }}<br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        {{-- <b>Date:</b> 03/04/2022<br> --}}
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($receipt as $key => $rcpt)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $rcpt->category->name }}</td>
                                                        <td>{{ $rcpt->paid }} /-</td>
                                                    </tr>
                                                    {{-- @php
                                                    $total += $rcpt->paid;
                                                @endphp --}}
                                                @endforeach
                                                <tr>
                                                    <td colspan="2">
                                                        <strong class="float-right">Paid =</strong>
                                                    </td>
                                                    <td>{{ session()->get('spay')['amount'] }}/-</td>
                                                </tr>
{{--                                                @if (session()->has(['discount']))--}}
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong class="float-right">discount =</strong>
                                                        </td>
                                                        <td>{{ session()->get('spay')['discount'] ?? 0.00 }}/-</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <strong class="float-right">Total =</strong>
                                                        </td>
                                                        <td>{{ session()->get('spay')['amount'] + session()->get('spay')['discount'] }}/-
                                                        </td>
                                                    </tr>
{{--                                                @endif--}}

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <!-- /.row -->

                                <div class="row text-center pt-5">


                                    <div class="col-md-6 float-right">
                                        -------------------------------- <br>
                                        Authorize Signature
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif
@stop
