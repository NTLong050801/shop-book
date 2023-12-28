@if (is_plugin_active('blog') && $tags->count())
    <!-- Chủ đề yêu thích -->
    <div class="box-tags-highlight">
        <div class="box-head">
            <div class="inner-left">
                <div class="inner-title">
                    {{$config['name']}}
                </div>
                <div class="inner-line"></div>
            </div>
        </div>

        <div class="inner-list">
            @foreach($tags as $tag)
                <a href="{{$tag->url}}">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
    <!-- Hết Chủ đề yêu thích -->
@endif
