<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body dir="@lang('stg.dir')">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.fixed-btn')
        @include('layouts.js')
        @stack('js')
</body>
</html>