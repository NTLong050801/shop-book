@if ($posts->isNotEmpty())
    <div class="article-highlight">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-head">
                        <div class="inner-left">
                            <div class="inner-title">
                                Bài viết
                                <br>
                                Nổi bật
                            </div>
                            <div class="inner-line"></div>
                        </div>
                        <div class="inner-right">
                            <a href="{{route('public.news.get-featured-posts')}}" class="button button-main">
                                Xem tất cả
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container-large">
            <div class="swiper articleHighlightJS">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide">
                            <div class="article-item-highlight">
                                <div class="inner-image">
                                    <a href="{{$post->url}}">
                                        {{ RvMedia::image($post->image, $post->name, 'posts') }}
                                    </a>
                                </div>
                                <div class="inner-content">
                                    <h3 class="inner-title">
                                        <a href="{{$post->url}}">
                                            {{$post->name}}
                                        </a>
                                    </h3>
                                    <div class="inner-desc">
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
                <div class="swiper-button-next swiper-button-circle mt-2"></div>
                <div class="swiper-button-prev swiper-button-circle mt-2"></div>
            </div>
        </div>
    </div>
@endif
