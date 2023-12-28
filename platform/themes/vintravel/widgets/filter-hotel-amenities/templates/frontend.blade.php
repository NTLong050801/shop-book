@if (is_plugin_active('hotel') && $amenities->count())
    <div class="inner-box">
        <div class="inner-sub-title">
            {{ $config['title'] }}
        </div>
        <div class="category-filter" filter-show-max="5">
                <?php $count = 0 ?>
            @foreach($amenities as $item)
                @if($item->rooms->count())
                        <?php $count++ ?>
                    <label class="inner-label">{{ $item->name }}
                        <input type="checkbox" class="amenities" name="amenities[]" value="{{$item->id}}"
                               @if(request()->has('amenities') && in_array($item->id, request()->input('amenities')))
                                   checked
                            @endif
                        >
                        <span class="inner-checkmark"></span>
                    </label>
                @endif
            @endforeach
            @if($count>5)
                <div class="inner-view-more" btn-show-more>
                    Xem thêm <i class="fa-solid fa-angle-down"></i>
                </div>
            @endif
        </div>
    </div>
@endif
