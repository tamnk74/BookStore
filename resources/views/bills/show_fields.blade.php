<div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
        <label>Nhân viên</label>
        <p>
            <strong>{!! $bill->user->name !!}</strong><br>
            54 Nguyễn Lương Bằng<br>
            Phone: +841638021280<br>
            Email: admin@gmail.com
        </p>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <label>Khách hàng</label>
        <p>
            <strong>{!! $bill->client_name !!}</strong><br>
            K97 Nguyen Luong Bang<br>
        </p>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>Invoice #{!! $bill->id !!}</b><br>
        <br>
        <b>Date:</b> {!! $bill->created_at !!}<br>
    </div>
    <!-- /.col -->
</div>

<!-- Price Amount Field -->
<div class="form-group">
    {!! Form::label('bill_detail', 'Chi tiết hóa đơn:') !!}
    <table class="table table-bordered" id="bill_detail">
        <tr>
            <th>STT</th>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        @foreach($bill->billdetail as $billdetail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{!! $billdetail->book_id !!}</td>
            <td>{!! $billdetail->book->name !!}</td>
            <td>{!! $billdetail->amount !!}</td>
            <td>{{ $billdetail->amount*$billdetail->book->price.' VND' }}</td>
        </tr>
        @endforeach
    </table> 
</div>

<div class="col-xs-6 col-xs-offset-6">
    <p class="lead">Date {!! $bill->created_at !!}</p>

    <div class="table-responsive">
        <table class="table">
            <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{ $bill->total_price.' VND' }}</td>
            </tr>
            <tr>
                <th>Tax (10%)</th>
                <td> &nbsp;{{ ($bill->total_price/10).' VND' }}</td>
            </tr>
            <tr>
                <th>Shipping:</th>
                <td>0 VND</td>
            </tr>
            <tr>
                <th>Total:</th>
                <td>{{ ($bill->total_price*1.1).' VND' }}</td>
            </tr>
            </tbody></table>
    </div>
</div>
<div class="row no-print">
    <div class="col-xs-12">
        <a href="#" id="btn-print" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
    </div>
</div>

