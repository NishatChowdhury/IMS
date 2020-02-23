@extends('layouts.fixed')

@section('title','WPIMS | Dashboard')

@section('plugin-css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@stop
@section('style')
    <style>
        .statistics, .atten-dtl {
            background-color: #c3cdde;
            margin-top: 50px;
        }

        .card-header{
            height: 77px;
            padding: 2px 10px;
            background: #00a65a !important;
        }

        .account{
            background-color: #fff4f3;
            margin-top: 50px;
        }
        .total-rcv{
            background-color: #96abb9;
        }
        .total-pay{
            background-color: #5e6367db;
        }

        .cash-flow{
            background-color: #fff4f3;
            margin-top: 50px;
        }

    </style>
@stop {{--Style--}}

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row mb-2" style="padding: 10px 6px; background-color: #c3cdde">
                <div class="col-sm-6 col-md-3">
                    <h3>Welcome </h3>
                    <a href="{{url('dashboard')}}">
                        <span class="fas fa-home" style="font-size: 1.1em"> <h6 class="m-0 text-dark" style="display: inline-block"> Dashboard </h6> </span>
                    </a>
                </div><!-- /.col -->
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-4 pull-right" style="text-align: right">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-body">
        {{--Section of Statistics Start --}}
        <div class="container-fluid statistics">
            <div class="row" style="border-bottom: 1px solid #838383; padding: 8px; margin-bottom: 5px">
                <span class="fas fa-address-card container-fluid" style="font-size: 1.5em">
                    <h3 style="display: inline-block">Statistics</h3>
                </span>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <i class="fas fa-address-card"></i>
                            <h3 class="card-title" style="display: inline-block">Total Student</h3>
                            <h6> *** </h6>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="height: 265px;"></canvas>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <i class="fab fa-adn"></i>
                            <h3 class="card-title" style="display: inline-block">Attendances </h3>
                            <h6> {{date('F')}}</h6>
                            <h6> Marked : 000000</h6>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart2" style="height: 265px;"></canvas>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <i class="fab fa-accusoft"></i>
                            <h3 class="card-title" style="display: inline-block">Exam Result</h3>
                            <h6> Latest Exam </h6>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart3" style="height: 265px;"></canvas>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <i class="fab fa-accusoft"></i>
                            <h3 class="card-title" style="display: inline-block"> Fee Status</h3>
                            <h6>{{date('F')}}</h6>
                            <h6> 0.00% </h6>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart4" style="height: 265px;"></canvas>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        {{--Section of Statistics Start --}}

        {{--Section of Total Account (Receive/Payable) Start --}}
        <div class="row account">
            <div class="col-md-6 total-rcv col-sm-12 col-xs-12 ">
                <div class="row"  style="border-bottom: 1px solid #838383; padding: 8px; margin-bottom: 5px">
                    <span class="fas fa-address-card container-fluid" style="font-size: 1em">
                        <h5 style="display: inline-block">Total Receivable</h5>
                    </span>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <i class="fas fa-address-card"></i>
                                <h3 class="card-title" style="display: inline-block">Total Student</h3>
                                <h6> *** </h6>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart" style="height: 265px;"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <i class="fab fa-adn"></i>
                                <h3 class="card-title" style="display: inline-block">Attendances </h3>
                                <h6> {{date('F')}}</h6>
                                <h6> Marked : 000000</h6>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart2" style="height: 265px;"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="col-md-6 total-pay col-sm-12 col-xs-12">
                <div class="row"  style="border-bottom: 1px solid #ffffff; padding: 8px; margin-bottom: 5px">
                    <span class="fas fa-address-card container-fluid" style="font-size: 1em">
                        <h5 style="display: inline-block">Total Payable</h5>
                    </span>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #444e26 !important;">
                                <i class="fas fa-address-card"></i>
                                <h3 class="card-title" style="display: inline-block">Total Student</h3>
                                <h6> *** </h6>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="" style="height: 265px;"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #444e26 !important;">
                                <i class="fab fa-adn"></i>
                                <h3 class="card-title" style="display: inline-block">Attendances </h3>
                                <h6> {{date('F')}}</h6>
                                <h6> Marked : 000000</h6>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart2" style="height: 265px;"></canvas>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        {{--Section of Total Receive/Payable END --}}

        {{--Section of cash flow Start --}}
        <div class="row cash-flow">
            <div class="col-md-9 col-sm-12 col-xs-12 total-rcv">
                <div class="row"  style="border-bottom: 1px solid #838383; padding: 8px; margin-bottom: 5px">
                    <span class="fas fa-address-card container-fluid" style="font-size: 1em">
                        <h5 style="display: inline-block">Caash Flow</h5>
                    </span>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="card card-info">
                                <div class="card_header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart" style="height: 265px;"></canvas>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 total-pay col-sm-12 col-xs-12 ">
                <div class="row"  style="border-bottom: 1px solid #ffffff; padding: 8px; margin-bottom: 5px">
                    <span class="fas fa-address-card container-fluid" style="font-size: 1em">
                        <h5 style="display: inline-block">Cash Summery</h5>
                    </span>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="card card-primary">
                                <div class="card_header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="lineChart" style="height: 265px;"></canvas>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Section of cash flow End --}}

        {{--Section of Statistics Start --}}
        <div class="container-fluid atten-dtl">
            <div class="row" style="border-bottom: 1px solid #838383; padding: 8px; margin-bottom: 5px">
                <span class="fas fa-address-card container-fluid" style="font-size: 1.5em">
                    <h3 style="display: inline-block">Class Attendances</h3>
                </span>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-bordered table-striped">
                    <table class="" style="width: 100%">
                       <thead class="text-center">
                            <tr>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Action</th>
                            </tr>
                       </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        {{--Section of Statistics Start --}}

    </div>{{--content-body DIV END--}}
@stop

@section('plugin')
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.6.3-web/js/all.min.css') }}">
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('plugins/chartjs-old/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
@stop


@section('script')

    <script>
        $(function () {
            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
//            var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
//            // This will get the first returned node in the jQuery collection.
//            var areaChart       = new Chart(areaChartCanvas);
//
            var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [
                    {
                        label               : 'Electronics',
                        fillColor           : 'rgba(210, 214, 222, 1)',
                        strokeColor         : 'rgba(210, 214, 222, 1)',
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label               : 'Digital Goods',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

           var areaChartOptions = {
               //Boolean - If we should show the scale at all
               showScale               : true,
               //Boolean - Whether grid lines are shown across the chart
               scaleShowGridLines      : false,
               //String - Colour of the grid lines
               scaleGridLineColor      : 'rgba(0,0,0,.05)',
               //Number - Width of the grid lines
               scaleGridLineWidth      : 1,
               //Boolean - Whether to show horizontal lines (except X axis)
               scaleShowHorizontalLines: true,
               //Boolean - Whether to show vertical lines (except Y axis)
               scaleShowVerticalLines  : true,
               //Boolean - Whether the line is curved between points
               bezierCurve             : true,
               //Number - Tension of the bezier curve between points
               bezierCurveTension      : 0.3,
               //Boolean - Whether to show a dot for each point
               pointDot                : false,
               //Number - Radius of each point dot in pixels
               pointDotRadius          : 4,
               //Number - Pixel width of point dot stroke
               pointDotStrokeWidth     : 1,
               //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
               pointHitDetectionRadius : 20,
               //Boolean - Whether to show a stroke for datasets
               datasetStroke           : true,
               //Number - Pixel width of dataset stroke
               datasetStrokeWidth      : 2,
               //Boolean - Whether to fill the dataset with a color
               datasetFill             : true,
               //String - A legend template
     maintainAspectRatio     : true,
     //Boolean - whether to make the chart responsive to window resizing
     responsive              : true
   };

   //-------------
   //- LINE CHART -
   //--------------
   var lineChartCanvas          = $('#lineChart').get(0).getContext('2d');
   var lineChart                = new Chart(lineChartCanvas);
   var lineChartOptions         = areaChartOptions;
   lineChartOptions.datasetFill = false;
   lineChart.Line(areaChartData, lineChartOptions);

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);


            //pirchart2 start
            var pieChartCanvas = $('#pieChart2').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar2 end

            //pirchart3 start
            var pieChartCanvas = $('#pieChart3').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar3 end

            //pirchart3 start
            var pieChartCanvas = $('#pieChart4').get(0).getContext('2d');
            var pieChart       = new Chart(pieChartCanvas);
            var PieData        = [
                {
                    value    : 700,
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Chrome'
                },
                {
                    value    : 500,
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'IE'
                },
                {
                    value    : 400,
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'FireFox'
                },
                {
                    value    : 600,
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Safari'
                },
                {
                    value    : 300,
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Opera'
                },
                {
                    value    : 100,
                    color    : '#d2d6de',
                    highlight: '#d2d6de',
                    label    : 'Navigator'
                }
            ];
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true};
            pieChart.Doughnut(PieData, pieOptions);
            //phichar3 end


            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas                   = $('#barChart').get(0).getContext('2d');
            var barChart                         = new Chart(barChartCanvas);
            var barChartData                     = areaChartData;
            barChartData.datasets[1].fillColor   = '#00a65a';
            barChartData.datasets[1].strokeColor = '#00a65a';
            barChartData.datasets[1].pointColor  = '#00a65a';
            var barChartOptions                  = {
                //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                scaleBeginAtZero        : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : true,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - If there is a stroke on each bar
                barShowStroke           : true,
                //Number - Pixel width of the bar stroke
                barStrokeWidth          : 2,
                //Number - Spacing between each of the X value sets
                barValueSpacing         : 5,
                //Number - Spacing between data sets within X values
                barDatasetSpacing       : 1,
                //String - A legend template
                legendTemplate          : '<ul class="%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++)' +
                '{%><li><span style="background-color:%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%>=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions)
  })
  </script>
@stop
