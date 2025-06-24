<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="fs-2 fw-normal">الدليل السياحي السوري</span>
        </a>

        <ul class="sidebar-nav fs-4 text-end">            
            
            @if (auth()->user()->type == 'admin')
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'services')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.services.index') }}">
                        <span class="align-middle">الخدمات </span>
                        <i class="align-middle" data-feather="activity"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'categories')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                        <span class="align-middle">تصنيفات الأمكنة</span>
                        <i class="align-middle" data-feather="server"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'places')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.places.index') }}">
                        <span class="align-middle">ادارة الأماكن</span>
                        <i class="align-middle" data-feather="aperture"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'providers')) active @endif">
                    <a class="sidebar-link" href="{{ route('admin.providers.index', ['accepted' => 0]) }}">
                        <span class="align-middle">مزودي الخدمة المعلقين </span>
                        <i class="align-middle" data-feather="alert-circle"></i>
                    </a>
                </li>

            @elseif (auth()->user()->type == 'provider')
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.edit') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.edit') }}">
                        <span class="align-middle">الإعدادت </span>
                        <i class="align-middle" data-feather="sliders"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.show') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.show' , auth()->user()->provider) }}">
                        <span class="align-middle"> إدارة الصور </span>
                        <i class="align-middle" data-feather="image"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.branches.index') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.branches.index' ) }}">
                        <span class="align-middle"> إدارة الفروع </span>
                        <i class="align-middle" data-feather="image"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.trips.index') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.trips.index' ) }}">
                        <span class="align-middle"> إدارة الرحلات </span>
                        <i class="align-middle" data-feather="briefcase"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (str_contains(Route::currentRouteName(), 'places')) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.places.create') }}">
                        <span class="align-middle"> إضافة مكان</span>
                        <i class="align-middle" data-feather="aperture"></i>
                    </a>
                </li>
                <li class="sidebar-item @if (Route::currentRouteName() == 'provider.api.edit') ) active @endif">
                    <a class="sidebar-link" href="{{ route('provider.api.edit') }}">
                        <span class="align-middle">إدارة الروابط </span>
                        <i class="align-middle" data-feather="navigation"></i>
                    </a>
                </li>                
            @endif


        </ul>

    </div>
</nav>
