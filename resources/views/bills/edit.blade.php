@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            @lang('bills.label_update_bill')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')

       <div class="clearfix"></div>
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::open(['route' => ['bills.update', $bill->id], 'method' => 'patch']) !!}
                        <!-- Client Name Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('client_name', __('bills.label_customer_name')) !!}
                        {!! Form::text('client_name', $bill->client_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                       <label class="col-sm-12 col-md-12">@lang('bills.label_choose_book')</label>
                       <div class="col-sm-12 col-md-5">
                           <!--{!! Form::select('book_id', $books, null,
                           ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title'=>_('bills.select_book')]) !!}-->
                           <select class="form-control selectpicker" name="book_id"></select>
                       </div>
                       <div class="col-sm-12 col-md-5">
                           <input class='form-control' id="bookAmount" name='amount' type='text' placeholder=@lang('bills.book_number')>
                       </div>
                       <div class="col-sm-12 col-md-2"><a class="btn btn-default btn-add" href="#">@lang('buttons.btn_add')</a></div>
                    </div>
                    <div class="form-group col-sm-12">
                        <table class="table table-bill">
                            <tr>
                                <th>@lang('bills.label_book_name')</th>
                                <th>@lang('bills.label_book_number')</th>
                                <th>@lang('bills.label_subtotal')</th>
                                <th>@lang('bills.label_remove')</th>
                            </tr>
                            @foreach($bill->billDetail as $billDetail)
                            <tr>
                                <td>{!! $billDetail->book->name !!}<input type="hidden" name='book_id[]' value="{{$billDetail->book->id}}"> </td>
                                <td>{!! $billDetail->amount !!}<input type="hidden" name='amount[]' value="{{$billDetail->amount}}"></td>
                                <td>{!! $billDetail->amount*$billDetail->book->price !!} VND</td>
                                <td><a class="btn btn-link btn-remove" href="#">@lang('buttons.btn_remove')</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <div>@lang('bills.label_total') : <span class="bill_total">{{ $bill->total_price }} VND</span></div>
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit(__('buttons.btn_save'), ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('bills.index') !!}" class="btn btn-default">@lang('buttons.btn_cancel')</a>
                    </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var total = {{ $bill->total_price }};
    </script>
    <script src="{{asset('js/bills/script.js')}}"></script>
@endsection