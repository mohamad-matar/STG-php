<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">@lang('stg.' . config('app.name', 'stg'))</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                {{ auth()->user()->email }}
            </li>

            @if (auth()->user()->type == 'admin')
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'services')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.services.index') }}">
                        <i class="align-middle" data-feather="activity"></i>
                        <span class="align-middle">services</span>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'categories')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                        <i class="align-middle" data-feather="server"></i>
                        <span class="align-middle">categories</span>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'places')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.places.index') }}">
                        <i class="align-middle" data-feather="aperture"></i>
                        <span class="align-middle">places</span>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'providers')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.providers.index' , ['accepted' => 0]) }}">
                        <i class="align-middle" data-feather="alert-circle"></i>
                        <span class="align-middle">Pinned provider</span>
                    </a>
                </li>

            @elseif (auth()->user()->type == 'provider')
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.edit') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.edit') }}">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
            @endif


        </ul>

    </div>
</nav>
