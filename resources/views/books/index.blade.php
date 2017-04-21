@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('books.list_book')</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('books.create') !!}">@lang('buttons.btn_add_new')</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'books.index', 'method' => 'GET']) !!}
                <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="key" value="{{ isset($key) ? $key : "" }}" placeholder="{{__('books.enter_name')}}">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat">Search</button>
                        </span>
                </div>
                {!! Form::close() !!}
                <hr>
                @include('books.table')
            </div>
        </div>
    </div>
@endsection

