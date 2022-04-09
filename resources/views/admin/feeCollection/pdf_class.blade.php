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
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card" style="margin: 0px;">
                        <div class="card-body">
                            <div class="heading">
                                <h3>Class Report</h3>
                                <h5 class="mb-4">
                                    {{ $students[0]->academics[0]->classes->name ?? '' }}
                                    {{ $students[0]->academics[0]->section->name ?? '' }}
                                    {{ $students[0]->academics[0]->group->name ?? '' }}
                                    {{ request()->month_id ? date('F', mktime(0, 0, 0, request()->month_id, 10)) . ' - ' : '' }}
                                    {{ request()->year_id ? request()->year_id : '' }}
                                </h5>
                            </div>
                            <table style="width:100%; " >
                                <thead>
                                <tr>
                                    <th>StudentID</th>
                                    <th>Name</th>
                                    <th>Paid</th>
                                    <th>Discount</th>
                                    <th>Current Due</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $student->studentId }}</td>
                                        <td>{{ $student->name }}</td>
                                        @php
                                            $due = $student->feeSetupStudents->sum('amount');
                                            $paid = $student->academics[0]->payments->sum('amount');
                                            $currentDue = $due - $paid;
                                            $discount = $student->academics[0]->payments->sum('discount');
                                        @endphp
                                        <td>{{ $paid }}</td>
                                        <td>{{ $discount }}</td>
                                        <td>{{ $currentDue }}</td>
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
