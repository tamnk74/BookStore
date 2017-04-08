<!-- Book Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('book_id', 'Choose Book:') !!}
    {!! Form::select('book_id', $books, null,  ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Buy Price Field -->
<div class="form-group col-sm-4">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('importBooks.index') !!}" class="btn btn-default">Cancel</a>
</div>
