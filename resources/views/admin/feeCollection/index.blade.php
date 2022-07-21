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
                    <h1>{{ __('Fee Collection')}}</h1>
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
                    <div class="card" style="margin: 1px;">
                        <h5 class="text-center" style="background-color: rgb(45 136 151);padding:10px;color:white">
                            <b>{{ __('Search by Student ID for Collect Fees')}}</b>
                        </h5>
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
                                                        class="fa fa-arrow-left"></i>&nbsp;{{ __('Back')}}</a>
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
       <?php
       $receipt = session()->get('receipt');
            $checkSP = session()->get('spay');


       ?>
        <section class="content ">
            <div class="container-fluid">
                <div class="row m-5">
                    <div class="col-md-12">
                        <div class="card" style="border: 1px solid black">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h2>{{ siteConfig('name') }}</h2>
                                        <h3 class="text-center"><u>Money Receit</u></h3>
                                        <div>
                                            <strong class="float-left">Receipt No:
                                                #00{{ session()->get('spay')['id'] ?? session()->get('trans')['id']}}</strong>
                                            <b class="float-right">Date:
                                                @if(session()->get('spay') != null)
                                                {{  date('d-m-Y', strtotime(session()->get('spay')['date'])) }}
                                                @else
                                                    <?php
                                                        $tD = session()->get('trans');
                                                    ?>
                                                     {{$tD->date }}
                                                @endif
                                            </b><br>

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                                        $data = session()->get('spay');
                                        $trans = session()->get('trans');
                                        if ($data != null){
                                          $stuId = $data['student_academic_id'];
                                        }else{
                                           $stuId =  $trans['student_academic_id'];
                                        }

                                          $studentAcademic = \App\Models\Backend\StudentAcademic::query()
                                                                                                    ->where('id', $stuId)
                                                                                                    ->with('student')
                                                                                                    ->first();

                                        $tranPay = \App\Models\TransportPayment::where('student_academic_id', $stuId)->sum('amount');
                                        $tranAm = \App\Models\Backend\Transport::where('student_academic_id', $stuId)->sum('amount');
                                        $stuPayment = \App\Models\Backend\StudentPayment::where('student_academic_id', $stuId)->sum('amount');
                                        $feeSetUpStudent = \App\Models\Backend\FeeSetupStudent::where('student_id', $studentAcademic->student->id)->sum('amount');

                                        ?>
                                        <address>
                                            <strong>{{ $studentAcademic->student->name ?? '' }}</strong><br>
                                            <span>Father's Name:</span> Clinton<br>
                                            <span>Id:</span>
                                            {{ $studentAcademic->student->studentId ?? '' }}<br>
                                            <span>Phone No:</span>
                                            {{ $studentAcademic->student->mobile ?? '' }}<br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <span>Class:</span>{{ $studentAcademic->classes->name ?? 'N/A'  }}<br>
                                            <span>Section:</span>{{ $studentAcademic->section->name ?? 'N/A'  }}<br>
                                            <span>Group:</span>{{ $studentAcademic->group->name ?? 'N/A'  }}<br>
                                            <span>Roll No:</span>{{ $studentAcademic->rank ?? 'N/A'  }}<br>
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
                                                    <th>Category</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                ?>
                                                @foreach ($receipt as $key => $rcpt)
                                                    <tr>
                                                        <td>{{ $rcpt->category->name }}</td>
                                                        <td class="text-right">{{ number_format($rcpt->paid, 2) }} /-</td>
                                                    </tr>

                                                     @php
                                                    $total += $rcpt->paid;
                                                @endphp
                                                @endforeach
                                                @if($trans != null)
                                                    <tr>
                                                        <td> Transport Cost </td>
                                                        <td class="text-right">{{ number_format($trans->amount, 2) }} /-</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td colspan="1">
                                                        <strong class="float-right">Paid =</strong>
                                                    </td>
                                                    @if($trans != null)
                                                        <td class="text-right">
                                                            <?php
                                                                if($data != null){
                                                                    $am1 =  number_format(session()->get('spay')['amount'], 2);
                                                                }else{
                                                                    $am1 = 0;
                                                                }
                                                            ?>

                                                            {{  $am1 + intVal($trans['amount'])}}/-
                                                        </td>
                                                    @else
                                                        <td class="text-right">{{ number_format(session()->get('spay')['amount'], 2) }}/-</td>
                                                    @endif
                                                </tr>
{{--                                                @if (session()->has(['discount']))--}}
                                                    @if($data != null)
                                                    <tr>
                                                        <td colspan="1">
                                                            <strong class="float-right">discount =</strong>
                                                        </td>
                                                        <td class="text-right">{{ number_format(session()->get('spay')['discount'], 2) ?? 0.00 }}/-</td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td colspan="1">
                                                            <strong class="float-right">Fee Due =</strong>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $feeSetUpStudent - $stuPayment}}
                                                            /-</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1">
                                                            <strong class="float-right">Transport Due =</strong>
                                                        </td>
                                                        <td class="text-right"> {{ $tranAm > $tranPay ? $tranAm - $tranPay : 0}} /-</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1">
                                                            <strong class="float-right">Total =</strong>
                                                        </td>
                                                        @if($trans != null)
                                                             <?php
                                                                if($data != null){
                                                                    $am =  number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2);
                                                                }else{
                                                                    $am = 0;
                                                                }
                                                            ?>
                                                        <td class="text-right">{{  $am + number_format($trans->amount, 2) }}/-
                                                         @else
                                                        <td class="text-right">{{ number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2)  }}/-
                                                         @endif
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
