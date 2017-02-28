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

<!-- Bill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bill_id', 'Bill Id:') !!}
    {!! Form::text('bill_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('billDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
