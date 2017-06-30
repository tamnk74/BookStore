<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('languages.index') !!}" class="btn btn-default">Hủy</a>
</div>
