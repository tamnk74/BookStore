@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create Role
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {!! Form::label('display_name', 'Display Name:') !!}
                        {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        {!! Form::label('permission', 'Permissions:') !!}
                        @foreach($permission as $value)
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->display_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{!! route('permissions.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection