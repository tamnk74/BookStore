<table class="table table-responsive" id="publishes-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($publishes as $publish)
        <tr>
            <td>{!! $publish->name !!}</td>
            <td>
                {!! Form::open(['route' => ['publishes.destroy', $publish->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('publishes.show', [$publish->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('publishes.edit', [$publish->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>