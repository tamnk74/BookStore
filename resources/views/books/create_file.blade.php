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
                <div class="row  form-inline" style="margin-left: 10px">
                <h3>@lang('import_books.label_export_file')</h3>
                <a href="{{ url('books/download/excel') }}">
                    <button class="btn btn-success">@lang('buttons.btn_dowload_excel')</button>
                </a>
                </div>
                @if ($books = Session::get('books'))
                    <table class="table table-responsive" id="books-table">
                        <thead>
                        <th>@lang('books.label_book_no')</th>
                        <th>@lang('books.label_book_name')</th>
                        <th>@lang('books.label_book_author')</th>
                        <th>@lang('books.label_book_publisher')</th>
                        <th>@lang('books.label_book_price')</th>
                        <th>@lang('books.label_book_category')</th>
                        <th>@lang('books.label_book_type')</th>
                        <th>@lang('books.label_book_publishing_year')</th>
                        <th>@lang('books.label_book_sale')</th>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="width: 25%">{{ $book->name }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td>{{ $book->publisher->name }}</td>
                                <td>{{ $book->price }} VND</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->type->name }}</td>
                                <td>{{ $book->publishing_year }}</td>
                                <td>{{ $book->sale }}%</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')