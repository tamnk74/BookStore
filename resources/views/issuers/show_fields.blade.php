<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã nhà phát hành:') !!}
    <p>{!! $issuer->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tên:') !!}
    <p>{!! $issuer->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    <p>{!! $issuer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ngày cập nhật:') !!}
    <p>{!! $issuer->updated_at !!}</p>
</div>

