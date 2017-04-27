@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('import_books.label_import_book_file')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                @if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif

                <div class="row" style="margin-left: 10px">
                    {!! Form::open(['route' => 'books.import', 'class' => 'form-inline', 'files'=> true]) !!}
                        <div class="form-group">
                            <label for="import_file">@lang('import_books.label_select_file')</label>
                            <input type="file" class="form-control" id="import_file" name="import_file">{{ csrf_field() }}
                        </div>
					    <button class="btn btn-primary">@lang('buttons.btn_import')</button>
                    {!! Form::close() !!}
                </div>
                <h3>@lang('import_books.label_export_file')</h3>
                <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
					<a href="{{ url('books/download/excel') }}">
                        <button class="btn btn-success btn-lg">@lang('buttons.btn_dowload_excel')</button>
                    </a>
		    	</div>
            </div>
        </div>
    </div>
@endsection

@section('content')