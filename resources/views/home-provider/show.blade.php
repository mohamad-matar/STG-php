@extends('layouts.master')
@section('content')
    <div class="text-center">
        <h1 class="mt-5 pt-4">{{ $provider->name }}</h1>
        <p class="text-center my-3">{{ $provider->description }} </p>

        <img class="cover" src="{{ getImgUrl($provider->image_id) }}" alt="{{ getImgUrl($provider->image_id) }}">
    </div>

    <div id="provider-shows" class="container text-center mt-5 d-grid">
        <h3>الصور</h3>
        <div class="gallery mx-auto direction-left">
            @foreach ($provider->providerShows as $i => $providerShow)
                @if ($i == 0)
                @elseif ($i % 4 == 0 && $i != 0)
        </div>
        <div class="gallery mx-auto direction-left">
            @endif
            <img src="{{ getImgUrl($providerShow->image_id) }}" alt="{{ getImgUrl($providerShow->image_id) }}">
            @endforeach
        </div>
    </div>
    <div id="provider-branch" class="container text-center mt-5">
        <h2 class="text-success my-5">الفروع</h2>

    </div>

    <div class="container">
        <div class="row" id="results">
            @foreach ($provider->branches as $branch)
                <div class="col-md-3 p-1">
                    <div class="card">
                        <img src="{{ getImgUrl($branch->image_id) }}" class="card-img-top"
                            alt="{{ getImgUrl($branch->image_id) }}">
                        <div class="card-body">

                            <a href="{{ route('home.branches.show', $branch) }}" class="text-success">@lang('stg.more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
