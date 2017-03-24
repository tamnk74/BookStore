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
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Top các cuốn sách được ưa thích</div>
                        <div class="panel-body">
                            @if(count($top_books) > 0)
                                <div id="top-book"></div>
                            @else
                                Du lieu rong!
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thể loại sách được ưa thích</div>
                        <div class="panel-body">
                            @if(count($categories) > 0)
                                <div id="catagory"></div>
                            @else
                                Du lieu rong!
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thống kê doanh thu  theo tháng</div>
                        <div class="panel-body">
                            @if(count($bills) > 0)
                                <div id="revenue"></div>
                            @else
                                Du lieu rong!
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thống kê doanh số  theo tháng</div>
                        <div class="panel-body">
                            @if(count($bills) > 0)
                                <div id="turnover"></div>
                            @else
                                Du lieu rong!
                            @endif
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
@endsection
