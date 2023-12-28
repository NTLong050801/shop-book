<div class="products-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            Bài viết
                            <br>
                            mới nhất
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-right">
                        <a href="{{route('public.news.get-recent-posts')}}" class="button button-main">
                            Xem tất cả
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper productsMainJS">
        <div class="swiper-wrapper">
            @foreach ($posts as $post)
                <div class="swiper-slide">
                    <div class="product-item">
                        <div class="inner-image">
                            {{ RvMedia::image($post->image, $post->name, 'medium') }}
                        </div>
                        <div class="inner-content">
                            <div class="inner-title news-inner-title">
                                <a href="{{$post->url}}">
                                    {{$post->name}}
                                </a>
                            </div>
                            <div class="inner-text">
                                {{$post->created_at->translatedFormat('d/m/Y')}}
                            </div>
                            <div class="inner-desc news-inner-desc">
                                {{$post->description}}
                            </div>
                            <a href="{{$post->url}}" class="button-round button-round-highlight">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-circle"></div>
        <div class="swiper-button-prev swiper-button-circle"></div>
    </div>
</div>
