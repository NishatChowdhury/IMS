@extends('layouts.fixed')

@section('title', 'Custom Table')
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

        {{--  below code  resize column--}}
        .table th {
            position: relative;
        }
        .resizer {
            /* Displayed at the right side of column */
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            cursor: col-resize;
            user-select: none;
        }
        .resizer:hover,
        .resizing {
            border-right: 2px solid blue;
        }

    </style>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Custom Table') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Addmisson Registration') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Custom Table') }}</li>
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
                        <form method="get" action="{{ route('create-custom.table') }}">
                            <div class="form-row">
                                <label class="mr-1 mt-1"> Academic Class </label>
                                <div class="form-group col-md-2">
                                    <select name="ac_class_id" id="" class=" form-control " required>
                                        <option value="">Select Class</option>

                                        @foreach ($classes as $cls)
                                            <option value="{{ $cls->id }}">
                                                {{ $cls->classes->name ?? '' }} {{ $cls->section->name ?? '' }} {{ $cls->group->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder=" Ex: mobile , address , email " name="column">
                                </div>

                                <div class="form-group row col-md-2 ml-1">
                                    <button type="submit" class="btn btn-info btn-md "><i
                                                class="fa fa-table"></i>
                                    </button>&nbsp;
                                    <button class="btn btn-warning btn-md "
                                            onclick="window.print(); return false;"><i
                                                class="fa fa-print"></i>
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

        <section class="content mt-4">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Class:
                                    {{ $students[0]->classes->name ?? '' }}
                                    {{ $students[0]->section->name ?? '' }}
                                    {{ $students[0]->group->name ?? '' }}
                                </h3> <br>
                            </div>
                            <table id="resizeMe" class="table table-bordered  table-sm">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    @if( count($arrayCol) > 0)

                                        @foreach( $arrayCol as $col)
                                            <th>{{ $col }}</th>
                                        @endforeach
                                    @endif

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=> $stu)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stu->student->name }}</td>

                                        @if( count($arrayCol) > 0)

                                            @foreach( $arrayCol as $col)
                                                <td></td>
                                            @endforeach
                                        @endif

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
@stop
@section('script')
    {{--  below code  resize column--}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const createResizableTable = function (table) {
                const cols = table.querySelectorAll('th');
                [].forEach.call(cols, function (col) {
                    // Add a resizer element to the column
                    const resizer = document.createElement('div');
                    resizer.classList.add('resizer');

                    // Set the height
                    resizer.style.height = `${table.offsetHeight}px`;

                    col.appendChild(resizer);

                    createResizableColumn(col, resizer);
                });
            };

            const createResizableColumn = function (col, resizer) {
                let x = 0;
                let w = 0;

                const mouseDownHandler = function (e) {
                    x = e.clientX;

                    const styles = window.getComputedStyle(col);
                    w = parseInt(styles.width, 10);

                    document.addEventListener('mousemove', mouseMoveHandler);
                    document.addEventListener('mouseup', mouseUpHandler);

                    resizer.classList.add('resizing');
                };

                const mouseMoveHandler = function (e) {
                    const dx = e.clientX - x;
                    col.style.width = `${w + dx}px`;
                };

                const mouseUpHandler = function () {
                    resizer.classList.remove('resizing');
                    document.removeEventListener('mousemove', mouseMoveHandler);
                    document.removeEventListener('mouseup', mouseUpHandler);
                };

                resizer.addEventListener('mousedown', mouseDownHandler);
            };

            createResizableTable(document.getElementById('resizeMe'));

        });
    </script>
@stop
