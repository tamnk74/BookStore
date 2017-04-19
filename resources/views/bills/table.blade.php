<table class="table table-responsive" id="billDetails-table">
    <thead>
        <th>@lang('bills.label_bills_no')</th>
        <th>@lang('bills.label_bills_code')</th>
        <th>@lang('bills.label_customers_name')</th>
        <th>@lang('bills.label_bills_details')</th>
        <th>@lang('bills.label_total')</th>
        <th>@lang('bills.label_date')</th>
        <th colspan="3">@lang('bills.label_action')</th>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $bill->id !!}</td>
            <td>{!! $bill->client_name !!}</td>
            <td>
                @foreach($bill->billdetail as $billdetail)
                {!! $billdetail->book->name !!},
                @endforeach
            </td>
            <td>{!! $bill->total_price !!} VND</td>
            <td>{!! $bill->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['bills.destroy', $bill->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bills.show', [$bill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bills.edit', [$bill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('".__('bills.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>