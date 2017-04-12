<table class="table table-responsive" id="publishers-table">
    <thead>
        <th>@lang('publishers.label_name')</th>
        <th colspan="3">@lang('publishers.label_action')</th>
    </thead>
    <tbody>
    @foreach($publishers as $publisher)
        <tr>
            <td>{!! $publisher->name !!}</td>
            <td>
                {!! Form::open(['route' => ['publishers.destroy', $publisher->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('publishers.show', [$publisher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('publishers.edit', [$publisher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',
                    'onclick' => "return confirm('".__('publishers.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>