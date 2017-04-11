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
    <label for="publish_id">@lang('books.label_book_publish')</label>
    {!! Form::select('publish_id',$publishes, null, ['class' => 'form-control']) !!}
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
