<table class="table table-responsive" id="issuers-table">
    <thead>
        <th>Tên nhà cung cấp</th>
        <th colspan="3">Thao tác</th>
    </thead>
    <tbody>
    @foreach($issuers as $issuer)
        <tr>
            <td>{!! $issuer->name !!}</td>
            <td>
                {!! Form::open(['route' => ['issuers.destroy', $issuer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('issuers.show', [$issuer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('issuers.edit', [$issuer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $issuers->links() }}