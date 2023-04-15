 <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="{{ route('news') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg fill="white" class="bi me-2" width="40" height="32" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M13 9.5h5v-2h-5v2zm0 7h5v-2h-5v2zm6 4.5H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2zM6 11h5V6H6v5zm1-4h3v3H7V7zM6 18h5v-5H6v5zm1-4h3v3H7v-3z"></path></svg>
                </a>
                <x-admin.topbar />
                <div class="text-end">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link px-2 text-secondary" href="{{ route('account') }}">{{ Auth::user()->name }}'s settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 text-secondary" class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="b-example-divider"></div>
</header>
