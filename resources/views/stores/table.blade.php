<table class="table table-responsive" id="stores-table">
    <thead>
        <th>@lang('stores.label_no')</th>
        <th>@lang('stores.label_book_name')</th>
        <th>@lang('stores.label_book_number')</th>
        <th>@lang('stores.label_book_total_number')</th>
    </thead>
    <tbody>
    @foreach($stores as $store)
        @if($store->book != null)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td><a href="{{ route('books.show', ['id' => $store->book_id]) }}">{!! $store->book->name !!}</a></td>
            <td>{!! $store->amount !!}</td>
            <td>{!! $store->total_amount !!}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="text-center">{{ $stores->links() }}</div>