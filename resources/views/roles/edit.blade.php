@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Permission
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($role, ['route' => ['permissions.update', $role->id], 'method' => 'patch']) !!}
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <strong>Name:</strong>
                            {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <strong>Description:</strong>
                            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value->display_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection