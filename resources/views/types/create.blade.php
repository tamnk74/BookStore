@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('types.label_update_type')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'types.store']) !!}

                        @include('types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
