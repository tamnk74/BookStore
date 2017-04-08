<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Mã sách') !!}
    <p>{!! $importBook->id !!}</p>
    {!! Form::label('book_id', 'Tên sách:') !!}
    <p>{!! $importBook->book->name !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Số lượng:') !!}
    <p>{!! $importBook->amount !!}</p>
    {!! Form::label('price', 'Giá mua:') !!}
    <p>{!! $importBook->price !!} VND</p>
</div>

<!-- Book Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('book_id', 'Bìa sách:') !!}
    <p>
        <img src='{{ asset('images/books/'.$importBook->book->front_cover) }}' width="250" height="250">
        <img src='{{ asset('images/books/'.$importBook->book->back_cover) }}' width="250" height="250">
    </p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Ngày nhập:') !!}
    <p>{!! $importBook->created_at !!}</p>
</div>
