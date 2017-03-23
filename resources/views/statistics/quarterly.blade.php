@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Thống kê Quý {{ $quarter + 1 }} năm {{ $year}} </h1>
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
                                                <option>Chọn quý</option>
                                                @foreach($quatersList as $index => $quarters)
                                                <option value="{{ $quarters->year }}Q{{ $quarters->quarter }}">
                                                    {{ $quarters->year . ' - Q' . $quarters->quarter }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">Go</button>
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
                            <div class="panel-heading">Thống kê doanh thu theo quý</div>
                            <div class="panel-body">
                                @if(count($quaterlyTotalImport) > 0)
                                <div id="selft_quarter"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thông tin chi tiết</div>
                            <div class="panel-body">
                                @if(count($quaterlyTotalImport) > 0)
                                <div id="example"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thống kê thể loại sách được ưa chuộng theo quý</div>
                            <div class="panel-body">
                                @if(count($categories) > 0)
                                    <div id="catagory"></div>
                                @else
                                    Du lieu rong!
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Top các cuốn sách được mua nhiều nhất</div>
                            <div class="panel-body">
                                @if(count($top_books) > 0)
                                <div id="top-book"></div>
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
                            <div class="panel-heading">Thống kê tăng trưởng theo quý</div>
                            <div class="panel-body">
                                @if(count($billGrowthIndexs) > 0)
                                <div id="example"></div>
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
    
    var quarter = {{$quarter}};
    var year = {{$year}};
      
   // Bar chart
    var months = [
    @foreach($quaterlyTotalImport as $totalImport)
        "{{ $totalImport->month }}",
    @endforeach
    ];

    var totalImport = [
    @foreach($quaterlyTotalImport as $totalImport)
        {{ $totalImport->total }},
    @endforeach
    ];

    var totalBill = [
    @foreach($quaterlyTotalBill as $totalBill)
        {{ $totalBill->total/1000 }},
    @endforeach
    ];
    
    var categoryData = [
            @foreach($categories as $category)
                {name: '{{ $category->name }}', y: {{ $category -> percentage }}},
            @endforeach ];
    // top hot book chart in quarter    
    var dataTopBook = {{ json_encode(array_column($top_books, 'total'), JSON_NUMERIC_CHECK)}};
    var categoriesTopBook = {!! json_encode(array_column($top_books, 'name'), JSON_NUMERIC_CHECK)!!};
    
    // growth chart for each quarter  
    var billsData = [
    @foreach($billGrowthIndexs as $billGrowthIndex)
        {{ $billGrowthIndex->index }},
    @endforeach
    ].reverse();

    var ordersData = [
    @foreach($importGrowthIndexs as $importGrowthIndex)
        {{ $importIndex[$i]->index }},
    @endforeach
    ].reverse();

    
</script>
<script src="{{asset('js/statistics/highcharts.js')}}"></script>
<script src="{{asset('js/statistics/quarterly.js')}}"></script>
@endsection
