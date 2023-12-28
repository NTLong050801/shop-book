<div class="inner-list">
    <ul {!! $options !!}>
        @foreach ($menu_nodes as $key => $row)
            <li class="{{ $row->css_class }} @if ($row->url == Request::url()) current @endif">
                <a href="{{ $row->url }}" target="{{ $row->target }}">
                    {{$row->title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
