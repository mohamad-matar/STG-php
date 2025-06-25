@extends('layouts.master')
@section('title', $serviceName)

@section('content')
    <div class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 ">{{ $serviceName }} </h1>
        <p class="text-center fs-5">
            @if ($search)
                [{{ $search }}]
                <a class="ms-3 text-decoration-underline text-success"
                    href="{{ route('home.providers.index', ['service_id' => $service_id]) }}">@lang('stg.all')
                    {{ $serviceName }}</a>
            @endif
        </p>

        <div class="row mb-4">
            <div class="col-md-8 offset-md-2 ">
                <div class="input-group">
                    <form action="{{ route('home.providers.index') }}" class="d-flex w-100">
                        <input type="text" name="search" class="w-100" providerholder="Search..." id="searchInput">
                        <input type="hidden" name="service_id" value="{{ $service_id }}">
                        <button class="btn btn-success">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="results">
            @foreach ($providers as $provider)
                <div class="col-md-3 p-1">
                    <div class="card">
                        <img src="{{ getImgUrl($provider->image_id) }}" class="card-img-top"
                            alt="{{ getImgUrl($provider->image_id) }}">
                        <div class="card-body text-center">
                            <h5 class="card-title text-center">{{ $provider->name }}</h5>
                            <p class="card-text">{{ $provider->description }} </p>
                            <p class="text-center title"> @lang('stg.eval'): </p>
                            <p class="text-center text-warning-emphasis fs-3">
                                {{ round($provider->tourists_avg_provider_touristevaluate, 1) }}
                            </p>
                            <a class="btn btn-success" href="{{ route('home.providers.show', $provider) }}">
                                @lang('stg.more')
                            </a>
                        </div>
                        <div class="text-center">
                            <button class="btn text-sucess mb-2" onclick="showForm('eval-{{ $provider->id }}')">
                                @lang('stg.eval-add')
                            </button>
                        </div>
                        <form action="{{ route('tourist.providers.eval', $provider->id) }}" method=post
                            class="shadow p-2 rounded-2 position-absolute d-none text-center" id="eval-{{ $provider->id }}"
                            onsubmit="getEval('eval-{{ $provider->id }}')">
                            <h3 class="text-success text-center">@lang('stg.eval')</h3>
                            @csrf
                            <input type="hidden" name="provider_id" value="{{ $provider->id }}">
                            <input type="hidden" name="evaluate">

                            <div class="text-center my-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="far fa-star" onclick=flipMe(this)></i>
                                @endfor
                            </div>

                            <button class="btn btn-success">@lang('stg.send')</button>
                            <button class="btn btn-outline-success" type=button
                                onclick="hideForm('eval-{{ $provider->id }}')">@lang('stg.back')</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('js')
    <script>
        function flipMe(icon) {
            icon.classList.toggle('text-warning')
        }

        function getEval(frm) {
            const currFrom = document.getElementById(frm)
            const count = currFrom.querySelectorAll('.text-warning').length
            currFrom.evaluate.value = count
            console.log(count)
        }

        function showForm(frm) {
            document.getElementById(frm).classList.remove('d-none')
        }

        function hideForm(frm) {
            document.getElementById(frm).classList.add('d-none')
        }
    </script>
@endpush
