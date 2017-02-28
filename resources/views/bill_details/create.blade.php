@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bill Detail
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'billDetails.store']) !!}

                        @include('bill_details.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
