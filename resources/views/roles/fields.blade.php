<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('name', __('roles.label_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('display_name', __('roles.label_display_name')) !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('description', __('roles.label_description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-sm-offset-1">
        {!! Form::label('permissions', __('roles.label_permission')) !!}
        <div class="row">
            @foreach($permissions as $value)
                <div class=" col-sm-6 col-md-6 col-xs-6">
                    <label>{{ Form::checkbox('permissions[]', $value->id, (!isset($rolePermissions) || !in_array($value->id, $rolePermissions) )? false : true, array('class' => 'name')) }}
                    {{ $value->display_name }}</label>
                </div>
            @endforeach
        </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
