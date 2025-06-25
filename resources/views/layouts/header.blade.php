<header id="header-area" class="fixed-top container-fluid">
    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg fixed-top py-0 my-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img class="logo my-0" src="{{ asset('assets/images/logo/logo2.png') }}" width="75" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div class="collapse navbar-collapse p-0" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('home.index') }}">@lang('stg.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.providers.index', ['service_id' => 1]) }}">@choice('stg.restaurant', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.providers.index', ['service_id' => 2]) }}">@choice('stg.hotel', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.places.index', ['category_id' => 1]) }}">@choice('stg.religious', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.places.index', ['category_id' => 2]) }}">@choice('stg.monument', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.places.index', ['category_id' => 3]) }}">@choice('stg.cultural', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('home.places.index', ['category_id' => 4]) }}">@choice('stg.natural', 2)</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @choice('stg.trip', 2)
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.trips.index' , ['new' => 'y']) }}">@lang('stg.new-trips') </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('home.trips.index' , ['new' => 'n'] ) }}">@lang('stg.previous-trips') </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @auth
                                    {{ auth()->user()->email }}
                                @else
                                    @lang('stg.contact')
                                @endauth
                            </a>
                            <ul class="dropdown-menu">
                                @auth
                                    @if (auth()->user()->type != 'tourist')
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">@lang('stg.dashboard')</a>
                                        </li>
                                    @endif
                                    <li><a class="dropdown-item"
                                            href="{{ route('tourist.trips.index', ['myTrip' => true]) }}">
                                            @lang('stg.my-trip')</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                <i class="align-middle me-1"
                                                    data-feather="log-out"></i>{{ __('stg.log-out') }}
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('login') }}">@lang('stg.login')</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">@lang('stg.signup')</a></li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                    <form action="/language">
                        <button class="btn  btn-outline-success btn-lang m-1 py-1" name="lang"
                            value=@if (app()->isLocale('ar')) "en" @else "ar" @endif>
                            @if (app()->isLocale('ar'))
                                English
                            @else
                                Arabic
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
