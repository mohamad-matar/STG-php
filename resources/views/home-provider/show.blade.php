@extends('layouts.master')
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

    <section id="popular-area" class="section-wrapper">
        <div class="container popular-carousel-wrapper">
            <h2 class="text-success my-5">@choice('stg.branch' ,2)</h2>
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

    <section>
        @foreach ($api->apiRequests as $apiRequest )
        
        <form action="{{ $api->usr . $apiRequest->path}}" method="{{  $apiRequest->method}}">
            {{-- <x-input name="qantity" :label="__('stg.quantity')"/> --}}
            <button>{{ $apiRequest->title }}</button>
        </form>


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
            margin: 40vh auto
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
