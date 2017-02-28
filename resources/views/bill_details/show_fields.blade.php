<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $billDetail->id !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Book Id:') !!}
    <p>{!! $billDetail->book_id !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $billDetail->amount !!}</p>
</div>

<!-- Bill Id Field -->
<div class="form-group">
    {!! Form::label('bill_id', 'Bill Id:') !!}
    <p>{!! $billDetail->bill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $billDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $billDetail->updated_at !!}</p>
</div>

