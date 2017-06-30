<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã nhà cung cấp:') !!}
    <p>{!! $supplier->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tên nhà cung cấp:') !!}
    <p>{!! $supplier->name !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Địa chỉ:') !!}
    <p>{!! $supplier->address !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', 'Số điện thoại:') !!}
    <p>{!! $supplier->phone_number !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    <p>{!! $supplier->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Cập nhật nhật ngày:') !!}
    <p>{!! $supplier->updated_at !!}</p>
</div>

