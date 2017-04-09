@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/bills/select2.min.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            @lang('bills.label_create_bill')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">

                <div class="row">
                    {!! Form::open(['route' => 'bills.store']) !!}

                        @include('bills.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/bills/select2.min.js')}}"></script>
    <script src="{{asset('js/bills/script.js')}}"></script>
@endsection
