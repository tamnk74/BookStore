@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    @lang('books.label_create_book')
                </h1>
            </div>
            <div class="col-md-2">
                <a href="{{route('books.file')}}" class="btn btn-primary pull-right">@lang('buttons.btn_add_file')</a>
            </div>
        </div>
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
