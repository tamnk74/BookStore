<table class="table table-responsive" id="suppliers-table">
    <thead>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th colspan="3">Thao tác</th>
    </thead>
    <tbody>
    @foreach($suppliers as $supplier)
        <tr>
            <td>{!! $supplier->name !!}</td>
            <td>{!! $supplier->address !!}</td>
            <td>{!! $supplier->phone_number !!}</td>
            <td>
                {!! Form::open(['route' => ['suppliers.destroy', $supplier->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('suppliers.show', [$supplier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('suppliers.edit', [$supplier->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>