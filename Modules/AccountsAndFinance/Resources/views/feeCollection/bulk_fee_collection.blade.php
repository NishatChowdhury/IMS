@extends('accountsandfinance::layouts.master')

@section('title', 'Bulk Fee Collection')
@section('style')
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Bulk Fee Collection') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Collection') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Bulk Fee Collection') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 1px;">
                        <div class="card-body">
                            <!-- search -->
                            <form action="{{route('fee-collection.bulk')}}" method="get">
                                @csrf
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Academic Class <span class="text-danger">*</span></label>
                                            <select name="academic_class_id" id="" class="form-control" required>
                                                <option disabled selected>Select Class</option>
                                                @foreach($academicClass as $ac)
                                                    <option value="{{ $ac->id }}">{{ $ac->classes->name ?? '' }} {{ $ac->group->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pt-2">
                                        <br><button type="submit" class="btn btn-primary btn-md btn-block">Search</button>
                                    </div>
                                </div>
                            </form>

                            <!-- content -->
                            @if($students)
                            <div class="row pb-3">
                                <div class="col-md-4">
                                    <label>Date:</label>
                                    <input type="date" class="form-control" name="date" required>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SL</th>
                                    <th>Student Info</th>
                                    <th>Academic Info</th>
                                    <th>Due Amount</th>
                                    <th>Payment</th>
                                    <th>Payment Method & Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=>$student)
                                    <tr>
                                        <td hidden=""><input type="hidden" name="ids[]" value="{{$student->id}}" /></td>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <span>Id:</span> {{$student->studentId}} <br>
                                            <span>Name:</span> {{$student->name}} <br>
                                            <span>Father:</span> {{$student->father->f_name}}
                                        </td>
                                        <td>
                                            <span>Class:</span>&nbsp;{{ $student->academics->first()->classes->name ?? 'N/A' }} {{ $student->academics->first()->group->name ?? 'N/A' }} <br>
                                            <span>Section:</span>&nbsp;{{ $student->academics->first()->section->name ?? 'N\A'}} <br>
                                            <span>Roll:</span>&nbsp;{{ $student->academics->first()->rank }}
                                        </td>
                                        <td>
                                            <span>Tuition Fee:</span> {{ $totalDue[$key] }} <br>
                                            <span>Transport:</span> {{ $totalTransportDue[$key]}} <br>
                                            <span>Total Payable:</span> {{ $totalDue[$key] + $totalTransportDue[$key]}}
                                        </td>
                                        <td>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4">Tuition Fee</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="amount[]" id="am" class="form-control text-right" placeholder="00.00">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4">Transport</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="transportAmount[]" id="tAm" class="form-control text-right"  placeholder="00.00">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4">Discount</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="discount[]" id="dis" class="form-control text-right"  placeholder="00.00">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-4">Total Payable</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control text-right" id="playA" readonly placeholder="00.00">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <select name="payment_method[]" class="custom-select">
                                                <label>Payment Method</label>
                                                <option disabled selected value="">Select</option>
                                                @foreach($payment_method as $pm)
                                                    <option value={{$pm->id}}>{{$pm->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-group">
                                                <label>Remark</label>
                                                <input type="text" name="remarks" class="form-control text-right"  placeholder="">
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
