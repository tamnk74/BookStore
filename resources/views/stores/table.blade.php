<table class="table table-responsive" id="stores-table">
    <thead>
        <th>@lang('stores.label_no')</th>
        <th>@lang('stores.label_book_id')</th>
        <th>@lang('stores.label_book_name')</th>
        <th>@lang('stores.label_book_number')</th>
        <th>@lang('stores.label_book_total_number')</th>
    </thead>
    <tbody>
    @foreach($stores as $store)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $store->book_id !!}</td>
            <td>{!! $store->book->name !!}</td>
            <td>{!! $store->amount !!}</td>
            <td>{!! $store->total_amount !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>