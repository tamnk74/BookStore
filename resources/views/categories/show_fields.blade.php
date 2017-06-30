<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('categories.label_category_id')) !!}
    <p>{!! $category->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('categories.label_category_name')) !!}
    <p>{!! $category->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('categories.label_created_at')) !!}
    <p>{!! $category->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('categories.label_updated_at')) !!}
    <p>{!! $category->updated_at !!}</p>
</div>

