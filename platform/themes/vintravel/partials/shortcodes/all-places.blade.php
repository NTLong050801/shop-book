<!-- Điểm đến yêu thích -->
<div class="gallery-highlight bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            Điểm đến
                            <br>
                            yêu thích
                        </div>
                        <div class="inner-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-wrap">
        <div class="swiper galleryHighlightJS">
            <div class="swiper-wrapper">
                @foreach($places as $place)
                    <div class="swiper-slide">
                        <div class="inner-item">
                            <a href="#">
                                {{ RvMedia::image($place->image, $place->name, 'place') }}
                                <div class="inner-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{ $place->name }}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-circle"></div>
            <div class="swiper-button-prev swiper-button-circle"></div>
        </div>
    </div>
</div>
<!-- Hết Điểm đến yêu thích -->
