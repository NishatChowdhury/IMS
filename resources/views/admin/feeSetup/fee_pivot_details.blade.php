@extends('layouts.fixed')

@section('title','Fee Setup Details')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="form-group no-print" style="padding:10px; margin: auto;text-align:right" >
                        <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                    </div>
                    <!-- Main content -->
                    <div class="card p-3 mb-3">
                        <!-- info row -->
                        <div class="row ">
                            <div class="col-sm-4 invoice-col">
                                <h5>Student Details</h5>
                                <hr>
                                <address>
                                    @foreach($fee_setup as $fee)
                                        <strong>{{ $fee->student->name}}</strong><br>
                                        <b>ID :</b> {{ $fee->student->studentId }}<br>
                                        <b>Phone:</b> {{ $fee->student->mobile }}<br>
                                        <b>Email:</b> {{ $fee->student->email}}
                                    @endforeach
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead class="thead-dark">
                                        <tr style="text-align: center">
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Setup Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($fee_setup)
                                            @foreach($fee_setup  as $key=>$fee)
                                                @foreach($fee->fee_categories as $key=>$data)
                                                    <tr>
                                                        <td style="text-align: center">{{$key}}</td>
                                                        <td style="text-align: center">{{ucfirst($data->name)}}</td>
                                                        <td style="text-align: center">{{$data->description}}</td>
                                                        <td style="text-align: center">{{$data->pivot->amount}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@stop