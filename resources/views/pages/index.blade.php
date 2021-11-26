@extends('layouts.main')

@section('title', 'Dashboard')

@section('css')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/jqvmap/jqvmap.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="{{url('assets')}}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            <h5>Draft</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_draft">{{$card_draft}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            <h5>Submitted</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_submitted">{{$card_submitted}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-info">
                            <h5>Open</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_open">{{$card_open}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-primary">
                            <h5>Responded</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_responded">{{$card_responded}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-success">
                            <h5>Verified</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_verified">{{$card_verified}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-success">
                            <h5>Closed</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_closed">{{$card_closed}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-warning">
                            <h5>Re-Open</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_re_open">{{$card_re_open}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card text-center">
                        <div class="card-header bg-secondary">
                            <h5>Voided</h5>
                        </div>
                        <div class="card-body">
                            <span id="card_voided">{{$card_voided}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    CARP
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btnRefresh">Refresh</button>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="chart" id="carp-chart" style="position: relative; height: 300px;">
                        <canvas id="carp-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- right col -->
            </div>
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                        <h3 class="card-title">CARP</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                        <canvas id="carp-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- ChartJS -->
    <script src="{{url('assets')}}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('assets')}}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{url('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{url('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{url('assets')}}/plugins/moment/moment.min.js"></script>
    <script src="{{url('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{url('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{url('assets')}}/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script type="text/javascript">
        var is_running = true;
        var pieChartCanvas = $('#carp-chart-canvas').get(0).getContext('2d')
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true

        $(document).ready(function() {
            startCarousel();
            setInitChart();

            var $carpChart = $('#carp-chart')
            // eslint-disable-next-line no-unused-vars
            var carpChart = new Chart($carpChart, {
                type: 'bar',
                data: {
                labels: ['COMMERCIAL', 'CR', 'HR & GA', 'HSE', 'IT', 'KEY ACCOUNT', 'OPERATION', 'PROCUREMENT', 'SALES', 'TRUCKING'],
                datasets: [
                    {
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [1000, 2000, 3000, 2500, 2700, 2500, 3000, 2450, 4300, 1233]
                    },
                    {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [700, 1700, 2700, 2000, 1800, 1500, 2000, 1000, 2000, 3000, 2500]
                    }
                ]
                },
                options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                    // display: false,
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value) {
                        if (value >= 1000) {
                            value /= 1000
                            value += 'k'
                        }

                        return '$' + value
                        }
                    }, ticksStyle)
                    }],
                    xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                    }]
                }
                }
            })

            $('.btnRefresh').on('click', function(e) {
                setInitChart();
            });
        })

        function setInitChart() {
            $.ajax({
                url: "{{url('')}}/carp/data/get-dashboard",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    setChartData(response)
                },
                error: function() {
                },
            })
        }

        function startCarousel() {
            setInterval(function doSomething() {
                if (is_running) realtimeUpdate();
            }, 5000);
        }

        function realtimeUpdate() {
            is_running = false;
            $.ajax({
                url: "{{url('')}}/carp/data/get-dashboard",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#card_draft').html(response.card_draft);
                    $('#card_submitted').html(response.card_submitted);
                    $('#card_open').html(response.card_open);
                    $('#card_responded').html(response.card_responded);
                    $('#card_verified').html(response.card_verified);
                    $('#card_closed').html(response.card_closed);
                    $('#card_re_open').html(response.card_re_open);
                    $('#card_voided').html(response.card_voided);

                    is_running = true;
                },
                error: function() {
                },
            })
        }

        function setChartData(data) {
            var pieData = {
                labels: [
                'Canceled',
                'Open',
                'Closed'
                ],
                datasets: [
                {
                    data: [data.chart_canceled, data.chart_open, data.chart_closed],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12']
                }
                ]
            }
            var pieOptions = {
                legend: {
                display: false
                },
                maintainAspectRatio: false,
                responsive: true
            }
            // Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            // eslint-disable-next-line no-unused-vars
            var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })
        }
    </script>
@endsection
