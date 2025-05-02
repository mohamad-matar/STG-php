<section id="popular-area" class="section-wrapper">
    <div class="container popular-carousel-wrapper">
        <h2 class="section-title">@lang('stg.popular')</h2>
        <div class="swipper-container p-4">

            <div class="btn-swipper-prev"><i class="fa fa-chevron-left"></i></div>
            <div class="btn-swipper-next"><i class="fa fa-chevron-right"></i></div>

            <div class="swiper popular-swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-2.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-3.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-4.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-5.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide container" data-aos="fade-up">
                        <a href="#" class=" d-block p-0">
                            <div class="row">
                                <div class="col-md-6 popular-img p-0">
                                    <img src="{{ asset('assets/images/slider/slider-6.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-md-6 mb-5 p-0">
                                    <div class="popular-content bg-white p-3">
                                        <h3 class="text-salmon">Lorem, ipsum dolor.</h3>                                        
                                        <div class="summary mb-3"> Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Laborum accusantium repellendus iusto consectetur fugit impedit?
                                            Aliquid expedita nobis repellat in totam dolore, vero facilis quaerat
                                            aperiam, rem perferendis, maiores id?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

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
