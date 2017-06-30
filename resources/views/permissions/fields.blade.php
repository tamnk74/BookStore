<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('permissions.label_name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_name', __('permissions.label_display_name')) !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('permissions.label_description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( __('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permissions.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
