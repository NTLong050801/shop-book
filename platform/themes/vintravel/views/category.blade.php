<!-- Bài viết mới nhất -->
<div class="products-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            @if(!empty($title))
                                {{$title}}
                            @else
                                @foreach(explode("\n", $category->name) as $itemContent)
                                    {{ $itemContent }}
                                    <br>
                                @endforeach
                            @endif
                        </div>
                        <div class="inner-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-4 mb-5">
                        <div class="product-item">
                            <div class="inner-image">
                                {{ RvMedia::image($post->image, $post->name, 'posts') }}
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
            <div class="d-flex justify-content-center custom-pagination">
                <div class="">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
