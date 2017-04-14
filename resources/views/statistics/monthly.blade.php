@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Thống kê tháng {{ $month." - ".$year}}</h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            
            <div class="row month-picker">
                <div class="col-md-12 col-md-offset-4">
                    <form class="form-inline">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker">                         
                            <input type="date" class="form-control" name="date_picker" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Monthly Recap Report</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px; width: 1069px;" height="180" width="1069"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group">
                                        <span class="progress-text">Add Products to Cart</span>
                                        <span class="progress-number"><b>160</b>/200</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Complete Purchase</span>
                                        <span class="progress-number"><b>310</b>/400</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="progress-number"><b>480</b>/800</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Send Inquiries</span>
                                        <span class="progress-number"><b>250</b>/500</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">$35,210.43</h5>
                                        <span class="description-text">TOTAL REVENUE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL COST</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">$24,813.53</h5>
                                        <span class="description-text">TOTAL PROFIT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                        <h5 class="description-header">1200</h5>
                                        <span class="description-text">GOAL COMPLETIONS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>


            </div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable ui-sortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom" style="cursor: move;">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                            <li class="active"><a href="#top-book-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.daily_bills')</a></li>
                            <li class=""><a href="#top-category-chart" data-toggle="tab" aria-expanded="false">@lang('statistics.daily_import_book')</a></li>
                            <li class="header pull-left"><i class="fa fa-database"></i> Daily</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="top-book-chart" style="position: relative; height: 450px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                @if(count($top_books) > 0)
                                    <div id="top-book"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                            <div class="chart tab-pane" id="top-category-chart" style="position: relative; height: 450px;">
                                @if(count($categories) > 0)
                                    <div id="catagory"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                    <!-- /.Left col -->
                </section>
            </div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable ui-sortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom" style="cursor: move;">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                            <li class="active"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.monthly_revenue')</a></li>
                            <li class=""><a href="#turnover-chart" data-toggle="tab" aria-expanded="false">@lang('statistics.monthly_turnover')</a></li>
                            <li class="header pull-left"><i class="fa fa-database"></i> Daily</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 450px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                @if(count($bills) > 0)
                                    <div id="revenue"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                            <div class="chart tab-pane" id="turnover-chart" style="position: relative; height: 450px; width: 100%;">
                                @if(count($bills) > 0)
                                    <div id="turnover"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-cust
                <!-- /.Left col -->
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    var data_topbook = {{ json_encode(array_column($top_books, 'total'), JSON_NUMERIC_CHECK)}};
    var categories_topbook = {!! json_encode(array_column($top_books, 'name'), JSON_NUMERIC_CHECK)!!};
    
    var data_bill = {{ json_encode(array_column($bill, 'total'), JSON_NUMERIC_CHECK)}};
    var data_import = {{ json_encode(array_column($import_book, 'total'), JSON_NUMERIC_CHECK)}};
    var data_bills = {{ json_encode(array_column($bills, 'total'), JSON_NUMERIC_CHECK)}};
    var data_imports = {{ json_encode(array_column($import_books, 'total'), JSON_NUMERIC_CHECK)}};
    var categories_month = {!! json_encode(array_column($bills, 'month'), JSON_NUMERIC_CHECK)!!};
   
    var categoryData = [
            @foreach($categories as $category)
                {name: '{{ $category->name }}', y: {{ $category -> percentage }}},
            @endforeach ];
    var month = {{$month}};
    var year = {{ $year}};</script>
<script src="/js/statistics/highcharts.js"></script>
<script src="/js/statistics/monthly.js"></script>
<script src="/js/statistics/Chart.min.js"></script>
    <script type="text/javascript">
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-----------------------
        //- MONTHLY SALES CHART -
        //-----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Electronics",
                    fillColor: "rgb(210, 214, 222)",
                    strokeColor: "rgb(210, 214, 222)",
                    pointColor: "rgb(210, 214, 222)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgb(220,220,220)",
                    data: [65, 0, 0, 0, 56, 55, 40]
                },
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [28, 0, 0, 0, 86, 27, 90]
                }
            ]
        };

        var salesChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);
    </script>
@endsection
