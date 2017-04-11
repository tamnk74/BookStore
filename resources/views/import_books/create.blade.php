@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('import_books.label_import_book')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'importBooks.store']) !!}

                        @include('import_books.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')