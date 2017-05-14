<div class="row">
    <div class="col-md-6">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('images/avatar.png')}}" alt="User profile picture">

                <h3 class="profile-username text-center">{!! $user->name !!}</h3>

                <p class="text-muted text-center">
                    @if(!empty($user->roles))
                        @foreach($user->roles as $v)
                            <label class="label label-success">{{ $v->display_name }}</label>
                        @endforeach
                    @endif
                </p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>{!! Form::label('email', __('users.label_email')) !!}</b>
                        <a class="pull-right">{!! $user->email !!}</a>
                    </li>
                    @if(isset($profile->full_name))
                        <li class="list-group-item">
                            <b>{!! Form::label('full_name', __('users.label_full_name')) !!}</b>
                            <a class="pull-right">{!! $profile->full_name !!}</a>
                        </li>
                    @endif
                    @if(isset($profile->birthday))
                        <li class="list-group-item">
                            <b>{!! Form::label('full_name', __('users.label_birthday')) !!}</b>
                            <a class="pull-right">{!! $profile->birthday !!}</a>
                        </li>
                    @endif
                    @if(isset($profile->phone_number))
                        <li class="list-group-item">
                            <b>{!! Form::label('full_name', __('users.label_phone_number')) !!}</b>
                            <a class="pull-right">{!! $profile->phone_number !!}</a>
                        </li>
                    @endif
                    @if(isset($profile->address))
                        <li class="list-group-item">
                            <b>{!! Form::label('full_name', __('users.label_address')) !!}</b>
                            <a class="pull-right">{!! $profile->address !!}</a>
                        </li>
                    @endif
                </ul>
                <a href="{!! route('profiles.edit') !!}" class="btn btn-primary btn-block"><b>@lang('buttons.btn_edit')</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>