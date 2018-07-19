@extends('layouts.master')
@section('title','Dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

    <h1 class="">Dashboard</h1>
    <!-- WEBSITE ANALYTICS -->
    <div class="dashboard-section">

        <!-- SOCIAL -->
        <div class="dashboard-section no-margin">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-shopping-basket"></i> +636 <span>Orders</span></p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-shopping-cart"></i> +528 <span>Pending Orders</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-check-circle-o"></i> +1065 <span>Delivered orders</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-spinner"></i> +201 <span>Proccessing orders</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SOCIAL -->

        <div class="row">
            <div class="col-md-4">
                <!-- TRAFFIC SOURCES -->
                <div class="panel-content">
                    <h2 class="heading"><i class="fa fa-square"></i> Orders analytics</h2>
                    <div id="demo-pie-chart" class="ct-chart"></div>
                </div>
                <!-- END TRAFFIC SOURCES -->
            </div>
            <div class="col-md-8">
                <!-- REFERRALS -->
                <div class="panel-content">
                    <h2 class="heading"><i class="fa fa-square"></i> Orders</h2>
                    <ul class="list-unstyled list-referrals">
                        <li>
                            <p>
                                <span class="value">3,454</span>
                                <span class="text-muted">Pending orders</span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-blue">
                                <div class="progress-bar" data-transitiongoal="87"></div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span class="value">2,102</span>
                                <span class="text-muted">
                                    Processing orders
                                </span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-purple">
                                <div class="progress-bar" data-transitiongoal="34"></div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span class="value">2,874</span>
                                <span class="text-muted">Delivered orders</span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-green">
                                <div class="progress-bar" data-transitiongoal="67"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END REFERRALS -->
            </div>
        </div>
    </div>
    <!-- END WEBSITE ANALYTICS -->
    <!-- SALES SUMMARY -->
    <div class="dashboard-section">
        <div class="section-heading clearfix">
            <h2 class="section-title"><i class="fa fa-shopping-basket"></i> Sales Summary</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Recent Purchases</h3>
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Date &amp; Time</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#">763648</a></td>
                                <td>Steve</td>
                                <td>$122</td>
                                <td>Oct 21, 2016</td>
                                <td><span class="label label-success">COMPLETED</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">763649</a></td>
                                <td>Amber</td>
                                <td>$62</td>
                                <td>Oct 21, 2016</td>
                                <td><span class="label label-warning">PENDING</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">763650</a></td>
                                <td>Michael</td>
                                <td>$34</td>
                                <td>Oct 18, 2016</td>
                                <td><span class="label label-danger">FAILED</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">763651</a></td>
                                <td>Roger</td>
                                <td>$186</td>
                                <td>Oct 17, 2016</td>
                                <td><span class="label label-success">SUCCESS</span></td>
                            </tr>
                            <tr>
                                <td><a href="#">763652</a></td>
                                <td>Smith</td>
                                <td>$362</td>
                                <td>Oct 16, 2016</td>
                                <td><span class="label label-success">SUCCESS</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Top Products</h3>
                    <div id="chart-top-products" class="chartist"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SALES SUMMARY -->




    <script src="{{ asset('vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js') }}"></script>
    <script src="{{ asset('vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.js') }}"></script>


    <script>
        $(function () {
            $('.nav-dahboard').addClass('active');
            // sparkline charts
            var sparklineNumberChart = function () {

                var params = {
                    width: '140px',
                    height: '30px',
                    lineWidth: '2',
                    lineColor: '#20B2AA',
                    fillColor: false,
                    spotRadius: '2',
                    spotColor: false,
                    minSpotColor: false,
                    maxSpotColor: false,
                    disableInteraction: false
                };

                $('#number-chart1').sparkline('html', params);
                $('#number-chart2').sparkline('html', params);
                $('#number-chart3').sparkline('html', params);
                $('#number-chart4').sparkline('html', params);
            };

            sparklineNumberChart();


            // traffic sources
            var dataPie = {
                series: [45, 25, 30]
            };

            var labels = ['Direct', 'Organic', 'Referral'];
            var sum = function (a, b) {
                return a + b;
            };

            new Chartist.Pie('#demo-pie-chart', dataPie, {
                height: "270px",
                labelInterpolationFnc: function (value, idx) {
                    var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
                    return labels[idx] + ' (' + percentage + ')';
                }
            });


            // progress bars
            $('.progress .progress-bar').progressbar({
                display_text: 'none'
            });

            // line chart
            var data = {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                series: [
                    [200, 380, 350, 480, 410, 450, 550],
                ]
            };

            var options = {
                height: "200px",
                showPoint: true,
                showArea: true,
                axisX: {
                    showGrid: false
                },
                lineSmooth: false,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 30,
                    left: 30
                },
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: true
                    }),
                    Chartist.plugins.ctAxisTitle({
                        axisX: {
                            axisTitle: 'Day',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: 50
                            },
                            textAnchor: 'middle'
                        },
                        axisY: {
                            axisTitle: 'Reach',
                            axisClass: 'ct-axis-title',
                            offset: {
                                x: 0,
                                y: -10
                            },
                        }
                    })
                ]
            };

            new Chartist.Line('#demo-line-chart', data, options);


            // sales performance chart
            var sparklineSalesPerformance = function () {

                var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
                var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

                $('#chart-sales-performance').sparkline(lastWeekData, {
                    fillColor: 'rgba(90, 90, 90, 0.1)',
                    lineColor: '#5A5A5A',
                    width: '' + $('#chart-sales-performance').innerWidth() + '',
                    height: '100px',
                    lineWidth: '2',
                    spotColor: false,
                    minSpotColor: false,
                    maxSpotColor: false,
                    chartRangeMin: 0,
                    chartRangeMax: 1000
                });

                $('#chart-sales-performance').sparkline(currentWeekData, {
                    composite: true,
                    fillColor: 'rgba(60, 137, 218, 0.1)',
                    lineColor: '#3C89DA',
                    lineWidth: '2',
                    spotColor: false,
                    minSpotColor: false,
                    maxSpotColor: false,
                    chartRangeMin: 0,
                    chartRangeMax: 1000
                });
            }

            sparklineSalesPerformance();

            var sparkResize;
            $(window).on('resize', function () {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineSalesPerformance, 200);
            });


            // top products
            var dataStackedBar = {
                labels: ['Q1', 'Q2', 'Q3'],
                series: [
                    [800000, 1200000, 1400000],
                    [200000, 400000, 500000],
                    [100000, 200000, 400000]
                ]
            };

            new Chartist.Bar('#chart-top-products', dataStackedBar, {
                height: "250px",
                stackBars: true,
                axisX: {
                    showGrid: false
                },
                axisY: {
                    labelInterpolationFnc: function (value) {
                        return (value / 1000) + 'k';
                    }
                },
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: true
                    }),
                    Chartist.plugins.legend({
                        legendNames: ['Phone', 'Laptop', 'PC']
                    })
                ]
            }).on('draw', function (data) {
                if (data.type === 'bar') {
                    data.element.attr({
                        style: 'stroke-width: 30px'
                    });
                }
            });


            // notification popup
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.options.showDuration = 1000;
            toastr['info']('Hello, welcome to DiffDash, a unique admin dashboard.');

        });
    </script>
@endsection


