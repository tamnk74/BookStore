@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nhập sách</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! action('ImportBookController@create_file') !!}">Nhập sách từ file</a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('importBooks.create') !!}">Nhập sách</a>
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

