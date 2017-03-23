@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Role Management</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                @permission('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                @endpermission
                                @permission('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $roles->render() !!}
            </div>
        </div>
    </div>
@endsection