<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('types.label_type_id')) !!}
    <p>{!! $type->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('types.label_type_name')) !!}
    <p>{!! $type->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('types.label_created_at')) !!}
    <p>{!! $type->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('types.label_updated_at')) !!}
    <p>{!! $type->updated_at !!}</p>
</div>

