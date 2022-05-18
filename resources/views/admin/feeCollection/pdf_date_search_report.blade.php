<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic Report</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ public_path('plugins/fontawesome-free-5.6.3-web/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ public_path('dist/css/adminlte.min.css?ver:1.2') }}">
        <style>
        body {
            overflow-y: hidden;
            /*font-family: "Times New Roman";*/
            color: #000000;
        }
        .heading{
           text-align: center;
        }

        /*h5.heading-title {*/
        /*    text-transform: initial;*/
        /*    font-weight: bold;*/
        /*    letter-spacing: 1px;*/
        /*}*/
        table{
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }


        table, td, th {
            border: 1px solid;
        }

        tr th, span strong, div span {
            text-transform: initial;
            font-weight: bold;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content mt-4">
            <div class="container-fluid">

                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="heading">
                                <h3>{__('Date Wise Collection Report')}</h3>
{{--                                <h5 class="mb-4">{{  $r['from'] }}--}}
{{--                                    {{  $r['to'] ? 'To ' .  $r['to'] : '' }}</h5>--}}
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>StudentID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>mobile</th>
                                    <th>Paid</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($stupays as $pay)
                                    <tr>
                                        {{-- {{   dd(    $pay->academics->student->studentId    )  }} --}}
                                        <td>{{ $pay->date->format('Y-m-d') }}</td>
                                        <td>{{ $pay->academics->student->studentId ?? '' }}</td>
                                        <td>{{ $pay->academics->student->name ?? '' }}</td>
                                        <td>{{ $pay->academics->classes->name ?? '' }}
                                            {{ $pay->academics->section->name ?? '' }}
                                            {{ $pay->academics->group->name ?? '' }}</td>
                                        <td>{{ $pay->academics->student->mobile ?? '' }}</td>
                                        <td>{{ $pay->amount }}</td>
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
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ public_path('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ public_path('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ public_path('dist/js/demo.js') }}"></script>
</body>
</html>
