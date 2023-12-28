<?php

use Botble\Base\Facades\MetaBox;
use Botble\Base\Forms\FormAbstract;
use Botble\Blog\Models\Post;
use Botble\Media\Facades\RvMedia;
use Botble\Page\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as IlluminateRequest;

register_page_template([
    'no-sidebar' => __('No sidebar'),
]);

register_sidebar([
    'id' => 'top_sidebar',
    'name' => __('Top sidebar'),
    'description' => __('Area for widgets on the top sidebar'),
]);

register_sidebar([
    'id' => 'footer_sidebar',
    'name' => __('Footer sidebar'),
    'description' => __('Area for footer widgets'),
]);

register_sidebar([
    'id'          => 'hotel_sidebar',
    'name'        =>  __('packages/widget::widget.hotel_sidebar'),
    'description' =>  __('packages/widget::widget.hotel_sidebar_description'),
]);
register_sidebar([
    'id'          => 'tour_sidebar',
    'name'        => __('packages/widget::widget.tour_sidebar'),
    'description' => __('packages/widget::widget.tour_sidebar_description'),
]);

register_sidebar([
    'id' => 'posts_sidebar',
    'name'        => __('packages/widget::widget.posts_sidebar'),
    'description' => __('packages/widget::widget.posts_sidebar_description'),
]);


RvMedia::setUploadPathAndURLToPublic();
RvMedia::addSize('featured', 565, 375)->addSize('medium', 540, 360);

add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function (FormAbstract $form, Model $data): FormAbstract {
    switch (get_class($data)) {
        case Post::class:
        case Page::class:
            $data->loadMissing('metadata');

            $bannerImage = $data->getMetaData('banner_image', true);

            $form
                ->addAfter('image', 'banner_image', is_in_admin(true) ? 'mediaImage' : 'customImage', [
                    'label' => __('Banner image (1920x170px)'),
                    'value' => $bannerImage,
                ]);

            break;
    }

    return $form;
}, 124, 3);

add_action(
    [BASE_ACTION_AFTER_CREATE_CONTENT, BASE_ACTION_AFTER_UPDATE_CONTENT],
    function (string $type, IlluminateRequest $request, Model $object): void {
        switch (get_class($object)) {
            case Post::class:
            case Page::class:
                if ($request->has('banner_image')) {
                    MetaBox::saveMetaBoxData($object, 'banner_image', $request->input('banner_image'));
                }

                break;
        }
    },
    175,
    3
);
