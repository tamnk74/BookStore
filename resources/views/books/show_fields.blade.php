<!-- Image Field -->
<div class="form-group">
    <label>@lang('books.label_book_cover')</label>
    <p><img src='{{ asset('images/books/'.$book->front_cover) }}' width="250" height="250">
        <img src='{{ asset('images/books/'.$book->back_cover) }}' width="250" height="250">
    </p>
</div>

<!-- Id Field -->
<div class="form-group col-md-6">
    <label>@lang('books.label_book_id')</label>
    <p>{!! $book->id !!}</p>
    <label>@lang('books.label_book_name')</label>
    <p>{!! $book->name !!}</p>
    <label>@lang('books.label_book_author')</label>
    <p>{!! $book->author->name !!}</p>
    <label>@lang('books.label_book_publish')</label>
    <p>{!! $book->publish->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-md-6">
    <label>@lang('books.label_book_category')</label>
    <p>{!! $book->category->name !!}</p>
    <label>@lang('books.label_book_type')</label>
    <p>{!! $book->type->name !!}</p>
    <label>@lang('books.label_book_pulishing_year')</label>
    <p>{!! $book->publishing_year !!}</p>
    <label>@lang('books.label_book_price')</label>
    <p>{!! $book->price !!} VND</p>
</div>

