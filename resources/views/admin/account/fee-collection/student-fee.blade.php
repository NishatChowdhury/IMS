@extends('layouts.fixed')

@section('title','Location Assign')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Finance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Location Assign</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        {{ Form::open(['action'=>'FinanceController@index','role'=>'form','method'=>'get']) }}
                        <div class="card-body">
                            <div class="form-row">

                                {{--<div class="col">--}}
                                    {{--<label for="">Name</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--{{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<label for="">Class</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--{{ Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<label for="">Section</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--{{ Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<label for="">Group</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--{{ Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        {{ Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID']) }}
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Month</label>
                                    <div class="input-group">
                                        {{ Form::selectMonth('month',null,['class'=>'form-control','placeholder'=>'Select Month']) }}
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


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>


                {!! Form::open() !!}
                <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-4">
                                <h4>
                                    <img src="{{asset('assets/img/logos')}}/{{ siteConfig('logo') }}" width="80">
                                    <strong>{{ siteConfig('name') }}</strong><br>
                                </h4>
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-4 callout callout-info">
                                <address>
                                    {{siteConfig('address')}}<br>
                                    Phone: {{siteConfig('phone')}}<br>
                                    Email: {{siteConfig('email')}}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Student Details
                                <address>
                                    <strong>{{ $students !=null && $students->name  ? $students->name : '' }}</strong><br>
                                    <b>ID :</b> {{ $students !=null && $students->studentId  ? $students->studentId : '' }}<br>
                                    <b>Class:</b> {{ $students !=null && $students->class_id  ? $students->classes->name : '' }} || <b>Section :</b> {{ $students !=null && $students->section_id  ? $students->section->name : '' }} <br>
                                    Phone: {{ $students !=null && $students->phone  ? $students->phone : '' }}<br>
                                    Email: {{ $students !=null && $students->email  ? $students->email : '' }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col" >

                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <b>Pay Date:</b> 2/22/2014 <br>
                                <b>Pay Month:</b> January
                            </div>

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Setup Amount</th>
                                        <th>Paid Amount</th>
                                    </tr>
                                    </thead>
                                    @php $i=1; $total = $transport_amount = 0; @endphp
                                    <tbody>
                                    @if($fee_setup)
                                    @foreach($fee_setup->fee_categories  as $fee)
                                        @php
                                            $fee_amount = \App\FeePivot::where('fee_category_id',$fee->id)->where('fee_setup_id',$fee_setup->id)->first()->amount;
                                            $total +=$fee_amount; @endphp

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ucfirst($fee->name)}}</td>
                                            <td>{{$fee->description}}</td>
                                            <td style="text-align: right">{!! Form::text('setup_amount[]', $fee_amount ,['class'=>'form-control setup_amount','style'=>'text-align:right','readonly']) !!}</td>
                                            <td >{!! Form::text('paid_amount[]', 0 ,['class'=>'form-control amount','style'=>'text-align:right']) !!}</td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        @if($transport_fee != null)
                                            @php $transport_amount = $transport_fee->location->amount@endphp
                                            <td></td>
                                            <td>Transport Fee</td>
                                            <td><b>Location :</b> {{ucfirst($transport_fee->location->name)}}</td>
                                            <td style="text-align: right">{!! Form::text('setup_transport', $transport_amount ,['class'=>'form-control setup_amount','style'=>'text-align:right','readonly']) !!}</td>
                                            <td>{!! Form::text('transport', 0 ,['class'=>'form-control amount','style'=>'text-align:right']) !!}</td>
                                        @endif
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                {{--<p class="lead">Paid Status:</p>--}}
                                    {{--<img src="../../dist/img/credit/visa.png" alt="Visa">--}}
                                {{--<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">--}}
                                {{--<img src="../../dist/img/credit/american-express.png" alt="American Express">--}}
                                {{--<img src="../../dist/img/credit/paypal2.png" alt="Paypal">--}}

                                {{--<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">--}}
                                    {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem--}}
                                    {{--plugg--}}
                                    {{--dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
                                {{--</p>--}}
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Calculation</p>

                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tr>
                                            <th style="width:50%">Fee Amount:</th>
                                            <td>{!! Form::text('fee_amount', $total+$transport_amount,['class'=>'form-control fee_amount','style'=>'text-align:right','readonly','id'=>'fee_amount']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Previous Due </th>
                                            <td>{!! Form::text('previous_due', 0 ,['class'=>'form-control previous_due','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount </th>
                                            <td>{!! Form::text('discount', 0 ,['class'=>'form-control discount','style'=>'text-align:right']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Fine:</th>
                                            <td>{!! Form::text('fine', 0 ,['class'=>'form-control fine','style'=>'text-align:right']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Sub Total:</th>
                                            <td>{!! Form::text('sub_total', 0 ,['class'=>'form-control sub_total','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Paid Amount:</th>
                                            <td>{!! Form::text('paid_amount', 0 ,['class'=>'form-control paid_amount','style'=>'text-align:right','id'=>'paid_amount']) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Dues:</th>
                                            <td>{!! Form::text('dues', 0 ,['class'=>'form-control due','style'=>'text-align:right','readonly']) !!}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="fas fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                {{--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">--}}
                                {{--<i class="fas fa-download"></i> Generate PDF--}}
                                {{--</button>--}}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->

@stop
@section('script')
    <script>

        $(document).on("keyup",".amount",function(){
            var fee_amount = 0;
           $('.amount').each(function () {
               var data= $(this).val();
               if($.isNumeric(data)){
                    fee_amount +=parseFloat(data)
               }
           });
           //console.log(fee_amount);
            $('#paid_amount').val(fee_amount);
        });

        $(document).on('keyup','.discount',function () {
            var fee_amount = parseInt($('#fee_amount').val());
            var previous_due = parseInt($('.previous_due').val());
            var discount = parseInt($(this).val());
            if(isNaN(discount)){
                $('.discount').val(0);
            }
            if(discount > 0){
                var sub_total = (fee_amount+previous_due)-discount;
                //console.log(sub_total);
                $('.sub_total').val(sub_total);
            }
        });

        $(document).on('keyup','.fine',function () {
            var fee_amount = parseInt($('#fee_amount').val());
            var previous_due = parseInt($('.previous_due').val());
            var discount = parseInt($('.discount').val());
            var fine = parseInt($(this).val());
            if(isNaN(fine)){
                $('.fine').val(0);
            }
            if(fine > 0){
                var sub_total = (fee_amount+previous_due+fine)-discount;
                //console.log(sub_total);
                $('.sub_total').val(sub_total);
            }

        });

        $(document).on('change','.sub_total',function () {
            var sub_total = parseInt($(this).val());
            var paid_amount = parseInt($('.paid_amount').val());
            if(sub_total > 0){
                var due = sub_total-paid_amount;
                $('.due').val(due);
            }
        });
    </script>
@stop