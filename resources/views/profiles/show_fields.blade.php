
<!-- Name Field -->
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', __('users.label_name')) !!}
        <p>{!! $user->name !!}</p>
        <!-- Full name Field -->
        @if(isset($profile->full_name))
            <div class="form-group">
                {!! Form::label('full_name', __('users.label_full_name')) !!}
                <p>{!! $profile->full_name !!}</p>
            </div>
        @endif
        {!! Form::label('email', __('users.label_email')) !!}
        <p>{!! $user->email !!}</p>
        <strong>@lang('users.label_roles'):</strong>
        @if(!empty($user->roles))
            @foreach($user->roles as $v)
                <label class="label label-success">{{ $v->display_name }}</label>
            @endforeach
        @endif
    </div>
    <!-- Other information -->
    <div class="form-group col-md-6">
    <!-- Birthday Field -->
        @if(isset($profile->birthday))
            <div class="form-group">
                {!! Form::label('birthday', __('users.label_birthday')) !!}
                <p>{!! $profile->birthday !!}</p>
            </div>
        @endif
    <!-- Phone number Field -->
        @if(isset($profile->phone_number))
            <div class="form-group">
                {!! Form::label('phone_number', __('users.label_phone_number')) !!}
                <p>{!! $profile->phone_number !!}</p>
            </div>
        @endif
    <!-- Address Field -->
        @if(isset($profile->address))
            <div class="form-group">
                {!! Form::label('address', __('users.label_address')) !!}
                <p>{!! $profile->address !!}</p>
            </div>
        @endif
    </div>
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

