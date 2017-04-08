<table class="table table-responsive" id="stores-table">
    <thead>
        <th>Mã sách</th>
        <th>Tên sách</th>
        <th>Số sách hiện tại</th>
        <th>Số sách đã nhập</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($stores as $store)
        <tr>
            <td>{!! $store->book_id !!}</td>
            <td>{!! $store->book->name !!}</td>
            <td>{!! $store->amount !!}</td>
            <td>{!! $store->total_amount !!}</td>
            <td>
                {!! Form::open(['route' => ['stores.destroy', $store->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stores.show', [$store->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stores.edit', [$store->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>