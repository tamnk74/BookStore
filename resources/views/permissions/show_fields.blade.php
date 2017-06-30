<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('permissions.label_id')) !!}
    <p>{!! $permission->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('permissions.label_name')) !!}
    <p>{!! $permission->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group">
    {!! Form::label('display_name', __('permissions.label_display_name')) !!}
    <p>{!! $permission->display_name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('permissions.label_description')) !!}
    <p>{!! $permission->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('permissions.label_created_at')) !!}
    <p>{!! $permission->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('permissions.label_updated_at')) !!}
    <p>{!! $permission->updated_at !!}</p>
</div>

