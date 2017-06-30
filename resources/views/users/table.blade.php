<table class="table table-responsive" id="users-table">
    <thead>
        <th>@lang('users.label_no')</th>
        <th>@lang('users.label_name')</th>
        <th>@lang('users.label_email')</th>
        <th>@lang('users.label_roles')</th>
        <th colspan="3">@lang('users.label_action')</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>
                @if(!empty($user->roles))
                @foreach($user->roles as $v)
                    <label class="label label-success">{{ $v->display_name }}</label>
                @endforeach
                @endif
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('".__('users.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>