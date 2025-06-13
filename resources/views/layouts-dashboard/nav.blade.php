<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse d-flex justify-content-between">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark fs-2">
                        @if (auth()->user()->type == 'admin')
                            المدير العام للموقع
                        @elseif (auth()->user()->type == 'provider')
                            {{ auth()->user()->provider->name_ar }}
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item fs-4" href="{{ route('logout') }}"
                            onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="align-middle me-1" data-feather="log-out"></i>
                            <span>خروج</span>
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
