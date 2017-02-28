<!-- Book Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('book_id', 'Book Id:') !!}
    {!! Form::text('book_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Buy Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buy_price', 'Buy Price:') !!}
    {!! Form::text('buy_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Sell Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sell_price', 'Sell Price:') !!}
    {!! Form::text('sell_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('importBooks.index') !!}" class="btn btn-default">Cancel</a>
</div>
