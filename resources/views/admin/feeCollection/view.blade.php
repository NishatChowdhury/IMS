@extends('layouts.fixed')

@section('title','Fee Collection')

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <h5 class="text-center" style="background-color: rgb(45 136 151);padding:10px;color:white"><b>Search by Student ID for Collect Fees</b></h3>
                        <div class="mx-auto pull-right">
                            <form action="{{url('admin/fee/fee-collection/view')}}" method="GET" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control mr-2" name="term" placeholder="Search By Student ID" id="term">
                                        <span class="input-group-btn mr-2">
                                            <button class="btn btn-info" type="submit" title="Search By Student ID">
                                                <span class="fas fa-search"></span>
                                            </button>
                                        </span>
                                        <a href="{{url('admin/fee/fee-collection/view')}}" class="">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="button" title="Refresh page">
                                                    <span class="fas fa-sync-alt"></span>
                                                </button>
                                            </span>
                                        </a>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="text-center" style="background-color: rgba(45 136 151);color:white;padding:5px">
                                            Previous payment
                                        </h5>
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Method') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01-01-21</td>
                                                    <td>Cash</td>
                                                    <td>5000</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5 class="text-center" style="background-color: rgba(45 136 151);color:white;padding:5px">
                                            Student Information
                                        </h5>
                                        
                                            <table class="table table-bordered table-striped table-sm">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>{{ __('Student Name') }}</th>
                                                        <th>{{ __('Father Name') }}</th>
                                                        <th>{{ __('Class') }}</th>
                                                        <th>{{ __('Roll') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{ $student->father->name ?? '' }}</td>
                                                        <td>{{$student->classes}}</td>
                                                        <td>{{$student->rank}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>  
                                    </div>
                                </div>
                                <div class="clearfix" style="padding: 10px"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="text-center" style="background-color: rgba(45 136 151);color:white;padding:5px">
                                            Monthwise Fees for ID : <?php echo $term?>
                                        </h5>
                                        <table class="table table-bordered table-striped table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>{{ __('Month') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($feeSetup))
                                                    @foreach($feeSetup as $value)
                                                        <tr>
                                                            <td>
                                                                {{ $value->month->name }},&nbsp;{{ $value->year}}
                                                            </td>
                                                            <td>
                                                                {{ number_format($value->feeSetupPivot->sum('amount'),2) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @else 
                                                    <h2>No data found</h2>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-center" style="background-color: rgba(45 136 151);color:white;padding:5px">
                                            Setup New Payment
                                        </h5>
                                        {{ Form::open(['url'=>'admin/fee/fee-collection/store','method'=>'POST', 'class'=>'form-horizontal']) }}
                                            <div class="form-row">
                                                {{ Form::hidden('student_id', $student->id,['class'=>'form-control','placeholder'=>'']) }}
                                                @foreach($feeSetup as $fee)
                                                {{ Form::hidden('fee_setup_id', $fee->id,['class'=>'form-control','placeholder'=>'']) }}
                                                @endforeach
                                                <div class="col">
                                                    <label for="">{{ __('Date') }}</label>
                                                    <div class="input-group">
                                                        {{ Form::date('payment_date',null,['class'=>'form-control','placeholder'=>'Select Date']) }}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="">{{ __('Balance') }}</label>
                                                    <div class="input-group">
                                                        {{ Form::text('balance',null,['class'=>'form-control','placeholder'=>'Balance']) }}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="">Pay Method</label>
                                                    <div class="input-group">
                                                        {{ Form::select('payment_method',$payment_method,null,['class'=>'form-control','placeholder'=>'Select Method']) }}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="">{{ __('Paid Amount') }}</label>
                                                    <div class="input-group">
                                                        {{ Form::text('paid_amount',null,['class'=>'form-control','placeholder'=>'Paid']) }}
                                                    </div>
                                                </div>
                                            </div>
                                        <br>
                                        <div class="button text-center">
                                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                 
            </div>
           
        </div>
    </section>


@stop