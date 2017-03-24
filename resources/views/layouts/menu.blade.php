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
    <a href="{!! route('billDetails.index') !!}"><i class="fa fa-edit"></i><span>Bills</span></a>
</li>

<li><a><i class="fa fa-line-chart"></i>Thống kê <span class="fa fa-chevron-down pull-right"></span></a>
    <ul class="nav child_menu">
      <li class="{{ Request::is('statistics*') ? 'active' : '' }}"><a href="{{ route('statistic.daily') }}">Thống kê theo ngày</a></li>
      <li class="{{ Request::is('statistics*') ? 'active' : '' }}"><a href="{{ route('statistic.monthly') }}">Thống kê theo tháng</a></li>
      <li class="{{ Request::is('statistics*') ? 'active' : '' }}"><a href="{{ route('statistic.quarterly') }}">Thống kê theo quý</a></li>
    </ul>
</li>
<li class="{{ Request::is('bills*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>
<li class="{{ Request::is('bills*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>
<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

