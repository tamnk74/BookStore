<!-- Book Id Field -->
<div class="form-group col-sm-4">
    <label class="col-sm-12 col-md-12">@lang('bills.label_choose_book')</label>
    <div class="col-sm-12 col-md-12">
    <!--{!! Form::select('book_id', $books, null, ['class' => '', 'data-live-search' => 'true', 'title'=>_('bills.select_book')]) !!}-->
        <select class="form-control selectpicker" name="book_id"></select>
    </div>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount', __('import_books.label_book_number')) !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Buy Price Field -->
<div class="form-group col-sm-4">
    {!! Form::label('price', __('import_books.label_price')) !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('importBooks.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
