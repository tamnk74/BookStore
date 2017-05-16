@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('statistics.quarter'){{ $quarter}} @lang('statistics.year') {{ $year}} </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                        <!--selectbox-->
                        <div class="form-group pull-right btn-block">
                            <form id="quater-selector" class="form-inline pull-right" action="{{ route('statistic.quarterly') }}">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="input-prepend input-group">
                                            <span class="add-on input-group-addon">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </span>
                                            <select name="quarter" id="quarter" class="form-control pull-right">
                                                <option>@lang('statistics.select_quarter')</option>
                                                @foreach($quatersList as $index => $quarters)
                                                    <option value="{{ $quarters->year }}Q{{ $quarters->quarter }}">
                                                        {{ $quarters->year . ' - Q' . $quarters->quarter }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">@lang('statistics.daily_go')</button>
                                </fieldset>
                            </form>
                        </div>
                        <!--/selectbox-->
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistics.quarterly_revenue')</div>
                            <div class="panel-body">
                                <div id="revenue-quarter"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistics.quarterly_sale')</div>
                            <div class="panel-body">
                                <div id="sale_quarter"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable ui-sortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom" style="cursor: move;">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                <li class="active"><a href="#top-book-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.quarterly_top_books')</a></li>
                                <li class=""><a href="#top-category-chart" data-toggle="tab" aria-expanded="false">@lang('statistics.quarterly_top_categories')</a></li>
                                <li class="header pull-left"><i class="fa fa-database"></i> Quarterly</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="top-book-chart" style="position: relative; height: 450px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                    @if(count($topBooks->toArray()) > 0)
                                        <div id="top-book"></div>
                                    @else
                                        @lang('statistics.no_data')
                                            @endif
                                </div>
                                <div class="chart tab-pane" id="top-category-chart" style="position: relative; height: 450px;">
                                    @if(count($categories->toArray()) > 0)
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">@lang('statistics.quarterly')</div>
                            <div class="panel-body" style="height: 400px">
                                <div id="revenue-chart" style="height: 350px">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        var quarter = {{$quarter}};
        var year = {{$year}};

        // Bar chart
        var months = {{ json_encode(array_column($quaterlyTotalImport->toArray(), 'month'), JSON_NUMERIC_CHECK)}};
        var totalImport = {{ json_encode(array_column($quaterlyTotalImport->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
        var totalBill = {{ json_encode(array_column($quaterlyTotalBill->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
        var revenue = {{ json_encode(array_column($quarterRenevue->toArray(), 'revenue'), JSON_NUMERIC_CHECK)}};
        var cost = {{ json_encode(array_column($quarterCost->toArray(), 'cost'), JSON_NUMERIC_CHECK)}};

        var categoryData = [
                @foreach($categoriesPercent as $category)
                    {name: '{{ $category->name }}', y: {{ $category -> percentage }}},
                @endforeach ];
        // top hot book chart in quarter
        var dataTopBook = {{ json_encode(array_column($topBooks->toArray(), 'total'), JSON_NUMERIC_CHECK)}};
        var categoriesTopBook = {!! json_encode(array_column($topBooks->toArray(), 'name'), JSON_NUMERIC_CHECK)!!};

        var revenueQuarters = {!! json_encode($revenueQuarters) !!};

    </script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>

    <script src="{{asset('js/statistics/highcharts.js')}}"></script>
    <script src="{{asset('js/statistics/quarterly.js')}}"></script>
@endsection