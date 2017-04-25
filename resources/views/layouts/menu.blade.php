@permission('import-book')
<li class="treeview {{ Request::is('importBooks*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-upload"></i>
        <span>@lang('layouts.menu_import_book')</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('importBooks.create*') ? 'active' : '' }}">
            <a href="{!! route('importBooks.create') !!}"><i class="fa fa-circle-o"></i>@lang('layouts.menu_import_book_handwork')</a>
        </li>
        <li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
            <a href="{!! action('ImportBookController@create_file') !!}"><i class="fa fa-circle-o"></i>@lang('layouts.menu_import_book_file')</a>
        </li>
        <li class="{{ Request::is('importBooks*') ? 'active' : '' }}">
            <a href="{!! route('importBooks.index') !!}"><i class="fa fa-circle-o"></i>@lang('layouts.menu_list_imported_book')</a>
        </li>
    </ul>
</li>
@endpermission
@permission('bill')
<li class="treeview {{ Request::is('bills*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-file-o"></i>
        <span>@lang('layouts.menu_bills')</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('bills*') ? 'active' : '' }}">
            <a href="{!! route('bills.create') !!}"><i class="fa fa-plus-square-o"></i>@lang('layouts.menu_create_bill')</a>
        </li>
        <li cclass="{{ Request::is('bills*') ? 'active' : '' }}">
            <a href="{!! route('bills.index') !!}"><i class="fa fa-navicon"></i>@lang('layouts.menu_show_bill')</a>
        </li>
    </ul>
</li>
@endpermission
@permission('store-view')
<li class="{{ Request::is('stores*') ? 'active' : '' }}">
    <a href="{!! route('stores.index') !!}"><i class="fa fa-database"></i><span>@lang('layouts.menu_stores')</span></a>
</li>
@endpermission
@permission('statistic')
<li class="treeview {{ Request::is('statistics*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-line-chart"></i>
        <span>@lang('layouts.menu_statistics')</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.daily') !!}"><i class="fa fa-bar-chart"></i>@lang('layouts.menu_daily_statistic')</a>
        </li>
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.monthly') !!}"><i class="fa fa-area-chart"></i>@lang('layouts.menu_monthly_statistic')</a>
        </li>
        <li class="{{ Request::is('statistics*') ? 'active' : '' }}">
            <a href="{!! route('statistic.quarterly') !!}"><i class="fa pie-chart"></i>@lang('layouts.menu_quarterly_statistic')</a>
        </li>
    </ul>
</li>
@endpermission
@permission('book')
<li class="treeview {{ Request::is('books*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-book"></i>
        <span>@lang('layouts.menu_book_management')</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('books*') ? 'active' : '' }}">
            <a href="{!! route('books.create') !!}"><i class="fa fa-plus-square-o"></i>@lang('layouts.menu_add_book')</a>
        </li>
        <li class="{{ Request::is('books*') ? 'active' : '' }}">
            <a href="{!! route('books.index') !!}"><i class="fa fa-navicon"></i>@lang('layouts.menu_list_book')</a>
        </li>
    </ul>
</li>
@endpermission
@permission('user-manager')
<li class="treeview {{ Request::is('users*') || Request::is('roles*') || Request::is('permissions*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>@lang('layouts.menu_account')</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>@lang('layouts.menu_users')</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-user-md"></i><span>@lang('layouts.menu_roles')</span></a>
        </li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-hand-o-right"></i><span>@lang('layouts.menu_permissions')</span></a>
        </li>
    </ul>
</li>
@endpermission
@permission('other-items')
<li class="treeview {{ Request::is('categories*') || Request::is('types*') || Request::is('publishers*') || Request::is('authors*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-plus-circle"></i>
        <span>@lang('layouts.menu_others')</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('categories*') ? 'active' : '' }}">
            <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>@lang('layouts.menu_categories')</span></a>
        </li>

        <li class="{{ Request::is('types*') ? 'active' : '' }}">
            <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>@lang('layouts.menu_types')</span></a>
        </li>

        <li class="{{ Request::is('publishers*') ? 'active' : '' }}">
            <a href="{!! route('publishers.index') !!}"><i class="fa fa-edit"></i><span>@lang('layouts.menu_publishers')</span></a>
        </li>

        <li class="{{ Request::is('authors*') ? 'active' : '' }}">
            <a href="{!! route('authors.index') !!}"><i class="fa fa-edit"></i><span>@lang('layouts.menu_authors')</span></a>
        </li>

    </ul>
</li>
@endpermission
@permission('store')
<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{!! route('employees.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
</li>
@endpermission

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{!! route('suppliers.index') !!}"><i class="fa fa-edit"></i><span>Suppliers</span></a>
</li>

<li class="{{ Request::is('issuers*') ? 'active' : '' }}">
    <a href="{!! route('issuers.index') !!}"><i class="fa fa-edit"></i><span>Issuers</span></a>
</li>

<li class="{{ Request::is('languages*') ? 'active' : '' }}">
    <a href="{!! route('languages.index') !!}"><i class="fa fa-edit"></i><span>Languages</span></a>
</li>

