<!-- Client Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('client_name', __('bills.label_customer_name')) !!}
    {!! Form::text('client_name', __('bills.customer_name'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-12">@lang('bills.label_choose_book')</label>
    <div class="col-sm-12 col-md-5">
        <!--{!! Form::select('book_id', $books, null, ['class' => '', 'data-live-search' => 'true', 'title'=>_('bills.select_book')]) !!}-->
        <select class="form-control selectpicker" name="book_id"></select>
    </div>
    <div class="col-sm-12 col-md-5">
        <input class='form-control' id="bookAmount" name='amount' type='text' placeholder=@lang('bills.book_number')>
    </div>
    <div class="col-sm-12 col-md-2"><a class="btn btn-default btn-add" href="#">@lang('buttons.btn_add')</a></div>
</div>
<hr>
<div class="form-group col-sm-12">
    <table class="table table-bill">
        <tr>
            <th>@lang('bills.label_book_name')</th>
            <th>@lang('bills.label_book_number')</th>
            <th>@lang('bills.label_remove')</th>
        </tr>
        <tr>
        </tr>
    </table>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bills.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
