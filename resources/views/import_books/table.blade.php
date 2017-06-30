<table class="table table-responsive" id="importBooks-table">
    <thead>
        <th>@lang('import_books.label_no')</th>
        <th>@lang('import_books.label_book_name')</th>
        <th>@lang('import_books.label_book_number')</th>
        <th>@lang('import_books.label_price')</th>
        <th>@lang('import_books.label_supplier')</th>
        <th>@lang('import_books.label_date')</th>
        <th colspan="3">@lang('import_books.label_action')</th>
    </thead>
    <tbody>
    @foreach($importBooks as $importBook)
        @if($importBook->book != null)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('books.show', ['id' => $importBook->book_id]) }}">{{ $importBook->book->name }}</a></td>
            <td>{{ $importBook->amount }}</td>
            <td>{{ $importBook->price }} VND</td>
            <td>{{ $importBook->supplier->name }}</td>
            <td>{{ $importBook->created_at }}</td>
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
        @endif
    @endforeach
    </tbody>
</table>
{!! $importBooks->links() !!}