@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <label>@lang('books.label_book_detail')</label>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('books.show_fields')
                    <a href="{!! route('books.index') !!}" class="btn btn-default">@lang('buttons.btn_back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
