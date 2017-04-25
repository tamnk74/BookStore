@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            @lang('bills.label_create_bill')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="clearfix"></div>
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
    <script type="text/javascript">
        var total = 0;
    </script>
    <script src="{{asset('js/bills/script.js')}}"></script>
@endsection
