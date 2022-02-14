@extends('layouts.fixed')

@section('title','View All Fee Setups')

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
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @foreach($fees as $fee)
                        <div class="card">
                            <div class="card-header">
                                {{ $fee->first()->month->name }}&nbsp;{{ $fee->first()->year }}
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead class="thead-dark">
{{--                                    <tr>--}}
{{--                                        <th>{{ __('Academic Class') }}</th>--}}
{{--                                    </tr>--}}
                                    </thead>
                                    <tbody>
                                    @foreach($fee->groupBy('academic_class_id') as $classes)
                                        <tr>
                                            <td>
                                                {{$classes->first()->academicClass->classes->name}}
                                                {{ $classes->first()->academicClass->section->name ?? '' }}
                                                {{ $classes->first()->academicClass->group->name ?? '' }}
                                            </td>
                                            <td>{{ $classes->count() }} {{ __('Student(s)') }}</td>
                                            <td>
                                                <a href="#" role="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="#" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            </td>
{{--                                            <td>{{$fee->first()->month->name}}</td>--}}
{{--                                            <td>{{$fee->first()->year}}</td>--}}
{{--                                            <td>--}}
                                                {{--                                            {{ Form::open(['url'=>['admin/fee/fee-setup/delete',$fee->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}--}}
                                                {{--                                            <a href="{{ url('admin/fee/fee-setup/viewFeeDetails',$fee->id) }}" data-toggle="modal" data-target="#exampleModal" role="button" class="btn btn-success btn-sm" onclick="showFeeDetails({{ $fee->id }})"><i class="fas fa-eye"></i></a>--}}
                                                {{--                                            <a href="{{ url('admin/fee/fee-setup/edit',$fee->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                                    <i class="fa fas fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                                {{ Form::close() }}--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
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
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this Fee Setup?');
            return !!x;
        }
    </script>

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
