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


				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif
                    <h3>@lang('import_books.label_import_book_file')</h3>
                <div class="row" style="margin-left: 10px">
                    {!! Form::open(['route' => 'import_books.import', 'class' => 'form-inline', 'files'=> true]) !!}
                        <div class="form-group">
                            <label for="import_file">@lang('import_books.label_select_file')</label>
                            <input type="file" class="form-control" id="import_file" name="import_file">{{ csrf_field() }}
                        </div>
					    <button class="btn btn-primary">@lang('buttons.btn_import')</button>
                    {!! Form::close() !!}
                </div>
                <h3>@lang('import_books.label_export_file')</h3>
                <div class="row" style="margin-left: 10px">
                    {!! Form::open(['route' => 'import_books.export', 'class' => 'form-inline', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <label for="import_file">@lang('import_books.label_select_date')</label>
                        <input type="date" class="form-control" id="date" name="date">{{ csrf_field() }}
                    </div>
                    <button type="submit" class="btn btn-success">@lang('buttons.btn_dowload_excel')</button>
                    {!! Form::close() !!}
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($importBooks = Session::get('importBooks'))
                    <table class="table table-responsive" id="importBooks-table">
                        <thead>
                        <th>@lang('import_books.label_no')</th>
                        <th>@lang('import_books.label_book_name')</th>
                        <th>@lang('import_books.label_book_number')</th>
                        <th>@lang('import_books.label_price')</th>
                        <th>@lang('import_books.label_supplier')</th>
                        <th>@lang('import_books.label_date')</th>
                        </thead>
                        <tbody>
                        @foreach($importBooks as $importBook)
                            @if($importBook->book != null)
                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td><a href="{{ route('books.show', ['id' => $importBook->book_id]) }}">{!! $importBook->book->name !!}</a></td>
                                    <td>{!! $importBook->amount !!}</td>
                                    <td>{!! $importBook->price !!} VND</td>
                                    <td>{{ $importBook->supplier->name }}</td>
                                    <td>{!! $importBook->created_at !!}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')