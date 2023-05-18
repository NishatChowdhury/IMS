@extends('accountsandfinance::layouts.master')

@section('title', 'Fee Collection')
@section('style')
    <style>
        @media print {
            .no_print {
                display: none;
            }
        }

        .padding-0{
            padding-right:0;
            padding-left:0;
        }

        .col {
  float: left;
  width: 4.5in;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
    </style>
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Fee Collection') }}</h1>
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
                            <b>{{ __('Search by Student ID for Collect Fees') }}</b>
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
                                                    class="fa fa-arrow-left"></i>&nbsp;{{ __('Back') }}</a>
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
        <div class="container-fluid">
                <div class="row">
                    <div class="col padding-0" style="width: 4.5in">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div>
                                        <div class="card" style="border: 1px solid black;font-size: 15px">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-12 text-center">
                                                        <img class="img-responsive" src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="40px">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <h5>{{ siteConfig('name') }}</h5>
                                                        <p class="text-center"><u>{{ __('Money Receipt') }}--{{ __('Office Copy') }}</u></p>
                                                        <div>
                                                            <strong class="float-left">{{ __('Receipt No:') }}
                                                                {{ __('#00') }}{{ session()->get('spay')['id'] ?? session()->get('trans')['id'] }}</strong>
                                                            <b class="float-left">{{ __('Date:') }}
                                                                @if (session()->get('spay') != null)
                                                                    {{ date('d-m-Y', strtotime(session()->get('spay')['date'])) }}
                                                                @else
                                                                    <?php
                                                                    $tD = session()->get('trans');
                                                                    ?>
                                                                    {{ $tD->date }}
                                                                @endif
                                                            </b><br>
                
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <hr>
                                                <!-- info row -->
                                                <div class="row">
                                                    <div>
                                                        <?php
                                                        $data = session()->get('spay');
                                                        $trans = session()->get('trans');
                                                        if ($data != null) {
                                                            $stuId = $data['student_academic_id'];
                                                        } else {
                                                            $stuId = $trans['student_academic_id'];
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
                                                            <strong>{{ $studentAcademic->student->name ?? '' }}</strong> || <span>Id:</span>{{ $studentAcademic->student->studentId ?? '' }} <br>
                                                            <span>Phone No:</span>{{ $studentAcademic->student->mobile ?? '' }} || <span>Class:</span>{{ $studentAcademic->classes->name ?? 'N/A' }} <br> 
                                                            <span>Section:</span>{{ $studentAcademic->section->name ?? 'N/A' }} || <span>Group:</span>{{ $studentAcademic->group->name ?? 'N/A' }}<br>
                                                            <span>Roll No:</span>{{ $studentAcademic->rank ?? 'N/A' }}
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                
                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('Category') }}</th>
                                                                    <th class="text-right">{{ __('Amount') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $total = 0;
                                                                ?>
                                                                @foreach ($receipt as $key => $rcpt)
                                                                    <tr>
                                                                        <td>{{ $rcpt->category->name ?? '' }}</td>
                                                                        <td class="text-right">{{ number_format($rcpt->paid, 2) }} /-</td>
                                                                    </tr>
                
                                                                    @php
                                                                        $total += $rcpt->paid;
                                                                    @endphp
                                                                @endforeach
                                                                @if ($trans != null)
                                                                    <tr>
                                                                        <td> Transport Cost </td>
                                                                        <td class="text-right">{{ number_format($trans->amount, 2) }} /-
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">Paid =</strong>
                                                                    </td>
                                                                    @if ($trans != null)
                                                                        <td class="text-right">
                                                                            <?php
                                                                            if ($data != null) {
                                                                                $am1 = number_format(session()->get('spay')['amount'], 2);
                                                                            } else {
                                                                                $am1 = 0;
                                                                            }
                                                                            ?>
                                                                            {{ $am1 + intVal($trans['amount']) }}/-
                                                                        </td>
                                                                    @else
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['amount'], 2) }}/-</td>
                                                                    @endif
                                                                </tr>
                                                                @if ($data != null)
                                                                    <tr>
                                                                        <td colspan="1">
                                                                            <strong class="float-right">{{ __('discount =') }}</strong>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['discount'], 2) ?? 0.0 }}/-
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Fee Due =') }}</strong>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ $feeSetUpStudent - $stuPayment }}
                                                                        /-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Transport Due =') }}</strong>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ $tranAm > $tranPay ? $tranAm - $tranPay : 0 }} /-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Total =') }}</strong>
                                                                    </td>
                                                                    @if ($trans != null)
                                                                        <?php
                                                                        if ($data != null) {
                                                                            $am = number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2);
                                                                        } else {
                                                                            $am = 0;
                                                                        }
                                                                        ?>
                                                                        <td class="text-right">
                                                                            {{ $am + number_format($trans->amount, 2) }}/-
                                                                        @else
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2) }}/-
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                
                                                <!-- /.row -->
                
                                                <div class="row text-center pt-5">
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Head Teacher') }}
                                                    </div>
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Class Teacher') }}
                                                    </div>
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Office Assistant') }}
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col padding-0"  style="width: 4.5in">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row" style="float: right">
                                    <div >
                                        <div class="card" style="border: 1px solid black;font-size: 15px">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-12 text-center">
                                                        <img class="img-responsive" src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="40px">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <h5>{{ siteConfig('name') }}</h5>
                                                        <p class="text-center"><u>{{ __('Money Receipt') }}--{{ __('Student Copy') }}</u></p>
                                                        <div>
                                                            <strong class="float-left">{{ __('Receipt No:') }}
                                                                {{ __('#00') }}{{ session()->get('spay')['id'] ?? session()->get('trans')['id'] }}</strong>
                                                            <b class="float-left">{{ __('Date:') }}
                                                                @if (session()->get('spay') != null)
                                                                    {{ date('d-m-Y', strtotime(session()->get('spay')['date'])) }}
                                                                @else
                                                                    <?php
                                                                    $tD = session()->get('trans');
                                                                    ?>
                                                                    {{ $tD->date }}
                                                                @endif
                                                            </b><br>
                
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <hr>
                                                <!-- info row -->
                                                <div class="row">
                                                    <div>
                                                        <?php
                                                        $data = session()->get('spay');
                                                        $trans = session()->get('trans');
                                                        if ($data != null) {
                                                            $stuId = $data['student_academic_id'];
                                                        } else {
                                                            $stuId = $trans['student_academic_id'];
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
                                                            <strong>{{ $studentAcademic->student->name ?? '' }}</strong> || <span>Id:</span>{{ $studentAcademic->student->studentId ?? '' }} <br>
                                                            <span>Phone No:</span>{{ $studentAcademic->student->mobile ?? '' }} || <span>Class:</span>{{ $studentAcademic->classes->name ?? 'N/A' }} <br> 
                                                            <span>Section:</span>{{ $studentAcademic->section->name ?? 'N/A' }} || <span>Group:</span>{{ $studentAcademic->group->name ?? 'N/A' }}<br>
                                                            <span>Roll No:</span>{{ $studentAcademic->rank ?? 'N/A' }}
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                
                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-bordered table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('Category') }}</th>
                                                                    <th class="text-right">{{ __('Amount') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $total = 0;
                                                                ?>
                                                                @foreach ($receipt as $key => $rcpt)
                                                                    <tr>
                                                                        <td>{{ $rcpt->category->name ?? '' }}</td>
                                                                        <td class="text-right">{{ number_format($rcpt->paid, 2) }} /-</td>
                                                                    </tr>
                
                                                                    @php
                                                                        $total += $rcpt->paid;
                                                                    @endphp
                                                                @endforeach
                                                                @if ($trans != null)
                                                                    <tr>
                                                                        <td> Transport Cost </td>
                                                                        <td class="text-right">{{ number_format($trans->amount, 2) }} /-
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">Paid =</strong>
                                                                    </td>
                                                                    @if ($trans != null)
                                                                        <td class="text-right">
                                                                            <?php
                                                                            if ($data != null) {
                                                                                $am1 = number_format(session()->get('spay')['amount'], 2);
                                                                            } else {
                                                                                $am1 = 0;
                                                                            }
                                                                            ?>
                                                                            {{ $am1 + intVal($trans['amount']) }}/-
                                                                        </td>
                                                                    @else
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['amount'], 2) }}/-</td>
                                                                    @endif
                                                                </tr>
                                                                @if ($data != null)
                                                                    <tr>
                                                                        <td colspan="1">
                                                                            <strong class="float-right">{{ __('discount =') }}</strong>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['discount'], 2) ?? 0.0 }}/-
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Fee Due =') }}</strong>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ $feeSetUpStudent - $stuPayment }}
                                                                        /-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Transport Due =') }}</strong>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ $tranAm > $tranPay ? $tranAm - $tranPay : 0 }} /-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="1">
                                                                        <strong class="float-right">{{ __('Total =') }}</strong>
                                                                    </td>
                                                                    @if ($trans != null)
                                                                        <?php
                                                                        if ($data != null) {
                                                                            $am = number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2);
                                                                        } else {
                                                                            $am = 0;
                                                                        }
                                                                        ?>
                                                                        <td class="text-right">
                                                                            {{ $am + number_format($trans->amount, 2) }}/-
                                                                        @else
                                                                        <td class="text-right">
                                                                            {{ number_format(session()->get('spay')['amount'] - session()->get('spay')['discount'], 2) }}/-
                                                                    @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                
                                                <!-- /.row -->
                
                                                <div class="row text-center pt-5">
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Head Teacher') }}
                                                    </div>
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Class Teacher') }}
                                                    </div>
                                                    <div class="col-md-4" style="font-size: 12px">
                                                        {{ __('--------') }} <br>
                                                        {{ __('Office Assistant') }}
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
        </div>
    @endif
@stop
