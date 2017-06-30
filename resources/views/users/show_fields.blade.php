<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('users.label_id')) !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('users.label_name')) !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('users.label_email')) !!}
    <p>{!! $user->email !!}</p>
</div>

<div class="form-group">
    <strong>@lang('users.label_roles'):</strong>
    @if(!empty($user->roles))
        @foreach($user->roles as $v)
            <label class="label label-success">{{ $v->display_name }}</label>
        @endforeach
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('users.label_created_at')) !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('users.label_updated_at')) !!}
    <p>{!! $user->updated_at !!}</p>
</div>

