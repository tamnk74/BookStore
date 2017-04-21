@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('users.label_update_profile')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($user, ['route' => ['profiles.update'], 'method' => 'patch']) !!}

                    @include('profiles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection