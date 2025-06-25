<section id="popular-area" class="section-wrapper">
    <div class="container popular-carousel-wrapper">
        <h2 class="section-title">@lang('stg.popular')</h2>
        <div class="swipper-container p-4">

            <div class="btn-swipper-prev"><i class="fa fa-chevron-left"></i></div>
            <div class="btn-swipper-next"><i class="fa fa-chevron-right"></i></div>

            <div class="swiper popular-swiper">
                <div class="swiper-wrapper">
                    @foreach ($places as $place)
                        <div class="swiper-slide container" data-aos="fade-up">
                            <a href="#" class=" d-block p-0">
                                <div class="row">
                                    <div class="col-md-6 popular-img p-0">
                                        <img src="{{ getImgUrl($place->image_id) }}" alt="">
                                    </div>
                                    <div class="col-md-6 mb-5 p-0">
                                        <div class="popular-content bg-white p-3">
                                            <h3 class="text-salmon">{{ $place->name }}</h3>
                                            <div class="summary mb-3"> 
                                                {{ $place->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</section>


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
