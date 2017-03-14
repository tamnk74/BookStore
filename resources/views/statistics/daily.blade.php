@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Thống kê theo tháng</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row top-book">
                    <div class="col-md-6">
                        <div id="top-book"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="">
                            <h2>Thông tin chi tiết</h2>
                            <div class="content">
                                <table class="table table-responsive" id="billDetails-table">
                                    <thead>
                                        <th>STT</th>
                                        <th>Mã sách</th>
                                        <th>Tên sách</th>
                                        <th>Số lượng</th>
                                    </thead>
                                    <tbody>
                                    @foreach($top_books_details as $top_books_detail)
                                        <tr>
                                            <td>{!! $loop->iteration !!}</td>
                                            <td>{!! $top_books_detail["id"] !!}</td>
                                            <td>{!! $top_books_detail["name"] !!}</td>
                                            <td>{!! $top_books_detail["total"] !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row bill">
                    <div class="col-md-6">
                        <div id=""></div>
                    </div>
                    <div class="col-md-6">
                        <div id="example">
                            <h2>Thông tin chi tiết</h2>
                            <div class="content">
                                <table class="table table-responsive" id="billDetails-table">
                                    <thead>
                                        <th>STT</th>
                                        <th>Mã sách</th>
                                        <th>Tên sách</th>
                                        <th>Số lượng</th>
                                    </thead>
                                    <tbody>
                                    @foreach($top_books_details as $top_books_detail)
                                        <tr>
                                            <td>{!! $loop->iteration !!}</td>
                                            <td>{!! $top_books_detail["id"] !!}</td>
                                            <td>{!! $top_books_detail["name"] !!}</td>
                                            <td>{!! $top_books_detail["total"] !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/js/statistics/highcharts.js"></script>
<script type="text/javascript">
    
    $(function () { 
        
        var data_topbook = {{ json_encode(array_column($top_book, 'sum'),JSON_NUMERIC_CHECK)}};
        
    $('#top-book').highcharts({

        chart: {

            type: 'column'

        },

        title: {

            text: 'Top 5 cuốn sách bán chạy nhất ngày'

        },

        xAxis: {

            categories: {!! json_encode(array_column($top_book, 'name'),JSON_NUMERIC_CHECK)!!}

        },

        yAxis: {

            title: {

                text: 'Số lượng'

            }

        },

        series: [{

            name: 'Tên sách',

            data: data_topbook

        }]

    });

});

</script>
@endsection
