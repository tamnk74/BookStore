@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Promotion
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'promotions.store']) !!}

                        @include('promotions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
