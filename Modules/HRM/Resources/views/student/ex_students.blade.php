@extends('hrm::layouts.master')

@section('title', 'Settings | Ex Students')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('HRM') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Ex Students') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Slider page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-danger">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('প্রাক্তন শিক্ষার্থীদের তালিকা') }}</h5>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Serial') }}</th>
                                            <th>{{ __('Student Name') }}</th>
                                            <th>{{ __('Father Name') }}</th>
                                            <th>{{ __('Mother Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Mobile') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x = 1 @endphp
                                        @foreach($exStudents as $student)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $student->student_name }}</td>
                                            <td>{{ $student->father }}</td>
                                            <td>{{ $student->mother }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->mobile }}</td>
                                            <td>
                                                <img src="{{ asset('assets/img/exStudents/') }}/{{ $student->image }}" width="100" alt="">
                                            </td>
                                            <td>
                                                {{ Form::model($student, ['route' => ['exStudents.status', $student->id], 'method' => 'patch', 'onsubmit' => 'return statusChange()']) }}
                                                @if ($student->active == 0)
                                                    <button class="btn btn-danger btn-sm">Inactive</button>
                                                @else
                                                    <button class="btn btn-success btn-sm">Active</button>
                                                @endif
                                                {{ Form::close() }}
                                            </td>
                                            <td>
                                                {{ Form::model($student, ['route' => ['exStudents.destroy', $student->id], 'method' => 'delete', 'onsubmit' => 'confirmDelete()']) }}
                                                <a href="{{ route('exStudents.view', $student->id) }}"
                                                    class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('exStudents.edit', $student->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                                {{ Form::close() }}
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
<script>
    function statusChange() {
            var x = confirm('Are you sure, you want to change status?');
            return !!x;
        }
</script>
@stop

