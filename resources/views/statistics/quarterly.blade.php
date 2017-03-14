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
                <div class="row">
                    <div class="col-md-6">
                        <div id="example">Thống kê doanh thu theo quý</div>
                    </div>
                    <div class="col-md-6">
                        <div id="example">Thông tin chi tiết</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div id="example">Thống kê thể loại sách được ưa chuộng theo quý</div>
                    </div>
                    <div class="col-md-6">
                        <div id="example">Top các cuốn sách được mua nhiều nhất</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div id="example">Thống kê tăng trưởng theo quý</div>
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

      

});

</script>
@endsection
