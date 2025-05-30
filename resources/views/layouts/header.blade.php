<header id="header-area" class="fixed-top container-fluid">
    <div class="d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg fixed-top py-0 my-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img class="logo my-0" src="{{ asset('assets/images/icon.png') }}" width="75" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">@lang('stg.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.restaurant', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.hotel', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.tour', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.monument', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.religious', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.cultural', 2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@choice('stg.natural', 2)</a>
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
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">@lang('dashboard')</a></li>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                <i class="align-middle me-1" data-feather="log-out"></i>{{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('login') }}">@lang('login')</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">@lang('signup')</a></li>
                                @endauth

                            </ul>
                        </li>
                    </ul>
                    <form action="/language">
                        <select name="lang" class="form-select d-inline" onchange="submit()">
                            <option value="ar" @selected(app()->isLocale('ar'))>Arabic</option>
                            <option value="en" @selected(app()->isLocale('en'))>English</option>
                        </select>
                    </form>
                    <form class="d-flex me-4" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn text-white" type="submit"><i class="fas fa-search icon-search"></i></button>
                    </form>

                </div>
            </div>
        </nav>
    </div>
</header>
