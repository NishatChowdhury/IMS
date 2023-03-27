@extends('admission::layouts.master')

@section('title', 'Group-wise Report')
@section('style')
    <style>
        @media print {
            .no_print {
                display: none;
            }
        }

        /*span.showDiscountMsg {*/
        /*    background: #90abb1;*/
        /*    padding: 2px 5px 2px 4px;*/
        /*    border-radius: 16px;*/
        /*    font-size: 11px;*/
        /*    font-weight: 900;*/
        /*    cursor: pointer;*/
        /*}*/

    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Group-wise  Report') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Addmisson Registration') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Group-wise') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.Search-panel -->
    <section class="content no_print ">
        <div class="container-fluid">
            {{-- start --}}
            <div class="col-lg-12 col-sm-8 col-md-8 col-xs-12  ">
                <div class="card card-primary card-outline">
                    <div class="card-body" style="padding-bottom:0">
                        <form method="get" action="{{ route('group-wise.report') }}">
                            <div class="form-row"  style="margin-left: 33%;">

                                <label class="mr-1 mt-1"> Group </label>
                                <div class="form-group col-md-3">
                                    <select name="group_id" id="" class=" form-control  " required>
                                        <option value="">Select Group</option>

                                        @foreach ($groups as $grp)
                                            <option value="{{ $grp->id }}" {{ request()->group_id == $grp->id ? 'selected':'' }}>
                                                {{ $grp->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-1 ">
                                    <button type="submit" class="btn btn-info btn-md btn-block"><i
                                                class="fa fa-search"></i>&nbsp
                                    </button>
                                </div>
                                <div class="form-group col-md-1">
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

    @if (isset($students))
        {{-- {{ dd($students[0]->academics[0]->classes->name) }} --}}
        <section class="content mt-4">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Student Religion-wise Report</h3>
                            </div>
                            <table class="table table-bordered  table-sm">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>StudentID</th>
                                    <th>Name</th>
                                    <th>mobile</th>
                                    <th>Group</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($students as $key => $student)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $student->student->studentId }}</td>
                                        <td>{{ $student->student->name }}</td>
                                        <td>{{ $student->student->mobile }}</td>
                                        <td>{{ $student->group->name }}</td>
                                        <td>{{ $student->student->address }}</td>
                                    </tr>
                                @endforeach

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
    </script>
@stop
