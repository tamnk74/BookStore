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
                    <form class="form-inline" action="{{ route('statistic.monthly') }}" method="GET">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker'>
                                <input type='text' class="form-control" name="date_picker" value="{{ $month.'/'.$year  }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">@lang('statistics.daily_go')</button>
                    </form>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('statistics.monthly_report') {{ $month }}</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <h5 class="description-header">{{ $report['revenue'] }} VND</h5>
                                        <span class="description-text">@lang('statistics.revenue')</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <h5 class="description-header">{{ $report['cost'] }} VND</h5>
                                        <span class="description-text">@lang('statistics.cost')</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block border-right">
                                        <h5 class="description-header">{{ $report['revenue'] - $report['cost'] }} VND</h5>
                                        <span class="description-text">@lang('statistics.profit')</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $report['sale'] }}</h5>
                                        <span class="description-text">@lang('statistics.sale')</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
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
                            <li class="active" id="revenue-tab"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.monthly_revenue')</a></li>
                            <li class="" id="sale-tab"><a href="#turnover-chart" data-toggle="tab" aria-expanded="false">@lang('statistics.monthly_turnover')</a></li>
                            <li class="header pull-left"><i class="fa fa-database"></i> Monthly</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; width: 100%; height: 450px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                @if(count($revenues) > 0)
                                    <div id="revenue"></div>
                                @else
                                    @lang('statistics.no_data')
                                @endif
                            </div>
                            <div class="chart tab-pane" id="turnover-chart" style="position: relative; height: 450px; width: 100%;">
                                @if(count($costs) > 0)
                                    <div id="turnover"></div>
                                @else
                                    @lang('statistics.no_data')
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-cust
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
                            <li class="active"><a href="#top-book-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.monthly_top_book')</a></li>
                            <li class="" id="cate-chart"><a href="#top-category-chart" data-toggle="tab" aria-expanded="false">@lang('statistics.monthly_top_categories')</a></li>
                            <li class="header pull-left"><i class="fa fa-database"></i> Monthly</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="top-book-chart" style="position: relative; height: 450px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                @if(count($topBooks) > 0)
                                    <div id="top-book"></div>
                                @else
                                    @lang('statistics.no_data')
                                @endif
                            </div>
                            <div class="chart tab-pane" id="top-category-chart" style="position: relative; height: 450px;">
                                @if(count($categories) > 0)
                                    <div id="catagory"></div>
                                @else
                                    @lang('statistics.no_data')
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                    <!-- /.Left col -->
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datepicker({
            autoclose: true,
            viewMode: "months",
            minViewMode: "months",
            format: 'mm/yyyy'
        });
    });
</script>
<script type="text/javascript">
    var data_topbook = {{ json_encode(array_column($topBooks->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
    var categories_topbook = {!! json_encode(array_column($topBooks->toArraY(), 'name'), JSON_NUMERIC_CHECK)!!};
    
    var data_bill = {{ json_encode(array_column($revenues->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
    var data_import = {{ json_encode(array_column($costs->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
    var data_bills = {{ json_encode(array_column($sales->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
    var data_imports = {{ json_encode(array_column($totalImport->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
    var categories_month = {!! json_encode(array_column($revenues->toArray(), 'month'), JSON_NUMERIC_CHECK)!!};
   
    var categoryData = [
            @foreach($categories as $category)
                {name: '{{ $category->name }}', y: {{ $category -> percentage }}},
            @endforeach ];
    var month = {{$month}};
    var year = {{ $year}};
</script>
<script src="/js/statistics/highcharts.js"></script>
<script src="/js/statistics/monthly.js"></script>
<script src="/js/statistics/Chart.min.js"></script>
@endsection
