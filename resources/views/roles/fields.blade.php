<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('display_name', 'Display Name:') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-1">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-sm-offset-1">
        {!! Form::label('permission', 'Permission:') !!}
        <div class="row">
            <div class="checkbox col-sm-6 col-md-6">
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, (!isset($rolePermissions) || !in_array($value->id, $rolePermissions) )? false : true, array('class' => 'name')) }}
                    {{ $value->display_name }}
                </label>
            @endforeach
            </div>
        </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
