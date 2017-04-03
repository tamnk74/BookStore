<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="col-xs-12 col-sm-6 col-sm-offset-1">
    <div class="form-group">
    	{!! Form::label('confirm-password', 'Confirm Password:') !!}
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-sm-offset-1">
    <div class="form-group">
    	{!! Form::label('roles', 'Role:') !!}
        {!! Form::select('roles[]', $roles, isset($userRole) ? $userRole : null,  array('class' => 'form-control','multiple')) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-6  col-sm-offset-1">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
