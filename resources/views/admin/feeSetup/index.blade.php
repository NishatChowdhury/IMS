@extends('layouts.fixed')

@section('title','Fee Setup')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View All Fee Setups</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Setup') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add Fee') }}</li>
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
                        <div class="mx-auto pull-right">
                            <div class="">
                                <form action="{{url('admin/fee/fee-setup/view')}}" method="GET" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control mr-2" name="term" placeholder="Search By Academic ID" id="term">
                                            <span class="input-group-btn mr-5 mt-1">
                                                <button class="btn btn-info" type="submit" title="Search By Academic ID">
                                                    <span class="fas fa-search"></span>
                                                </button>
                                            </span>
                                            <a href="{{url('admin/fee/fee-setup/view')}}" class=" mt-1">
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
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('Academic Class ID') }}</th>
                                        <th>Student ID</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fees as $fee)
                                    <tr>
                                        <td>{{$fee->academicClass->name}}</td>
                                        <td>{{$fee->studentId->name}}</td>
                                        <td>{{$fee->month_id}}</td>
                                        <td>{{$fee->year}}</td>
                                        <td>
                                            <a href="{{ url('admin/fee/fee-setup/viewFeeDetails',$fee->id) }}" data-toggle="modal" data-target="#exampleModal" role="button" class="btn btn-success btn-sm" onclick="showFeeDetails({{ $fee->id }})"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('admin/fee/fee-setup/edit',$fee->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Fees</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Serial</th>
                            <th>Fee Category</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('script')
    <script>
        function showFeeDetails(id){
            var csrf = "{{ @csrf_token() }}";
            $.ajax({
                url: "{{ url('admin/fee/fee-setup/viewFeeDetails') }}",
                data: {id:id,_token:csrf},
                type: "POST",
            }).done(function(e){
                $("#tbody").html(e);
            });
        }
    </script>
@endsection
