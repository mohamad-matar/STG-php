@extends('layouts.master')
@section('content')
    <div class="container my-5 pt-4">
        <h1 class="text-center text-success fw-bold fs-2 ">{{ $serviceName }}  </h1>
        <p class="text-center fs-5">
            @if ($search)
                 [{{ $search }}] 
                <a class="ms-3 text-decoration-underline text-success"  href="{{ route('home.providers.index', ['service_id' => $service_id]) }}">@lang('stg.all')
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
                        <div class="card-body">
                            <h5 class="card-title">{{ $provider->name }}</h5>
                            <p class="card-text">{{ $provider->description }} </p>
                            <a href="{{ route('home.providers.show', $provider) }}" class="text-success">@lang('stg.more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
