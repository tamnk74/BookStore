<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('import_books.label_book_id')) !!}
    <p>{!! $importBook->id !!}</p>
    {!! Form::label('book_id',  __('import_books.label_book_name')) !!}
    <p>{!! $importBook->book->name !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount',  __('import_books.label_book_number')) !!}
    <p>{!! $importBook->amount !!}</p>
    {!! Form::label('price',  __('import_books.label_price')) !!}
    <p>{!! $importBook->price !!} VND</p>
</div>

<!-- Book Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('book_id',  __('import_books.label_cover')) !!}
    <p>
        <img src='{{ asset('images/books/'.$importBook->book->front_cover) }}' width="250" height="250">
        <img src='{{ asset('images/books/'.$importBook->book->back_cover) }}' width="250" height="250">
    </p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at',  __('import_books.label_date')) !!}
    <p>{!! $importBook->created_at !!}</p>
</div>
