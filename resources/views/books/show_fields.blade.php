<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Bìa sách:') !!}
    <p><img src='{{ asset('images/books/'.$book->front_cover) }}' width="250" height="250">
        <img src='{{ asset('images/books/'.$book->back_cover) }}' width="250" height="250">
    </p>
</div>

<!-- Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('id', 'Mã sách:') !!}
    <p>{!! $book->id !!}</p>
    {!! Form::label('name', 'Tên sách:') !!}
    <p>{!! $book->name !!}</p>
    {!! Form::label('author_id', 'Tác giả:') !!}
    <p>{!! $book->author->name !!}</p>
    {!! Form::label('publish_id', 'Nhà xuất bản:') !!}
    <p>{!! $book->publish->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('category_id', 'Lĩnh vực:') !!}
    <p>{!! $book->category->name !!}</p>
    {!! Form::label('type_id', 'Loại sách:') !!}
    <p>{!! $book->type->name !!}</p>
    {!! Form::label('publishing_year', 'Năm xuất bản:') !!}
    <p>{!! $book->publishing_year !!}</p>
    {!! Form::label('price', 'Giá:') !!}
    <p>{!! $book->price !!} VND</p>
</div>

