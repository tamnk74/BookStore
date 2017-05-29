<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Mã ngôn ngữ:') !!}
    <p>{!! $language->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tên:') !!}
    <p>{!! $language->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Ngày tạo:') !!}
    <p>{!! $language->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Ngày cập nhật:') !!}
    <p>{!! $language->updated_at !!}</p>
</div>

