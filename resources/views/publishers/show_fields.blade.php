<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('publishers.label_id')) !!}
    <p>{!! $publisher->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('publishers.label_name')) !!}
    <p>{!! $publisher->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('publishers.label_created_at')) !!}
    <p>{!! $publisher->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('publishers.label_updated_at')) !!}
    <p>{!! $publisher->updated_at !!}</p>
</div>

