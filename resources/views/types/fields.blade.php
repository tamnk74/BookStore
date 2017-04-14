<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('types.label_type_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('types.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
