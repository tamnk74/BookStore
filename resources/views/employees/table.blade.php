<table class="table table-responsive" id="employees-table">
    <thead>
        <th>User Id</th>
        <th>Full Name</th>
        <th>Phone Number</th>
        <th>Birthday</th>
        <th>Address</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{!! $employee->user_id !!}</td>
            <td>{!! $employee->full_name !!}</td>
            <td>{!! $employee->phone_number !!}</td>
            <td>{!! $employee->birthday !!}</td>
            <td>{!! $employee->address !!}</td>
            <td>
                {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>