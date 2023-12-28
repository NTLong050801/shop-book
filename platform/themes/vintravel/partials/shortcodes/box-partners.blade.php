@forelse($categories as $category)
    @if(isset($groupedPartners[$category->id]))
        <div class="box-partners {{ $loop->index % 2 ? $class :''}}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-5">
                        <div class="box-head">
                            <div class="inner-left flex-grow-1">
                                <div class="inner-title">
                                    Đối tác
                                    <br>
                                    {{$category->name}}
                                </div>
                                <div class="inner-line flex-grow-1"></div>
                            </div>
                            <div class="inner-desc">
                                {{$category->description}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-7">
                        <div class="swiper partnersJS">
                            <div class="swiper-wrapper">
                                @foreach($groupedPartners[$category->id]->sortBy('order')->chunk(2) as $partnerChunk)
                                    <div class="swiper-slide">
                                        @foreach($partnerChunk as $partner)
                                            <div class="inner-item">
                                                <a href="#">
                                                    {{ RvMedia::image($partner->logo, $partner->logo) }}
                                                </a>
                                            </div>
                                        @endforeach
                                        @if(count($partnerChunk) < 2 )
                                            <div class="inner-item">
                                                <a href="#">
                                                    {{ RvMedia::image($partner->logo, $partner->logo) }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-circle"></div>
                            <div class="swiper-button-prev swiper-button-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@empty
@endforelse
