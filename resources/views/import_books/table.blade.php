<table class="table table-responsive" id="importBooks-table">
    <thead>
        <th>Book Id</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Buy Price</th>
        <th>Sell Price</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($importBooks as $importBook)
        <tr>
            <td>{!! $importBook->book_id !!}</td>
            <td>{!! $importBook->amount !!}</td>
            <td>{!! $importBook->date !!}</td>
            <td>{!! $importBook->buy_price !!}</td>
            <td>{!! $importBook->sell_price !!}</td>
            <td>
                {!! Form::open(['route' => ['importBooks.destroy', $importBook->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('importBooks.show', [$importBook->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('importBooks.edit', [$importBook->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>