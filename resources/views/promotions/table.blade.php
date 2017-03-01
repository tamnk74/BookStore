<table class="table table-responsive" id="promotions-table">
    <thead>
        <th>Tên sách</th>
        <th>Mức giảm giá</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($promotions as $promotion)
        <tr>
            <td>{!! $promotion->book->name !!}</td>
            <td>{!! $promotion->level !!}</td>
            <td>
                {!! Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('promotions.show', [$promotion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('promotions.edit', [$promotion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>