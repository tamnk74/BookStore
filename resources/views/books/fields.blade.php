<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">@lang('books.label_book_name')</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Id Field -->
<div class="form-group col-sm-6">
    <label for="author_id">@lang('books.label_book_author')</label>
    {!! Form::select('author_id', $authors, null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Id Field -->
<div class="form-group col-sm-6">
    <label for="publisher_id">@lang('books.label_book_publisher')</label>
    {!! Form::select('publisher_id', $publishes, null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Id Field -->
<div class="form-group col-sm-6">
    <label for="issuer_id">@lang('books.label_book_issuer')</label>
    {!! Form::select('issuer_id', $issuers, null, ['class' => 'form-control']) !!}
</div>


<!-- description Field -->
<div class="form-group col-sm-12">
    <label for="description">@lang('books.label_book_description')</label>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'book_description']) !!}
</div>
<!-- size Field -->
<div class="form-group col-sm-6">
    <label for="size">@lang('books.label_book_size')</label>
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- weight Field -->
<div class="form-group col-sm-6">
    <label for="weight">@lang('books.label_book_weight')</label>
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- page Field -->
<div class="form-group col-sm-6">
    <label for="page">@lang('books.label_book_page')</label>
    {!! Form::text('page', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    <label for="price">@lang('books.label_book_price')</label>
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <label for="front_cover">@lang('books.label_book_front_cover')</label>
    {!! Form::file('front_cover', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <label for="back_cover">@lang('books.label_book_back_cover')</label>
    {!! Form::file('back_cover', null, ['class' => 'form-control']) !!}
</div>
<!-- Category Id Field -->
<div class="form-group col-sm-6">
    <label for="category_id">@lang('books.label_book_category')</label>
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6">
    <label for="type_id">@lang('books.label_book_type')</label>
    {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>

<!-- Publishing Year Field -->
<div class="form-group col-sm-6">
    <label for="publishing_year">@lang('books.label_book_pulishing_year')</label>
    {!! Form::text('publishing_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Field -->
<div class="form-group col-sm-6">
    <label for="sale">@lang('books.label_book_sale')(%)</label>
    {!! Form::text('sale', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( __('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('books.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
</div>
