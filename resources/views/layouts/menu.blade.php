<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

<li class="{{ Request::is('publishes*') ? 'active' : '' }}">
    <a href="{!! route('publishes.index') !!}"><i class="fa fa-edit"></i><span>Publishes</span></a>
</li>

<li class="{{ Request::is('authors*') ? 'active' : '' }}">
    <a href="{!! route('authors.index') !!}"><i class="fa fa-edit"></i><span>Authors</span></a>
</li>

<li class="{{ Request::is('books*') ? 'active' : '' }}">
    <a href="{!! route('books.index') !!}"><i class="fa fa-edit"></i><span>Books</span></a>
</li>

<li class="{{ Request::is('promotions*') ? 'active' : '' }}">
    <a href="{!! route('promotions.index') !!}"><i class="fa fa-edit"></i><span>Promotions</span></a>
</li>

<li class="{{ Request::is('stores*') ? 'active' : '' }}">
    <a href="{!! route('stores.index') !!}"><i class="fa fa-edit"></i><span>Stores</span></a>
</li>

<li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
    <a href="{!! route('importBooks.index') !!}"><i class="fa fa-edit"></i><span>ImportBooks</span></a>
</li>

<li class="{{ Request::is('billDetails*') ? 'active' : '' }}">
    <a href="{!! route('billDetails.index') !!}"><i class="fa fa-edit"></i><span>BillDetails</span></a>
</li>

<li class="{{ Request::is('bills*') ? 'active' : '' }}">
    <a href="{!! route('bills.index') !!}"><i class="fa fa-edit"></i><span>Bills</span></a>
</li>

