@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>@lang('bills.label_bill_detail') <a href="{!! route('bills.index') !!}" class="btn btn-default pull-right">@lang('buttons.btn_back')</a></h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" id="print-bill" style="padding-left: 20px">
                    @include('bills.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#btn-print').on('click', function() {
            $('#print-bill').printThis({
                importCSS: false,
                loadCSS: ""
            });
        });
    </script>
@endsection
