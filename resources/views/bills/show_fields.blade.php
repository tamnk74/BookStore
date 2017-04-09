<div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
        <label>@lang('bills.label_cashier')</label>
        <p>
            <strong>{!! $bill->user->name !!}</strong><br>
            54 Nguyễn Lương Bằng<br>
            Phone: +841638021280<br>
            Email: admin@gmail.com
        </p>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <label>@lang('bills.label_customer')</label>
        <p>
            <strong>{!! $bill->client_name !!}</strong><br>
            K97 Nguyen Luong Bang<br>
        </p>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <b>@lang('bills.label_invoice') #{!! $bill->id !!}</b><br>
        <br>
        <b>@lang('bills.label_date'):</b> {!! $bill->created_at !!}<br>
    </div>
    <!-- /.col -->
</div>

<!-- Price Amount Field -->
<div class="form-group">
    {!! Form::label('bill_detail', __('bills.label_bill_detail')) !!}
    <table class="table table-bordered" id="bill_detail">
        <tr>
            <th>@lang('bills.label_books_no')</th>
            <th>@lang('bills.label_book_code')</th>
            <th>@lang('bills.label_book_name')</th>
            <th>@lang('bills.label_book_number')</th>
            <th>@lang('bills.label_subtotal')</th>
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
    <p class="lead">@lang('bills.label_date'): {!! $bill->created_at !!}</p>

    <div class="table-responsive">
        <table class="table">
            <tbody><tr>
                <th style="width:50%">@lang('bills.label_subtotal'):</th>
                <td>{{ $bill->total_price.' VND' }}</td>
            </tr>
            <tr>
                <th>@lang('bills.label_tax') (10%)</th>
                <td> &nbsp;{{ ($bill->total_price/10).' VND' }}</td>
            </tr>
            <tr>
                <th>@lang('bills.label_shipping')</th>
                <td>0 VND</td>
            </tr>
            <tr>
                <th>@lang('bills.label_total'):</th>
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

