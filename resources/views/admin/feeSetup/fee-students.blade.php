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
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Student Name') }}</th>
                                    <th>{{ __('Categories') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key => $data)
                                {{-- {{dd($data)}} --}}
                                    <tr>
                                        @if (isset($data->student->studentId))
                                            <td>{{ $data->student->studentId }}</td>
                                        @endif
                                        <td>{{ $data->student->name ?? '' }}</td>
                                        <td>
                                            <p class="badge badge-primary">{{ __('Total') }} : {{ $data->categories->sum('amount') }}</p>
                                            @foreach($data->categories as $category)
                                                <span class="badge badge-info">{{ $category->category->name }} : {{ number_format($category->amount,2) }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/fee/fee-setup/edit-by-student',$data->id) }}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
