<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã hóa đơn:') !!}
    <p>{!! $bill->id !!}</p>
</div>

<!-- Client Name Field -->
<div class="form-group">
    {!! Form::label('client_name', 'Tên khách hàng:') !!}
    <p>{!! $bill->client_name !!}</p>
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

<!-- Price Amount Field -->
<div class="form-group">
    {!! Form::label('price_amount', 'Tổng tiền:') !!}
    <p>{{ $bill->price_amount.' VND' }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Ngày lập:') !!}
    <p>{!! $bill->date !!}</p>
</div>
