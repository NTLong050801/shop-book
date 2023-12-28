@if (is_plugin_active('hotel') && $places->count())
    <div class="inner-box">
        <div class="inner-sub-title">
            {{ $config['title'] }}
        </div>
        <div class="category-filter" filter-show-max="5">
                <?php $count = 0 ?>
            @foreach($places as $item)
                @switch($config['type'])
                    @case('rooms')
                        @if($item->rooms->count())
                                <?php $count++ ?>
                            <label class="inner-label">{{ $item->name }}
                                <input type="checkbox" class="places" name="places[]" value="{{$item->id}}"
                                       @if(request()->has('places') && in_array($item->id, request()->input('places')))
                                           checked
                                    @endif
                                >
                                <span class="inner-checkmark"></span>
                            </label>
                        @endif
                        @break

                    @case('tours')
                        @if($item->tours->count())
                                <?php $count++ ?>
                            <label class="inner-label">{{ $item->name }}
                                <input type="checkbox" class="places" name="places[]" value="{{$item->id}}"
                                       @if(request()->has('places') && in_array($item->id, request()->input('places')))
                                           checked
                                    @endif
                                >
                                <span class="inner-checkmark"></span>
                            </label>
                        @endif
                        @break
                @endswitch
            @endforeach
            @if($count>5)
                <div class="inner-view-more" btn-show-more>
                    Xem thêm <i class="fa-solid fa-angle-down"></i>
                </div>
            @endif
        </div>
    </div>
@endif
