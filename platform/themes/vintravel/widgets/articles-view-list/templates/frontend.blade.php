@if (is_plugin_active('blog') && $posts->count())
<!-- Bài viết nổi bật -->
<div class="articles-view-list">
    <div class="box-head">
        <div class="inner-left">
            <div class="inner-title">
               {{$config['name']}}
            </div>
            <div class="inner-line"></div>
        </div>
    </div>

    <div class="inner-list">
        @foreach($posts as $post)
            <div class="article-item-horizontal">
                <div class="inner-image">
                    <a href="{{ $post->url }}">
                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                    </a>
                </div>
                <div class="inner-content">
                    <div class="inner-title">
                        <a href="{{ $post->url }}">
                            {{$post->name}}
                        </a>
                    </div>
                    <div class="inner-date">
                        {{$post->created_at->translatedFormat('d/m/Y')}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Hết Bài viết nổi bật -->
@endif
