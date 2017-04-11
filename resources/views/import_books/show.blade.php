@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('import_books.label_import_detail')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('import_books.show_fields')
                    <div class="form-group col-sm-12">
                        <a href="{!! route('importBooks.index') !!}" class="btn btn-default">@lang('buttons.btn_back')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
