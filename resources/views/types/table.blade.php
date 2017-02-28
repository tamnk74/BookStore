<table class="table table-responsive" id="types-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($types as $type)
        <tr>
            <td>{!! $type->name !!}</td>
            <td>
                {!! Form::open(['route' => ['types.destroy', $type->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('types.show', [$type->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('types.edit', [$type->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>