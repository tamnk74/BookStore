<table class="table table-responsive" id="books-table">
    <thead>
        <th>@lang('books.label_book_no')</th>
        <th>@lang('books.label_book_name')</th>
        <th>@lang('books.label_book_author')</th>
        <th>@lang('books.label_book_publisher')</th>
        <th>@lang('books.label_book_price')</th>
        <th>@lang('books.label_book_category')</th>
        <th>@lang('books.label_book_type')</th>
        <th>@lang('books.label_book_publishing_year')</th>
        <th>@lang('books.label_book_sale')</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td style="width: 25%">{{ $book->name }}</td>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->publisher->name }}</td>
            <td>{{ $book->price }} VND</td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->type->name }}</td>
            <td>{{ $book->publishing_year }}</td>
            <td>{{ $book->sale }}%</td>
            <td>
                {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('books.show', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('books.edit', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',
                    'onclick' => "return confirm('".__('books.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $books->links() }}