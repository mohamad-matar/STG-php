<!DOCTYPE html>
<html lang="en">
@include('layouts-dashboard.head')


<body dir="@lang('stg.dir')">
    <main>
        @foreach ($errors->all() as $error )
            {{ $error }}
        @endforeach
        <div class="form-container d-flex justify-content-center align-items-center mt-3">

            <div class="bg-white col-sm-10 col-md-8 col-lg-6 mx-auto border border-1 border-success m-2 px-5 py-1">
                <h2 class="text-center login-title my-3 bg-success-subtle  w-80 mx-auto py-3 px-2 ">
                    @lang('stg.register-title')
                </h2>
                <div class="m-sm-1">
                    <div class="text-center">
                        <img class="mx-auto mt-2" src="{{ asset('assets/images/logo/logo.png') }}" alt=""
                            width="200">
                    </div>
                    @session('error')
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endsession

                    <form method="POST" action="{{ route('register') }}" class="fs-4 row text-center  mt-3 py-4 border border-success">
                        @csrf
                        <div class="fs-4">
                            <x-radio   :items="['tourist' => __('stg.tourist'), 'provider' => __('stg.provider')]" name="type" dbValue="tourist" />
                        </div>                                                
                        <div class="col-md-12 offset-md-3 mt-3">
                            <x-input type="email" name="email" :label="__('stg.email')" required autofocus
                            autocomplete="username" />
                        </div>
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
                    <a href="{{ route('login') }}" class="fs-5 m-2 text-secondary d-inline-block ">@lang('stg.have-account')</a>
                </div>

            </div>
        </div>
        </div>
    </main>

</body>

</html>
