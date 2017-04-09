<table class="table table-responsive" id="books-table">
    <thead>
        <th>@lang('books.label_book_name')</th>
        <th>@lang('books.label_book_author')</th>
        <th>@lang('books.label_book_publish')</th>
        <th>@lang('books.label_book_price')</th>
        <th>@lang('books.label_book_front_cover')</th>
        <th>@lang('books.label_book_back_cover')</th>
        <th>@lang('books.label_book_category')</th>
        <th>@lang('books.label_book_type')</th>
        <th>@lang('books.label_book_pulishing_year')</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{!! $book->name !!}</td>
            <td>{!! $book->author->name !!}</td>
            <td>{!! $book->publish->name !!}</td>
            <td>{!! $book->price !!}</td>
            <td>{!! $book->front_cover !!}</td>
            <td>{!! $book->back_cover !!}</td>
            <td>{!! $book->category->name !!}</td>
            <td>{!! $book->type->name !!}</td>
            <td>{!! $book->publishing_year !!}</td>
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