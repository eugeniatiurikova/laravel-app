<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="{{ route('news') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M13 9.5h5v-2h-5v2zm0 7h5v-2h-5v2zm6 4.5H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2zM6 11h5V6H6v5zm1-4h3v3H7V7zM6 18h5v-5H6v5zm1-4h3v3H7v-3z"></path></svg>
        <span class="fs-4">News</span>
    </a>
    <ul class="nav nav-pills">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item"><span class="nav-link text-body">User: <a href="{{ route('account') }}">{{ Auth::user()->name }}</a></span></li>
            @if(Auth::user()->is_admin)
                <li class="nav-link">
                    <a href="{{ route('admin.index') }}">Admin panel</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        @endguest

        {{--        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>--}}
{{--        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>--}}
{{--        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>--}}
{{--        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>--}}
{{--        <li class="nav-item"><a href="#" class="nav-link">About</a></li>--}}
    </ul>
</header>

