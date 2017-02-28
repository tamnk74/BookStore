<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bill->id !!}</p>
</div>

<!-- Client Name Field -->
<div class="form-group">
    {!! Form::label('client_name', 'Client Name:') !!}
    <p>{!! $bill->client_name !!}</p>
</div>

<!-- Price Amount Field -->
<div class="form-group">
    {!! Form::label('price_amount', 'Price Amount:') !!}
    <p>{!! $bill->price_amount !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{!! $bill->date !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bill->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bill->updated_at !!}</p>
</div>

