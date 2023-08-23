<div class="list-group">
    <a type="button" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
        Dashboard
    </a>
    <a type="button" class="list-group-item list-group-item-action {{ request()->routeIs('admin.orders') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
        Orders
    </a>
    <a type="button" class="list-group-item list-group-item-action {{ request()->routeIs('admin.products') ? 'active' : '' }}" href="{{ route('admin.products') }}">
        Products
    </a>
    <a type="button" class="list-group-item list-group-item-action {{ request()->routeIs('admin.customers') ? 'active' : '' }}" href="{{ route('admin.customers') }}">
        Customers
    </a>
    <a type="button" class="list-group-item list-group-item-action" href="/logout">
        Logout
    </a>
</div>