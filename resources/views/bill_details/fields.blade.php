<!-- Client Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('client_name', 'Tên khách hàng:') !!}
    {!! Form::text('client_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    <table class="table table-bill">
        <tr>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Xóa</th>
        </tr>
        <tr>
            <td>{!! Form::select('book_id[]', $books, null, ['class' => 'form-control']) !!}</td>
            <td><input class='form-control' name='amount[]' type='text'></td>
            <td><a class="btn btn-default btn-delete" href="#">Delete</a></td>
        </tr>
    </table>
    <div class="form-group col-sm-12">
        <button class="btn btn-info btn-add">Add</button>
    </div>
</div>
<!-- Price Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_amount', 'Tổng tiền:') !!}
    {!! Form::text('price_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bills.index') !!}" class="btn btn-default">Cancel</a>
</div>
