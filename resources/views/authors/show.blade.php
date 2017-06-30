@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('authors.label_author_view')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('authors.show_fields')
                    <a href="{!! route('authors.index') !!}" class="btn btn-default">@lang('buttons.btn_back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
