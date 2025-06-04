<!DOCTYPE html>
<html lang="en">
@include('layouts-dashboard.head')


<body dir="@lang('stg.dir')">
    <main>
        <div class="form-container d-flex justify-content-center align-items-center mt-5">

            <div class="bg-white col-sm-10 col-md-8 col-lg-6 mx-auto border border-1 border-success m-2 p-3">
                <h2 class="text-center login-title my-3 bg-success-subtle  w-75 mx-auto py-3 ">
                    @lang('stg.login-title')
                </h2>
                <div class="m-sm-1">
                    <div class="text-center">
                        <img class="mx-auto mt-2"  src="{{ asset('assets/images/logo/logo.png') }}" alt=""
                            width="200">
                    </div>
                    @session('error')
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('login') }}" class="mt-4 fs-4 row">
                        @csrf                       

                        <x-input type="email" name="email" :label="__('stg.email')" required autofocus
                            autocomplete="username" />


                        <x-input type="password" name="password" :label="__('stg.password')" required
                            autocomplete="current-password" />

                        <x-checkbox name="remember" type="checkbox" :label="__('stg.remember')" />
                        <div class="text-center">
                            <button class="btn btn-success"> @lang('stg.login-btn') </button>
                            <a class="btn btn-outline-success" href="{{ route('home.index') }}">@lang('stg.back')</a>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="fs-5 m-2 text-secondary d-inline-block ">@lang('stg.create-account')</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
