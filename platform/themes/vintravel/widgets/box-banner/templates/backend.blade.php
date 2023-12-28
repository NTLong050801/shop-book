<div class="form-group mb-3">
    <label for="widget-name">{{ trans('core/base::forms.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $config['name'] }}">
</div>
<div class="form-group mb-3">
    <div class="form-group mb-3"><label for="images[]" class="control-label">Images</label>
        <div class="gallery-images-wrapper list-images">
            <div class="images-wrapper">
                <div class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image" data-name="images">
                    <img src="{{ RvMedia::getImageUrl($config['images'], 'thumb') }}" alt="Image" width="120"><br>
                </div>
                <input name="images" type="hidden" value="">
                <ul class="list-unstyled list-gallery-media-images hidden ui-sortable" data-name="images" data-allow-thumb="1" style=""></ul>
            </div>
            <a class="add-new-gallery-image js-btn-trigger-add-image" data-name="images" href="#">Add image</a></div>
    </div>
</div>
<div class="form-group mb-3">
    <label for="widget-name">Link</label>
    <input type="text" class="form-control" name="url" value="{{ $config['url'] }}">
</div>
