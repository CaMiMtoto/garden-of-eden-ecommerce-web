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

        <!-- Orders -->
        <div class="dashboard-section no-margin">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-shopping-basket"></i> {{ number_format(\App\MyFunc::counts("orders")) }}
                            <span>Orders</span></p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-shopping-cart"></i> {{ number_format(\App\MyFunc::countOrdersByStatus("Pending")) }}
                            <span>Pending Orders</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-check-circle-o"></i> {{ number_format(\App\MyFunc::countOrdersByStatus("Delivered")) }}
                            <span>Delivered orders</span>
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="metric-inline">
                            <i class="fa fa-spinner"></i> {{ number_format(\App\MyFunc::countOrdersByStatus("Processing")) }}
                            <span>Processing orders</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END  -->

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
                                <span class="value"> {{ number_format(\App\MyFunc::countOrdersByStatus("Pending")) }} </span>
                                <span class="text-muted">Pending orders</span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-blue">
                                <div class="progress-bar" id="pending_status"
                                     data-transitiongoal="{{ \App\MyFunc::countOrdersByStatusPercentage('Pending') }}"></div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span class="value">  {{ number_format(\App\MyFunc::countOrdersByStatus("Processing")) }}</span>
                                <span class="text-muted">
                                    Processing orders
                                </span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-purple">
                                <div id="processing_status" class="progress-bar"
                                     data-transitiongoal="{{ \App\MyFunc::countOrdersByStatusPercentage('Processing') }}"></div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <span class="value"> {{ number_format(\App\MyFunc::countOrdersByStatus("Delivered")) }} </span>
                                <span class="text-muted">Delivered orders</span>
                            </p>
                            <div class="progress progress-xs progress-transparent custom-color-green"
                                 style="color: #5CB85C">
                                <div class="progress-bar" id="delivered_status"
                                     data-transitiongoal="{{ \App\MyFunc::countOrdersByStatusPercentage('Delivered') }}"></div>
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
                    <h3 class="heading"><i class="fa fa-square"></i> Recent orders</h3>
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
                            @foreach(\App\MyFunc::recentOrders() as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->clientName }}</td>
                                    <td>{{ number_format($order->orderItems()->sum('sub_total')) }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if( $order->status=="Pending")
                                            <span class="label label-primary">
                                                <i class="fa fa-shopping-cart"></i>
                                                {{ $order->status }}</span>
                                        @elseif( $order->status=="Processing")
                                            <span class="label " style="background-color: #AB7DF6">
                                                <i class="fa fa-spinner"></i>
                                                {{ $order->status }}</span>
                                        @elseif( $order->status=="Delivered")
                                            <span class="label label-success">
                                                <i class="fa fa-check-circle-o"></i>
                                                {{ $order->status }}</span>
                                        @else
                                            <span class="label label-warning">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-content">
                    <h3 class="heading"><i class="fa fa-square"></i> Top Products</h3>
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Sold times#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\MyFunc::topSellingProducts() as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- END SALES SUMMARY -->

    <!-- Orders -->
    <div class="dashboard-section no-margin">
        <div class="panel-content">
            <h3 class="heading"><i class="fa fa-square"></i>Stock summary</h3>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline">
                        <i class="fa fa-money"></i> {{ number_format(\App\MyFunc::toMoneyIncome()) }}
                        <span>Total revenue</span></p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline">
                        <i class="fa fa-product-hunt"></i> {{ number_format(\App\MyFunc::counts("products")) }}
                        <span>Products</span>
                    </p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline">
                        <i class="fa fa-list-ul"></i> {{ number_format(\App\MyFunc::counts("categories")) }}
                        <span>Categories</span>
                    </p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <p class="metric-inline">
                        <i class="fa fa-users"></i> {{ number_format(\App\MyFunc::totalClients()) }}
                        <span>Clients</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END  -->



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


            var n1 = parseInt($('#pending_status').attr('data-transitiongoal'));
            var n2 = parseInt($('#processing_status').attr('data-transitiongoal'));
            var n3 = parseInt($('#delivered_status').attr('data-transitiongoal'));
            // traffic sources
            var dataPie = {
                series: [n1, n2, n3]
            };

            var labels = ['Pending', 'Processing', 'Delivered'];
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


            // notification popup
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';
            toastr.options.showDuration = 1000;
            toastr['info']('Hello, Garden of Eden, the dashboard summary.');

        });
    </script>
@endsection


