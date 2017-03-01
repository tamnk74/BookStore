<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('author_id', 'Author Id:') !!}
    {!! Form::select('author_id', $authors, null, ['class' => 'form-control']) !!}
</div>

<!-- Publish Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publish_id', 'Publish Id:') !!}
    {!! Form::select('publish_id',$publishes, null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Type Id:') !!}
    {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>

<!-- Publishing Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publishing_year', 'Publishing Year:') !!}
    {!! Form::text('publishing_year', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('books.index') !!}" class="btn btn-default">Cancel</a>
</div>
