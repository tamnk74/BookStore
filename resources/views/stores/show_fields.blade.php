<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $store->id !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Mã sách:') !!}
    <p>{!! $store->book_id !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Tên sách:') !!}
    <p>{!! $store->book->name !!}</p>
</div>

<!-- Current Ammount Field -->
<div class="form-group">
    {!! Form::label('current_ammount', 'Số sách còn lại:') !!}
    <p>{!! $store->current_ammount !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Tổng số sách đã nhập:') !!}
    <p>{!! $store->amount !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $store->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $store->updated_at !!}</p>
</div>

