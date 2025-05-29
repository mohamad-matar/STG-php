<!DOCTYPE html>
<html lang="en">
@include('layouts-dashboard.head')


<body dir="@lang('stg.dir')">
    <main>
        <div class="form-container d-flex justify-content-center align-items-center">

            <div class="bg-white col-sm-10 col-md-8 col-lg-6 mx-auto border border-1 border-success m-2 p-3">
                <h2 class="text-center login-title my-3 bg-success-subtle  w-75 mx-auto py-3 ">
                    @lang('stg.register-title')
                </h2>
                <div class="m-sm-1">
                    <div class="text-center">
                        <img class="mx-auto" src="{{ asset('assets/images/logo/logo.png') }}" alt=""
                            width="150">
                    </div>
                    @session('error')
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('register') }}" class="fs-4">
                        @csrf
                        <div class="fs-2">
                            <x-radio   :items="['tourist' => __('stg.tourist'), 'provider' => __('stg.provider')]" name="type" dbValue="tourist" />
                        </div>
                        
                        <x-input type="email" name="email" :label="__('stg.email')" required autofocus
                            autocomplete="username" />

                        <x-input type="password" name="password" :label="__('stg.password')" required
                            autocomplete="current-password" />
                        
                        <x-input type="password" name="password_confirmation" :label="__('stg.password-confirmation')" required
                            autocomplete="current-password" />


                            <div class="text-center">
                                <button class="btn btn-success"> @lang('stg.register-btn') </button>
                                <a class="btn btn-outline-success" href="{{ route('home.index') }}">@lang('stg.back')</a>
                            </div>
                        
                </form>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="fs-3 m-2 text-secondary d-inline-block ">@lang('stg.have-account')</a>
                </div>

            </div>
        </div>
        </div>
    </main>

</body>

</html>
