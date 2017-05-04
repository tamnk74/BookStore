@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="text-center"><b>@lang('statistics.daily_statistic_in') {{ $date}}</b></h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row date-picker">
                    <div class="col-md-12 col-md-offset-4">
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker">
                                    <input type="date" class="form-control" name="date-picker"/>
                                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">@lang('statistics.daily_go')</button>
                        </form>
                    </div>
                </div>
                <div class="row top-book">
                    <div class="col-md-12">
                        <div id="">
                            <h2>@lang('statistics.daily_details')</h2>
                            <div class="content" style="height: 300px; overflow-y: auto;">
                                @if(count($billsDetails) > 0)
                                <table class="table table-responsive" id="billDetails-table">
                                    <thead>
                                    <th>@lang('statistics.daily_book_no')</th>
                                    <th>@lang('statistics.daily_book_name')</th>
                                    <th>@lang('statistics.daily_book_total')</th>
                                    <th>@lang('statistics.daily_book_total_price')</th>
                                    </thead>
                                    <tbody>

                                    @foreach($billsDetails as $billsDetail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="width: 50%">{{ $billsDetail->name }}</td>
                                            <td>{{ $billsDetail->total }}</td>
                                            <td>{{ $billsDetail->total*$billsDetail->price*(100-$billsDetail->sale)/100 }} VND</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="panel panel-default">
                                        <div class="panel-body">@lang('bills.no_data_to_display')</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable ui-sortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom" style="cursor: move;">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true">@lang('statistics.daily_bills')</a></li>
                                <li class=""><a href="#daily-import-book" data-toggle="tab" aria-expanded="false">@lang('statistics.daily_import_book')</a></li>
                                <li class="header pull-left"><i class="fa fa-database"></i> Daily</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; overflow-y: auto;">
                                    @if(count($bills) > 0)
                                        <table class="table table-responsive" id="billDetails-table">
                                            <thead>
                                            <th>@lang('statistics.daily_bill_no')</th>
                                            <th>@lang('statistics.daily_customer_name')</th>
                                            <th>@lang('statistics.daily_number')</th>
                                            <th>@lang('statistics.daily_total_price')</th>
                                            </thead>
                                            <tbody>
                                            @foreach($bills as $bill)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bill->client_name }}</td>
                                                    <td>{{ $bill->billdetail->count() }}</td>
                                                    <td>{{ $bill->total_price }} VND</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-center"><b>Total</b></td>
                                                <td></td>
                                                <td><b>{{ array_sum(array_pluck($bills, 'total_price')) }} VND</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-body">@lang('bills.no_data_to_display')</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="chart tab-pane" id="daily-import-book" style="position: relative; height: 300px; overflow-y: auto;">
                                    @if(count($topBook) > 0)
                                        <table class="table table-responsive" id="billDetails-table">
                                            <thead>
                                            <th>@lang('statistics.daily_import_no')</th>
                                            <th>@lang('statistics.daily_book_name')</th>
                                            <th>@lang('statistics.daily_number')</th>
                                            <th>@lang('statistics.daily_price')</th>
                                            </thead>
                                            <tbody>
                                            @foreach($importBooks as $importBook)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $importBook->book->name }}</td>
                                                    <td>{{ $importBook->amount }}</td>
                                                    <td>{{ $importBook->price }} VND</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-center"><b>Total</b></td>
                                                <td><b>{{ array_sum(array_pluck($importBooks, 'amount')) }} </b></td>
                                                <td><b>{{ array_sum(array_pluck($importBooks, 'price')) }} VND</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-body">@lang('bills.no_data_to_display')</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </section>
                    <!-- /.Left col -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        @if(count($topBook) >0)
        var data_topbook = {!! json_encode(array_column($topBook->toArray(), 'sum'), JSON_NUMERIC_CHECK)!!};
        var categories_topbook = {!! json_encode(array_column($topBook->toArray(), 'name'), JSON_NUMERIC_CHECK) !!};
        var labelTopbook = '@lang('statistics.daily_title_top_book')';
        var numberOfBook = '@lang('statistics.daily_number')';
        var labelBookName = '@lang('statistics.daily_book_name')';
        @endif
    </script>
    <script src="/js/statistics/highcharts.js"></script>
    <script src="/js/statistics/daily.js"></script>

@endsection
