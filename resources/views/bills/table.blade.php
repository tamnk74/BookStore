<table class="table table-responsive" id="billDetails-table">
    <thead>
        <th>STT</th>
        <th>Mã hóa đơn</th>
        <th>Tên khách hàng</th>
        <th>Chi tiết</th>
        <th>Thành Tiền</th>
        <th>Ngày mua</th>
        <th colspan="3">Hành động</th>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $bill->id !!}</td>
            <td>{!! $bill->client_name !!}</td>
            <td>
                <ul class="list-group">
                    @foreach($bill->billdetail as $billdetail)
                    <li class="list-group-item">{!! $billdetail->book->name !!}<span class="badge">{!! $billdetail->amount !!}</span></li>
                    @endforeach
                </ul>
            </td>
            <td>{!! $bill->total_price !!}</td>
            <td>{!! $bill->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['bills.destroy', $bill->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bills.show', [$bill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bills.edit', [$bill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>