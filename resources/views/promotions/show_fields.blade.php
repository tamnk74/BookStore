<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $promotion->id !!}</p>
</div>

<!-- Book Id Field -->
<div class="form-group">
    {!! Form::label('book_id', 'Name:') !!}
    <p>{!! $promotion->book->name !!}</p>
</div>

<!-- Level Field -->
<div class="form-group">
    {!! Form::label('level', 'Level:') !!}
    <p>{!! $promotion->level !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $promotion->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $promotion->updated_at !!}</p>
</div>

