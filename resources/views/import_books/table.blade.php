<table class="table table-responsive" id="importBooks-table">
    <thead>
        <th>@lang('import_books.label_book_id')</th>
        <th>@lang('import_books.label_book_name')</th>
        <th>@lang('import_books.label_book_number')</th>
        <th>@lang('import_books.label_price')</th>
        <th>@lang('import_books.label_date')</th>
        <th colspan="3">@lang('import_books.label_action')</th>
    </thead>
    <tbody>
    @foreach($importBooks as $importBook)
        <tr>
            <td>{!! $importBook->book_id !!}</td>
            <td>{!! $importBook->book->name !!}</td>
            <td>{!! $importBook->amount !!}</td>
            <td>{!! $importBook->price !!} VND</td>
            <td>{!! $importBook->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['importBooks.destroy', $importBook->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('importBooks.show', [$importBook->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('importBooks.edit', [$importBook->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('".__('import_books.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $importBooks->links() !!}