@extends('accountsandfinance::layouts.master')

@section('title','View All Fee Setups')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('All Fee Collections')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Fee Collection') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('All Collections') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('Payment Date') }}</th>
                                        <th>{{ __('Student Name') }}</th>
                                        <th>{{ __('Student ID') }}</th>
                                        <th>{{ __('Academic Class') }}</th>
                                        <th>{{ __('Payment Method') }}</th>
                                        <th>{{ __('Paid Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($feeCollections as $data)
                                    <tr>
                                        <td>
                                            {{ $data->date->format('Y-m-d') ?? '' }}
                                        </td>
                                        <td>
                                            {{ $data->academics->student->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $data->academics->student->studentId ?? '' }}
                                        </td>
                                        <td>
                                            <span class="badge badge-info">{{ $data->academics->classes->name ?? '' }}</span>
                                            <span class="badge badge-info">{{ $data->academics->section->name ?? '' }}</span>
                                            <span class="badge badge-info">{{ $data->academics->group->name ?? '' }}</span>
                                        </td>
                                        <td> {{ $data->payment_methods->name ?? '' }}</td>
                                        <td>
                                            {{ $data->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ Form::open(['url'=>['admin/fee/collection/delete',$data->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fas fa-trash"></i>
                                            </button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            {{ $feeCollections->appends(Request::except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </section>



@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Fee Setup?');
            return !!x;
        }
    </script>
@endsection
