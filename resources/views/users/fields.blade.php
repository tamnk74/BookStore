<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('name', __('users.label_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('email', __('users.label_email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('password', __('users.label_password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="col-xs-12 col-sm-6 col-sm-offset-1">
    <div class="form-group">
    	{!! Form::label('confirm-password', __('users.label_password_confirm')) !!}
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-sm-offset-1">
    <div class="form-group">
    	{!! Form::label('roles', __('users.label_roles')) !!}
        {!! Form::select('roles[]', $roles, isset($userRole) ? $userRole : null,  array('class' => 'form-control','multiple')) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-6  col-sm-offset-1">
    {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
