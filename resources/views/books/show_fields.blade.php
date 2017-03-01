<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã sách:') !!}
    <p>{!! $book->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tên sách:') !!}
    <p>{!! $book->name !!}</p>
</div>

<!-- Author Id Field -->
<div class="form-group">
    {!! Form::label('author_id', 'Tác giả:') !!}
    <p>{!! $book->author->name !!}</p>
</div>

<!-- Publish Id Field -->
<div class="form-group">
    {!! Form::label('publish_id', 'Nhà xuất bản:') !!}
    <p>{!! $book->publish->name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Giá bìa:') !!}
    <p>{!! $book->price !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Ảnh bìa:') !!}
    <p><img src='{{ asset('images/books/'.$book->image) }}' width="250" height="250"></p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Lĩnh vực:') !!}
    <p>{!! $book->category->name !!}</p>
</div>

<!-- Type Id Field -->
<div class="form-group">
    {!! Form::label('type_id', 'Loại sách:') !!}
    <p>{!! $book->type->name !!}</p>
</div>

<!-- Publishing Year Field -->
<div class="form-group">
    {!! Form::label('publishing_year', 'Năm xuất bản:') !!}
    <p>{!! $book->publishing_year !!}</p>
</div>

