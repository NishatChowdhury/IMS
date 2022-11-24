@extends('layouts.fixed')
@section('title', 'Manuel Attendence')
@section('style')
    <style>
        @media print {
            .no_print {
                display: none;
            }
        }
    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Student Manuel Attendence') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Attendence') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Manuel Attendence') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no_print ">
        <div class="container-fluid">
            {{-- start --}}
            <div class="col-lg-12 col-sm-8 col-md-8 col-xs-12 ">
                <div class="card card-primary card-outline">
                    <div class="card-body" style="padding-bottom:0">
                        <form method="get" action="{{ route('student.manuel-attendence') }}">
                            <div class="form-row" >
                                <div class="form-group col-md-3">
                                    <label>Academic Class </label>
                                    <select name="academic_class" id="" class=" form-control" >
                                        <option value="">Select class</option>
                                            @foreach ($academic_class as $class)
                                                <option value="{{ $class->id }}" {{ ( request()->academic_class ==  $class->id ? 'selected' : '') }}>
                                                    {{ $class->classes->name }} {{ $class->section->name ?? '' }} {{ $class->group->name ?? '' }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    {{ Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'id'=>'datetimepicker']) }}
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <button type="submit" class="btn btn-info btn-md btn-block"><i
                                                class="fa fa-search"></i>&nbsp
                                    </button>
                                </div>
                                <div class="form-group col-md-1" style="margin-top: 30px">
                                    <button class="btn btn-warning btn-md btn-block"
                                            onclick="window.print(); return false;"><i
                                                class="fa fa-print"></i>&nbsp
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>{{-- end --}}
    </section>

    @if (isset($attendences))
{{--         {{ dd($attendences) }}--}}
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Student Manuel Attendence</h3>
                                <h5 class="mb-4">
{{--                                    {{ $attendences[0]->academics[0]->classes->name ?? '' }}--}}
{{--                                    {{ $attendences[0]->academics[0]->section->name ?? '' }}--}}
{{--                                    {{ $attendences[0]->academics[0]->group->name ?? '' }}--}}
{{--                                    {{ request()->month_id ? date('F', mktime(0, 0, 0, request()->month_id, 10)) . ' - ' : '' }}--}}
{{--                                    {{ request()->year_id ? request()->year_id : '' }}--}}
                                </h5>

                            </div>
                            <table class="table table-bordered  table-sm ">
                                <thead class="text-center">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                    <th>Attendance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($attendences as $key=>$attn)
{{--                                    {{ dd($attn->studentAcademic->classes->name) }}--}}
                                <tr>
                                    <td>{{$attn->studentAcademic->student->studentid ?? ''}}</td>
                                    <td>{{$attn->studentAcademic->student->name ?? ''}}</td>
                                    <td>{{$attn->studentAcademic->classes->name ?? ''}} {{$attn->studentAcademic->section->name ?? ''}} {{$attn->studentAcademic->group->name ?? ''}}  </td>
                                    <td>{{$attn->date->format('d/m/Y') ?? ''}}</td>
                                    <td class="text-center">

                                        @if($attn->attendance_status_id == 1)
                                            <a title="present" href="{{route('student.manuel-attendence-status',$attn->id)}}"> <i class="fa fa-check-circle text-success"></i> </a>


                                        @else
                                            <a  title="Absent" href="{{route('student.manuel-attendence-status',$attn->id)}}"> <i class="fa fa-times text-danger "></i> </a>

                                        @endif

                                    </td>
                                </tr>
                                @empty
                                    <td colspan="6" class="text-center text-danger">
                                        <h5>No data found !!</h5>
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif

@stop

@section('plugin')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
@stop
@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $('.select2').select2();

        $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@stop
