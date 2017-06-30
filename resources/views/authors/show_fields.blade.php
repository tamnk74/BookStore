<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('authors.label_author_id')) !!}
    <p>{!! $author->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('authors.label_author_name')) !!}
    <p>{!! $author->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', __('authors.label_created_at')) !!}
    <p>{!! $author->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', __('authors.label_updated_at')) !!}
    <p>{!! $author->updated_at !!}</p>
</div>

