@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {{ Form::label('name', 'Name: ') }}
                        {{ $user->name }}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {{ Form::label('email', 'Email: ') }}
                        {{ $user->email }}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {{ Form::label('roles', 'Roles: ') }}
                        @if(!empty($user->roles))
                            @foreach($user->roles as $v)
                                <label class="label label-success">{{ $v->display_name }}</label>
                            @endforeach
                        @endif
                    </div>
                    <a href="{!! route('roles.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection