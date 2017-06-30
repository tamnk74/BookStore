<table class="table table-responsive" id="stores-table">
    <thead>
        <th>@lang('stores.label_no')</th>
        <th>@lang('stores.label_book_name')</th>
        <th>@lang('stores.label_book_author')</th>
        <th>@lang('stores.label_book_category')</th>
        <th>@lang('stores.label_book_number')</th>
        <th>@lang('stores.label_book_total_number')</th>
        <th>@lang('stores.label_book_price')</th>
        @if(Auth::user()->hasRole('manager'))
        <th>@lang('stores.label_book_sale')(%)</th>
        @endif
    </thead>
    <tbody>
    @foreach($stores as $store)
        @if($store->book != null)
        <tr>
            <td>{!! $loop->iteration !!}</td>
            <td style="width: 20%"><a href="{{ route('books.show', ['id' => $store->book_id]) }}">{!! $store->book->name !!}</a></td>
            <td>{!! $store->book->author->name !!}</td>
            <td>{!! $store->book->category->name !!}</td>
            <td>{!! $store->amount !!}</td>
            <td>{!! $store->total_amount !!}</td>
            <td>{!! $store->book->price !!} VND</td>
            @if(Auth::user()->hasRole('manager'))
            <td class="form-sale">
                <form class="form-inline">
                    <p style="display: none">{{ $store->book_id }}</p>
                    <input type="text" value="{{ $store->book->sale }}" class="form-control" disabled style="width: 60px">
                    <button type="button" class='btn btn-default edit-btn'>Edit</button>
                </form>
            </td>
            @endif
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
<div class="text-center">{{ $stores->links() }}</div>