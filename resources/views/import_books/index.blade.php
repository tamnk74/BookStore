@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('import_books.label_import_book_list')</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! action('ImportBookController@createFile') !!}">@lang('import_books.label_import_book_file')</a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('importBooks.create') !!}">@lang('import_books.label_import_book')</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('import_books.table')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

