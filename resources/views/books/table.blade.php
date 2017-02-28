<table class="table table-responsive" id="books-table">
    <thead>
        <th>Name</th>
        <th>Author Id</th>
        <th>Publish Id</th>
        <th>Price</th>
        <th>Image</th>
        <th>Category Id</th>
        <th>Type Id</th>
        <th>Publishing Year</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{!! $book->name !!}</td>
            <td>{!! $book->author_id !!}</td>
            <td>{!! $book->publish_id !!}</td>
            <td>{!! $book->price !!}</td>
            <td>{!! $book->image !!}</td>
            <td>{!! $book->category_id !!}</td>
            <td>{!! $book->type_id !!}</td>
            <td>{!! $book->publishing_year !!}</td>
            <td>
                {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('books.show', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('books.edit', [$book->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>