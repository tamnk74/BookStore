@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('books.label_create_book')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'books.store', 'method'=>'POST', 'files'=>true]) !!}

                        @include('books.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'book_description');
    </script>
@endsection
