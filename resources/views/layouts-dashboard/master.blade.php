<!DOCTYPE html>
<html lang="en">
@include('layouts-dashboard.head')

<body>
    <div class="wrapper">
        @include('layouts-dashboard.sidebar')

        <div class="main">
            @include('layouts-dashboard.nav')


            <main class="content">
                <div class="container-fluid p-0">
                    @session('success')
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endsession
                    @session('error')
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endsession

                    @yield('content')

                </div>
            </main>

            @include('layouts-dashboard.footer')
        </div>
    </div>

    <script src="{{ asset('assets-dashboard/js/app.js') }}"></script>
    @stack('js')

</body>

</html>
