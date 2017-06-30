<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header" style="padding-right: 20px">
            <i class="fa fa-globe"></i> @lang('layouts.app_title')
            <small class="pull-right">@lang('bills.label_date'): {{$bill->created_at}}</small>
        </h2>
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-xs-4">
        <label>@lang('bills.label_cashier')</label>
        <p>
            <strong>{!! $bill->user->name !!}</strong><br>
            @lang('bills.label_address'): {{ isset($profile->address) ? $profile->address : ""}}<br>
            @lang('bills.label_phone_number'): {{ isset($profile->phone_number)? $profile->phone_number : "" }}<br>
            @lang('bills.label_email'): {{ $user->email }}
        </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        <label>@lang('bills.label_customer')</label>
        <p>
            <strong>{!! $bill->client_name !!}</strong><br>
            {{ $bill->client_address }}<br>
        </p>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
        <b>@lang('bills.label_invoice') #{!! $bill->id !!}</b><br>
        <br>
        <b>@lang('bills.label_date'):</b> {!! $bill->created_at->format('d/m/Y') !!}<br>
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
            <th>@lang('bills.label_book_price')</th>
            <th>@lang('bills.label_subtotal')</th>
        </tr>
        @foreach($bill->billdetail as $billdetail)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{!! $billdetail->book_id !!}</td>
            <td>{!! $billdetail->book->name !!}</td>
            <td>{!! $billdetail->amount !!}</td>
            <td>{!! $billdetail->price !!}</td>
            <td>{{ $billdetail->amount*$billdetail->price.' VND' }}</td>
        </tr>
        @endforeach
    </table>
</div>

<div class="col-xs-6 col-xs-offset-6">
    <p class="lead">@lang('bills.label_date'): {!! $bill->created_at->format('d/m/Y') !!}</p>

    <div class="table-responsive">
        <table class="table">
            <tbody><tr>
                <th style="width:50%">@lang('bills.label_subtotal'):</th>
                <td>{{ $bill->total_price.' VND' }}</td>
            </tr>
            <tr>
                <th>@lang('bills.label_tax') (0%)</th>
                <td> &nbsp;0 VND</td>
            </tr>
            <tr>
                <th>@lang('bills.label_shipping')</th>
                <td>0 VND</td>
            </tr>
            <tr>
                <th>@lang('bills.label_total'):</th>
                <td>{{ ($bill->total_price).' VND' }}</td>
            </tr>
            </tbody></table>
    </div>
</div>


