<table class="table table-responsive" id="authors-table">
    <thead>
        <th>@lang('authors.label_author_name')</th>
        <th colspan="3">@lang('authors.label_action')</th>
    </thead>
    <tbody>
    @foreach($authors as $author)
        <tr>
            <td>{!! $author->name !!}</td>
            <td>
                {!! Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('authors.show', [$author->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('authors.edit', [$author->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                    ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('".__('authors.delete_confirm')."')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $authors->links() !!}