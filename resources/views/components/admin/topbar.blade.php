<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
    <li>
        <a href="{{ route('admin.index') }}" class="nav-link px-2
        @if(request()->routeIs('admin.index')) text-white @else text-secondary @endif">Home</a>
    </li>
    <li>
        <a href="{{ route('admin.categories.index') }}" class="nav-link px-2
        @if(request()->routeIs('admin.categories.*')) text-white @else text-secondary @endif">Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.news.index') }}" class="nav-link px-2
        @if(request()->routeIs('admin.news.*')) text-white @else text-secondary @endif">News</a>
    </li>
    <li>
        <a href="{{ route('admin.sources.index') }}" class="nav-link px-2
        @if(request()->routeIs('admin.sources.*')) text-white @else text-secondary @endif">Sources</a>
    </li>
    <li>
        <a href="{{ route('admin.users.index') }}" class="nav-link px-2
        @if(request()->routeIs('admin.users.*')) text-white @else text-secondary @endif">Users</a>
    </li>
</ul>
