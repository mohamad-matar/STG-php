<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body dir="@lang('stg.dir')">
    @include('layouts.header')

    @session('success')
        <div class="alert alert-success mt-6 w-50 mx-auto">
            {{ session()->get('success') }}
        </div>
    @endsession
    @session('error')
        <div class="alert alert-danger mt-6 w-50 mx-auto">
            {{ session()->get('error') }}
        </div>
    @endsession

    @yield('content')
    @include('layouts.footer')
    @include('layouts.fixed-btn')
    @include('layouts.js')
    @stack('js')
</body>

</html>
