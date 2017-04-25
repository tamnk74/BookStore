<!-- Image Field -->
<div class="form-group">
    <label>@lang('books.label_book_cover')</label>
    <p><img src='{{ asset('images/books/'.$book->front_cover) }}' width="250" height="250">
        <img src='{{ asset('images/books/'.$book->back_cover) }}' width="250" height="250">
    </p>
</div>

<!-- Id Field -->
<div class="form-group col-md-6">
    <label>@lang('books.label_book_name')</label>
    <p>{!! $book->name !!}</p>
    <label>@lang('books.label_book_author')</label>
    <p>{!! $book->author->name !!}</p>
    <label>@lang('books.label_book_publisher')</label>
    <p>{!! $book->publisher->name !!}</p>
    <label>@lang('books.label_book_issuer')</label>
    <p>{!! $book->issuer->name !!}</p>
    <label>@lang('books.label_page')</label>
    <p>{!! $book->page !!}</p>
    <label>@lang('books.label_book_size')</label>
    <p>{!! $book->size !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-md-6">
    <label>@lang('books.label_book_category')</label>
    <p>{!! $book->category->name !!}</p>
    <label>@lang('books.label_book_type')</label>
    <p>{!! $book->type->name !!}</p>
    <label>@lang('books.label_book_pulishing_year')</label>
    <p>{!! $book->publishing_year !!}</p>
    <label>@lang('books.label_book_weight')</label>
    <p>{!! $book->weight !!} gram</p>
    <label>@lang('books.label_book_language')</label>
    <p>{!! $book->language->name !!}</p>
    <label>@lang('books.label_book_price')</label>
    <p>{!! $book->price !!} VND ({{  $book->sale }}%)</p>
</div>

