@extends('layouts.app')
@section('css')
    <link href="plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('stores.label_store')</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'stores.index', 'method' => 'GET']) !!}
                <div class="input-group">
                    <span class="input-group-btn" style="width: 20%">
                        {!! Form::select('category_id', $categories, $category_id, ['class' => 'form-control']) !!}
                    </span>
                    <input type="text" class="form-control" name="key" value="{{ isset($key) ? $key : "" }}" placeholder="{{__('books.enter_name')}}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat">Tìm kiếm</button>
                    </span>
                </div>
                {!! Form::close() !!}
                <hr>
                <p><b>@lang('books.search_results', ['count' => $stores->count(), 'total' => $stores->total()])</b></p>
                <hr>
                @include('stores.table')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="plugins/toastr/toastr.min.js"></script>
    @if(Auth::user()->hasRole('manager'))
    <script type="text/javascript">
        $('.form-sale').on('click', 'button[type=button]', function (e) {
            e.preventDefault();
            $(this).parent().find('input').removeAttr('disabled');
            $(this).parent().find('button').attr('type', 'submit').text('Save');
        });
        $('.form-sale').on('click', 'button[type=submit]', function (e) {
            e.preventDefault();
            var book_id = $(this).parent().find('p').text();
            var sale = $(this).parent().find('input').val();
            var input = $(this).parent().find('input');
            var button = $(this).parent().find('button');
            $.ajax({
                url: '{{ route('books.updateSale') }}',
                type: "POST",
                data: {
                    'id' : book_id,
                    'sale': sale,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(result, status){
                    console.log(result, status);
                    if(result.success) {
                        toastr.success('Cập nhật giảm giá thành công!');
                        input.attr('disabled', 'disabled');
                        button.attr('type', 'button').text('Edit');
                    }
                },
                error: function(xhr, status, error) {
                    var data = JSON.parse(xhr.responseText);
                    toastr.error(data.message);
                }
            });
        });
    </script>
    @endif
@endsection

