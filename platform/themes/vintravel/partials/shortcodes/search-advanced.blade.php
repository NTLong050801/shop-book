{{--search-advanced-header--}}
<div class="search-advanced inner-top {{ $class }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-label">
                    <ul class="nav nav-tabs" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link {{!request()->routeIs('public.rooms') ? 'active' : ''}}" id="tab1-tab" data-toggle="tab" href="#tab1">Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('public.rooms') ? 'active' : ''}}" id="tab2-tab" data-toggle="tab" href="#tab2">Booking</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-2">
                    <div class="tab-pane fade {{!request()->routeIs('public.rooms') ? 'show active' : ''}}" id="tab1">
                        <form action="{{ route('public.tours') }}">
                            {!! do_shortcode('[search-advanced-content][/search-advanced-content]') !!}
                        </form>
                    </div>
                    <div class="tab-pane fade {{request()->routeIs('public.rooms') ? 'show active' : ''}}" id="tab2">
                        <form action="{{ route('public.rooms') }}">
                            {!! do_shortcode('[search-advanced-content][/search-advanced-content]') !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
