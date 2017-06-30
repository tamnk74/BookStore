<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên nhà cung cấp:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Địa chỉ:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Số điện thoại:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('suppliers.index') !!}" class="btn btn-default">Hủy</a>
</div>
