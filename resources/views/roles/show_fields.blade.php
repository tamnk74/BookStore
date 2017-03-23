<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $role->id }}</p>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('display_name', 'Name::') !!}
    <p>{!! $role->name !!}</p>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('description', 'Decription::') !!}
    <p>{!! $role->description !!}</p>
</div>
<div class="form-group">
    <strong>Permissions:</strong>
    @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
            <label class="label label-success">{{ $v->display_name }}</label>
        @endforeach
    @endif
</div>