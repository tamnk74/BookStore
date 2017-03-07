<table class="table table-responsive" id="billDetails-table">
    <thead>
        <th>Book Id</th>
        <th>Amount</th>
        <th>Bill Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($billDetails as $billDetail)
        <tr>
            <td>{!! $billDetail->book_id !!}</td>
            <td>{!! $billDetail->amount !!}</td>
            <td>{!! $billDetail->bill_id !!}</td>
            <td>
                {!! Form::open(['route' => ['billDetails.destroy', $billDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('billDetails.show', [$billDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('billDetails.edit', [$billDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>