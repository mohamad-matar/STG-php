@extends('layouts.master')
@section('title' ,  $provider->name )

@section('content')
    <div class="text-center">
        <h1 class="mt-5 pt-4 text-success fs-2">{{ $provider->name }}</h1>
        <p class="text-center my-3 fs-4">{{ $provider->description }} </p>

        <img class="cover" src="{{ getImgUrl($provider->image_id) }}" alt="{{ getImgUrl($provider->image_id) }}">
    </div>

    <div id="provider-shows" class="text-center ">
        <div class="gallery">
            @foreach ($provider->providerShows as $i => $providerShow)
                <img src="{{ getImgUrl($providerShow->image_id) }}" alt="{{ getImgUrl($providerShow->image_id) }}">
            @endforeach
        </div>
    </div>

    {{-- -------------- branches  ------------------ --}}
    @if ($provider->branches->count())
        <section id="popular-area" class="section-wrapper">
            <div class="container popular-carousel-wrapper">
                <h2 class="text-success my-5">@choice('stg.branch', 2)</h2>
                <div class="swipper-container p-4">

                    <div class="btn-swipper-prev"><i class="fa fa-chevron-left"></i></div>
                    <div class="btn-swipper-next"><i class="fa fa-chevron-right"></i></div>

                    <div class="swiper popular-swiper">
                        <div class="swiper-wrapper">

                            @foreach ($provider->branches as $branch)
                                <div class="swiper-slide container" data-aos="fade-up">

                                    <div class="row">
                                        <div class="col-md-6 popular-img p-0">
                                            <img src="{{ getImgUrl($branch->image_id) }}" class="card-img-top"
                                                alt="{{ getImgUrl($branch->image_id) }}">
                                        </div>

                                        <div class="col-md-6 mb-5 p-0">
                                            <div class="popular-content bg-white p-3 shadow-success">
                                                <h5 class="card-title my-3 text-success">{{ $branch->name }}</h5>
                                                <p class="card-text">{{ $branch->description }} </p>
                                                <a href="{{ route('home.branches.show', ['branch' => $branch, 'providerName' => $provider->name]) }}"
                                                    class="text-success">@lang('stg.more')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($services)
        @php $name = "name_$locale" @endphp
        <div class="container py-3 mb-5 text-center">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <h2>{{ $service->$name }} </h2>
                        <form action="{{ route('home.providers.request') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <input type="hidden" name="api_id" value="{{ $api->id }}">
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <x-input name="quantity" :label="__('stg.quantity')" col="2" class="" />
                            </div>
                            <button class="btn btn-success">@lang('stg.request')</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ $api->view_url }}" target="_blank" class="btn btn-outline-success ">
                    @lang('stg.preview-requests')
                </a>
            </div>
        </div>
    @endif
    @if ($msg)
        <div class="text-center my-2">{{ $msg . $provider->name }}</div>
    @endif


    <section class="container">

        <form action="{{ route('tourist.providers.comment', $provider->id) }}" method=post class="alert alert-success">
            <h4 class="text-success">
                @lang('stg.add-comment') 
            </h4>
            @csrf
            <x-select-arr name="type" label="" :options="['comment','complain']" dbValue="comment"
                col="3" />
            <x-textarea name="comment" label="{{ __('stg.comment') }}" col="12" rows="2" />
            <button class="btn btn-success">@lang('stg.send')</button>            
        </form>
        @foreach ($provider->comments as $comment)
            <div class="alert alert-success  bg-white">
                <div class="text-success">
                    {{ $comment->tourist->name }}
                </div>
                <div>
                    {{ $comment->comment }}
                </div>
            </div>
        @endforeach
    </section>

@endsection
@push('css')
    <style>
        body {
            background-color: rgb(249, 245, 239);
        }

        .gallery {
            --s: 250px;
            /* control the size */
            --g: 30px;
            /* control the gap */
            display: grid;
            /* margin: calc(var(--s) + var(--g)); */
            width: fit-content;
            margin: 43vh auto
        }

        .gallery>img {
            grid-area: 1/1;
            width: var(--s);
            aspect-ratio: 1.15;
            object-fit: cover;
            clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0 50%);
            transform: translate(var(--_x, 0), var(--_y, 0)) scale(var(--_t, 1));
            cursor: pointer;
            filter: grayscale(80%);
            transition: .2s linear;
        }

        .gallery>img:hover {
            filter: grayscale(0);
            z-index: 1;
            --_t: 1.2;
        }

        .gallery>img:nth-child(1) {
            --_y: calc(-100% - var(--g))
        }

        .gallery>img:nth-child(7) {
            --_y: calc(100% + var(--g))
        }

        .gallery>img:nth-child(3),
        .gallery>img:nth-child(5) {
            --_x: calc(-75% - .87*var(--g))
        }

        .gallery>img:nth-child(4),
        .gallery>img:nth-child(6) {
            --_x: calc(75% + .87*var(--g))
        }

        .gallery>img:nth-child(3),
        .gallery>img:nth-child(4) {
            --_y: calc(-50% - .5*var(--g))
        }

        .gallery>img:nth-child(5),
        .gallery>img:nth-child(6) {
            --_y: calc(50% + .5*var(--g))
        }
    </style>
@endpush


@push('js')
    <script>
        var swiper1 = new Swiper(".popular-swiper", {
            slidesPerView: 1,
            navigation: {
                nextEl: "#popular-area .btn-swipper-next",
                prevEl: "#popular-area .btn-swipper-prev",
            },
        });
    </script>
@endpush
