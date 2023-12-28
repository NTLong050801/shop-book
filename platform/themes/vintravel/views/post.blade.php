<div class="article-detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <!-- Nội dung trang chi tiết tin tức -->
                <div class="inner-main">
                    <h1 class="inner-title text-uppercase">
                        {{$post->name}}
                    </h1>
                    <div class="inner-date">
                        <i class="fa-regular fa-calendar"></i>
                        <span>{{$post->created_at->translatedFormat('d/m/Y')}}</span>
                    </div>
                    <div class="inner-dir"></div>
                    <div class="inner-content">
                        {!! BaseHelper::clean($post->content) !!}
                    </div>
                    <div class="box-share">
              <span class="inner-label">
                Chia sẻ:
              </span>
                        <div class="inner-list">
                            <a href="#">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="#">
                                <img src="{{ Theme::asset()->url('images/core/icon-zalo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="box-tags">
              <span class="inner-label">
                Tags:
              </span>
                        <div class="inner-list">
                            @foreach($post->tags as $tag)
                                <a href="#">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Hết Nội dung trang chi tiết tin tức -->

                <!-- Ưu đãi giá shock -->
                <div class="products-main products-position-origin products-box bg-border">
                    <div class="box-head">
                        <div class="inner-left">
                            <div class="inner-title">
                                Ưu đãi
                                <br>
                                Giá shock
                            </div>
                            <div class="inner-line"></div>
                        </div>
                        <div class="inner-right">
                            <a href="{{ route('public.rooms',['type'=>'promotion']) }}" class="button button-main">
                                Xem tất cả
                            </a>
                        </div>
                    </div>

                    <div class="swiper articleMainJS">
                        <div class="swiper-wrapper">
                            @foreach($vouchers as $voucher)
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="inner-image">
                                            {{ RvMedia::image($voucher->room->image, $voucher->room->name, 'room') }}
                                        </div>
                                        <div class="inner-content">
                                            <div class="inner-title custom-inner-title">
                                                <a href="{{ $voucher->room->url }}">
                                                    Voucher {{ $voucher->room->name }}
                                                </a>
                                            </div>
                                            <div class="inner-text">
                                                {{$voucher->created_at->translatedFormat('d/m/Y')}}
                                            </div>
                                            <div class="inner-desc custom-inner-desc">
                                                @foreach(explode("\n", $voucher->content) as $itemContent)
                                                    • {{ $itemContent }}
                                                    <br>
                                                @endforeach
                                            </div>
                                            <a href="{{ $voucher->room->url }}" class="button-round button-round-highlight">
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
                <!-- Hết Ưu đãi giá shock -->

                <!-- Liên hệ VinTravel -->
                <div class="box-quick-contact">
                    <div class="box-head">
                        <div class="inner-left">
                            <div class="inner-title">
                                Liên hệ
                                <br>
                                VinTravel
                            </div>
                            <div class="inner-line"></div>
                        </div>
                    </div>
                    <div class="inner-content">
                        <p>Để đươc tư vấn và đặt dịch vụ, quý khách vui lòng liên hệ Vintravel JSC theo:</p>
                        <ul>
                            <li>Hotline: 092 169 7777 | 092 183 6789</li>
                            <li>Zalo: 092 183 6789</li>
                            <li>Facebook: <a href="https://www.facebook.com/vintravelvouchergiare" class="inner-content" target="_blank">fb.com/vintravelvouchergiare</a></li>
                            <li>Email: cskh@vintraveljsc.com</li>
                        </ul>
                    </div>
                </div>
                <!-- Hết Liên hệ VinTravel -->

                <!-- Bài viết liên quan -->
                <div class="products-main products-position-origin products-box">
                    <div class="box-head">
                        <div class="inner-left">
                            <div class="inner-title">
                                Bài viết
                                <br>
                                Liên quan
                            </div>
                            <div class="inner-line"></div>
                        </div>
                        <div class="inner-right">
                            <a href="{{'/news'}}" class="button button-main">
                                Xem tất cả
                            </a>
                        </div>
                    </div>
                    <div class="swiper articleMainJS">
                        <div class="swiper-wrapper">
                            @foreach($post->related_posts as $relatedPost)
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <div class="inner-image">
                                            {{ RvMedia::image($relatedPost->image, $relatedPost->name, 'posts') }}
                                        </div>
                                        <div class="inner-content">
                                            <div class="inner-title news-inner-title">
                                                <a href="{{$relatedPost->url}}">
                                                   {{$relatedPost->name}}
                                                </a>
                                            </div>
                                            <div class="inner-text">
                                                {{$relatedPost->created_at->translatedFormat('d/m/Y')}}
                                            </div>
                                            <div class="inner-desc news-inner-desc">
                                                {{$relatedPost->description}}
                                            </div>
                                            <a href="{{$relatedPost->url}}" class="button-round button-round-highlight">
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
                <!-- Hết Bài viết liên quan -->
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="box-sidebar">
                    <!-- Tìm kiếm bài viết -->
                    <div class="box-quick-search">
                        <div class="box-head">
                            <div class="inner-left">
                                <div class="inner-title">
                                    Tìm kiếm bài viết
                                </div>
                                <div class="inner-line"></div>
                            </div>
                        </div>
                        <form class="inner-form">
                            <input type="text" placeholder="Nhập từ khóa" class="font-italic">
                            <button type="submit">
                                <i class="fa-solid fa-arrow-right fa-2xl text-white"></i>
                            </button>
                        </form>
                    </div>
                    <!-- Hết Tìm kiếm bài viết -->
                    {!! dynamic_sidebar('posts_sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</div>
