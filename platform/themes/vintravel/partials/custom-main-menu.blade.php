<?php $user = auth('member')->user(); ?>
<div class="inner-left w-auto">
    <div class="inner-logo">
        <a href="/">
            <img src="{{ Theme::asset()->url('images/core/logo.png') }}" alt="VinTravel">
        </a>
    </div>
    <div class="inner-menu">
        <ul {!! $options !!}>
            @foreach ($menu_nodes as $key => $row)
                <li class="{{ $row->css_class }} @if ($row->url == Request::getUri()) border-bottom @endif">
                    <a href="{{ $row->url }}" target="{{ $row->target }}">
                        <i class='{{ trim($row->icon_font) }}'></i> <span>{{ $row->title }}</span>
                    </a>
                    @if ($row->has_child)
                        {!! Menu::generateMenu([
                            'slug' => $menu->slug,
                            'parent_id' => $row->id
                        ]) !!}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="inner-right w-auto">
    <div class="inner-actions">
        <a class="#" id="buttonOpenMenu">
            <i class="fa-solid fa-bars"></i>
        </a>
        @if(is_null($user))
            <a href="#" data-toggle="modal" data-target="#login_modal">
                <i class="fa-solid fa-circle-user"></i>
            </a>
        @else
            <a href="#profilePopup" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="profilePopup">
                <i class="fa-solid fa-circle-user"></i>
            </a>
            <div class="collapse profile-popup" id="profilePopup">
                <p>Xin chào {{ $user->name }}</p>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr1"></i> <span>Logout</span>
                </a>
                <form
                    id="logout-form"
                    style="display: none;"
                    action="{{ route('public.member.logout') }}"
                    method="POST"
                >
                    @csrf
                </form>
            </div>
        @endif
        <a href="{{ route('public.booking.cart') }}">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
</div>
