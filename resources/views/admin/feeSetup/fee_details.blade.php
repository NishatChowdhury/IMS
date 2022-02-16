@extends('layouts.fixed')

@section('title','')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Students list') }} </h1>
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
                                    <th>{{ __('Serial') }}</th>
                                    <th>{{ __('Student Name') }}</th>
                                    <th>{{ __('Father Name') }}</th>
                                    <th>{{ __('Class') }}</th>
                                    <th>{{ __('Section') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($studentData as $key=>$data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->students->name}}</td>
                                        <td>{{$data->students->father->f_name}}</td>
                                        <td>{{$data->classes->name}}</td>
                                        <td>{{$data->section->name}}</td>
                                        <td>
                                            <a href="{{ url('admin/fee/fee-setup/feeSetupDetails',$data->student_id) }}" role="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
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



@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Fee Setup?');
            return !!x;
        }
    </script>
@endsection
