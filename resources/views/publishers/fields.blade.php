<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('publishers.label_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('publishers.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
