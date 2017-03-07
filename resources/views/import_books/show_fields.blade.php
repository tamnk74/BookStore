<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã sách') !!}
    <p>{!! $importBook->id !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Tên sách:') !!}
    <p>{!! $importBook->book->name !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Ảnh bìa:') !!}
    <p><img src='{{ asset('images/books/'.$importBook->book->image) }}' width="250" height="250"></p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Số lượng:') !!}
    <p>{!! $importBook->amount !!}</p>
</div>

<!-- Buy Price Field -->
<div class="form-group">
    {!! Form::label('buy_price', 'Giá mua/mỗi cuốn:') !!}
    <p>{!! $importBook->buy_price !!}</p>
</div>

<!-- Sell Price Field -->
<div class="form-group">
    {!! Form::label('sell_price', 'Giá bán mỗi cuốn:') !!}
    <p>{!! $importBook->sell_price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ngày nhập:') !!}
    <p>{!! $importBook->created_at !!}</p>
</div>
