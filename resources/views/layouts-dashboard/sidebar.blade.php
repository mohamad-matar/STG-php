<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">@lang("stg." . config('app.name', 'stg'))</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            @if (Route::has('categories.index'))
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'settings')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard-provider') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
            @endif

          
        </ul>

    </div>
</nav>
