@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="text-center"><b>Thống kê ngày {{ $date}}</b></h1>
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
                            <input type="date" class="form-control" name="date-picker" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
            </div>
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
            <hr>
            <div class="row bill">
                <div class="col-md-12">
                    <div id="example">
                        <h2>Thống kê hóa đơn</h2>
                        <div class="content">
                            <table class="table table-responsive" id="billDetails-table">
                                <thead>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số lượng sách</th>
                                <th>Chi phí</th>
                                </thead>
                                <tbody>
                                    @foreach($bills as $bill)
                                    <tr>
                                        <td>{!! $loop->iteration !!}</td>
                                        <td>{!! $bill->client_name !!}</td>
                                        <td>{!! count($bill->billdetail) !!}</td>
                                        <td>{!! $bill->price_amount !!} VND</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row bill">
                <div class="col-md-12">
                    <div id="example">
                        <h2>Thống kê nhập sách</h2>
                        <div class="content">
                            <table class="table table-responsive" id="billDetails-table">
                                <thead>
                                <th>STT</th>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Chi phí</th>
                                </thead>
                                <tbody>
                                    @foreach($import_books as $import_book)
                                    <tr>
                                        <td>{!! $loop->iteration !!}</td>
                                        <td>{!! $import_book->book->id !!}</td>
                                        <td>{!! $import_book->book->name !!}</td>
                                        <td>{!! $import_book->amount !!}</td>
                                        <td>{!! $import_book->buy_price !!} VND</td>
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
<script type="text/javascript">
    var data_topbook = {{ json_encode(array_column($top_book, 'sum'), JSON_NUMERIC_CHECK)}};
    var categories_topbook = {!! json_encode(array_column($top_book, 'name'), JSON_NUMERIC_CHECK)!!};
</script>
<script src="/js/statistics/highcharts.js"></script>
<script src="/js/statistics/daily.js"></script>

@endsection
