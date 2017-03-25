<!-- Client Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('client_name', 'Tên khách hàng:') !!}
    {!! Form::text('client_name', 'Khách mua lẻ', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-12">Chọn sách:</label>
    <div class="col-sm-12 col-md-5">
        <!--{!! Form::select('book_id', $books, null, ['class' => '', 'data-live-search' => 'true', 'title'=>'Please select a book..']) !!}-->
        <select class="form-control selectpicker" name="book_id"></select>
    </div>
    <div class="col-sm-12 col-md-5">
        <input class='form-control' id="bookAmount" name='amount' type='text' placeholder="Số lượng">
    </div>
    <div class="col-sm-12 col-md-2"><a class="btn btn-default btn-add" href="#">Add</a></div>
</div>
<hr>
<div class="form-group col-sm-12">
    <table class="table table-bill">
        <tr>
            <th>Tên sách</th>
            <th>Số lượng</th>
            <th>Xóa</th>
        </tr>
        <tr>
        </tr>
    </table>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('billDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
