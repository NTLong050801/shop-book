<li>
    <a
        class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
        href="{{ route('public.member.posts.index') }}"
        title="{{ trans('plugins/blog::member.posts') }}"
        style="text-decoration: none; line-height: 32px;"
    >
        <i class="far fa-newspaper mr1"></i>{{ trans('plugins/blog::member.posts') }}
    </a>
</li>
<li>
    <a
        class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
        href="{{ route('public.member.posts.create') }}"
        title="{{ trans('plugins/blog::member.write_post') }}"
        style="text-decoration: none; line-height: 32px;"
    >
        <i class="far fa-edit mr1"></i>{{ trans('plugins/blog::member.write_post') }}
    </a>
</li>
