<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('roles.label_id')) !!}
    <p>{!! $role->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('roles.label_name')) !!}
    <p>{!! $role->name !!}</p>
</div>

<!-- Display Name Field -->
<div class="form-group">
    {!! Form::label('display_name', __('roles.label_display_name')) !!}
    <p>{!! $role->display_name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('roles.label_description')) !!}
    <p>{!! $role->description !!}</p>
</div>

<div class="form-group">
    {!! Form::label('permissions', __('roles.label_permission')) !!}
    @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
            <label class="label label-success">{{ $v->display_name }}</label>
        @endforeach
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('roles.label_created_at')) !!}
    <p>{!! $role->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('roles.label_updated_at')) !!}
    <p>{!! $role->updated_at !!}</p>
</div>

