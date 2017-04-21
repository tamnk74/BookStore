
<!-- Name Field -->
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

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
                        <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

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