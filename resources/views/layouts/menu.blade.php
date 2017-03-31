<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Book Mangement</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('books*') ? 'active' : '' }}">
            <a href="{!! route('books.create') !!}"><i class="fa fa-circle-o"></i> Add a book</a>
        </li>
        <li class="{{ Request::is('books*') ? 'active' : '' }}">
            <a href="{!! route('books.index') !!}"><i class="fa fa-circle-o"></i> List of book</a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-line-chart"></i>
        <span>Statistic</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.daily') !!}"><i class="fa fa-circle-o"></i>Thống kê theo ngày</a>
        </li>
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.monthly') !!}"><i class="fa fa-circle-o"></i>Thống kê theo tháng</a>
        </li>
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.quarterly') !!}"><i class="fa fa-circle-o"></i>Thống kê theo quý</a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Nhập sách</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
            <a href="{!! route('importBooks.create') !!}"><i class="fa fa-circle-o"></i>Nhập sách thủ công</a>
        </li>
        <li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
            <a href="{!! action('ImportBookController@create_file') !!}"><i class="fa fa-circle-o"></i>Nhập sách từ file</a>
        </li>
        <li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
            <a href="{!! route('importBooks.index') !!}"><i class="fa fa-circle-o"></i>Danh sách nhập sách</a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Hóa đơn</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('billDetails*') ? 'active' : '' }}">
            <a href="{!! route('billDetails.create') !!}"><i class="fa fa-circle-o"></i>Tạo hóa đơn</a>
        </li>
        <li cclass="{{ Request::is('billDetails*') ? 'active' : '' }}">
            <a href="{!! route('billDetails.index') !!}"><i class="fa fa-circle-o"></i>Xem hóa đơn</a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Tài khoản</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('bills*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i><span>Users</span></a>
        </li>
        <li class="{{ Request::is('bills*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>
        </li>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Khác</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
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

    </ul>
</li>
<li class="{{ Request::is('stores*') ? 'active' : '' }}">
    <a href="{!! route('stores.index') !!}"><i class="fa fa-edit"></i><span>Thống kê sách</span></a>
</li>