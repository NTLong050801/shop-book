<div class="form-group">
    <label class="control-label">{{ __('Title') }}</label>
    <input
        class="form-control"
        name="title"
        value="{{ Arr::get($attributes, 'title') }}"
    />
</div>

<div class="form-group">
    <label class="control-label">{{ trans('plugins/gallery::gallery.limit_display') }}</label>
    {!! Form::input('text', 'limit', Arr::get($attributes, 'limit', 8), ['class' => 'form-control']) !!}
</div>
