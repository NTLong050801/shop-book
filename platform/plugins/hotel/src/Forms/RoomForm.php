<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Http\Requests\RoomRequest;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\FeatureInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Testimonial\Repositories\Interfaces\TestimonialInterface;

class RoomForm extends FormAbstract
{
    public function __construct(
        protected AmenityInterface      $amenityRepository,
        protected FeatureInterface      $featureRepository,
        protected PlaceInterface        $placeRepository,
        protected CurrencyInterface     $currencyRepository,
        protected RoomCategoryInterface $roomCategoryRepository,
        protected TestimonialInterface  $testimonialRepository
    )
    {
        parent::__construct();
    }

    public function buildForm(): void
    {
        Assets::addScripts(['input-mask', 'moment'])
            ->addScriptsDirectly([
                'vendor/core/plugins/hotel/libraries/full-calendar-5.3.2/main.min.js',
                'vendor/core/plugins/hotel/js/room-availability.js',
            ])
            ->addStylesDirectly([
                'vendor/core/plugins/hotel/libraries/full-calendar-5.3.2/main.min.css',
                'vendor/core/plugins/hotel/css/hotel.css',
            ]);

        Assets::usingVueJS();

        $roomCategories = $this->roomCategoryRepository->pluck('name', 'id');

        $amenities = $this->amenityRepository->allBy([], [], ['id', 'name']);

        $selectedAmenities = [];
        if ($this->getModel()) {
            $selectedAmenities = $this->getModel()->amenities()->pluck('ht_amenities.id')->all();
        }

        $features = $this->featureRepository->allBy([], [], ['id', 'name']);

        $selectedFeatures = [];
        if ($this->getModel()) {
            $selectedFeatures = $this->getModel()->features()->pluck('ht_features.id')->all();
        }

        $testimonials = $this->testimonialRepository->allBy([], [], ['id', 'name', 'content']);
        $selectedTestimonials = [];
        if ($this->getModel()) {
            $selectedTestimonials = $this->getModel()->testimonials()->pluck('testimonials.id')->all();
        }

        $places = $this->placeRepository->pluck('name', 'id');

        $this
            ->setupModel(new Room())
            ->setValidatorClass(RoomRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('is_featured', 'onOff', [
                'label' => trans('core/base::forms.is_featured'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('rowOpen0', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('price_old', 'text', [
                'label' => trans('plugins/hotel::room.form.price_old'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'class' => 'form-control input-mask-number',
                    'placeholder' => trans('plugins/hotel::room.form.price_old_by_placeholder'),
                ],
            ])
            ->add('price', 'text', [
                'label' => trans('plugins/hotel::room.form.price'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group  col-md-6',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'class' => 'form-control input-mask-number',
                    'placeholder' => trans('plugins/hotel::room.form.price_by_placeholder'),
                    'readonly',
                ],
            ])
            ->add('rowClose0', 'html', [
                'html' => '</div>',
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('content', 'textarea', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('map', 'textarea', [
                'label' => trans('plugins/hotel::room.form.map'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 4,
                    'with-short-code' => true,
                ],
            ])
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('rating', 'customSelect', [
                'label' => trans('plugins/hotel::room.form.rating'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => [
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                ],
            ])
            ->add('address', 'text', [
                'label' => trans('plugins/hotel::room.form.address'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'attr' => [
                    'data-counter' => 120,
                ],
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ])
            ->add('rowOpen3', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('number_orders', 'text', [
                'label' => trans('plugins/hotel::room.form.number_orders'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('phone', 'text', [
                'label' => trans('plugins/hotel::room.form.phone'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'data-counter' => 20,
                ],
            ])
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('rowClose3', 'html', [
                'html' => '</div>',
            ])
            ->add('images[]', 'mediaImages', [
                'label' => trans('plugins/hotel::room.images'),
                'label_attr' => ['class' => 'control-label'],
                'values' => $this->getModel()->id ? $this->getModel()->images : [],
            ])
            ->add('rowOpen2', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('check_in_time', 'time', [
                'label' => trans('plugins/hotel::room.form.check_in_time'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'default_value' => '14:00',
            ])
            ->add('check_out_time', 'time', [
                'label' => trans('plugins/hotel::room.form.check_out_time'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'default_value' => '12:00',
            ])
            ->add('rowClose2', 'html', [
                'html' => '</div>',
            ])
            ->add('children_policies', 'textarea', [
                'label' => trans('plugins/hotel::room.form.children_policies'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 10,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('directions', 'textarea', [
                'label' => trans('plugins/hotel::room.form.directions'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 10,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('check_in_instructions', 'textarea', [
                'label' => trans('plugins/hotel::room.form.check_in_instructions'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 10,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('room_category_id', 'customSelect', [
                'label' => trans('plugins/hotel::room.form.category'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $roomCategories,
            ])
            ->add('place_id', 'customSelect', [
                'label' => trans('plugins/hotel::room.form.place'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $places,
            ])
            ->addMetaBoxes([
                'amenities' => [
                    'title' => trans('plugins/hotel::room.amenities'),
                    'content' => view(
                        'plugins/hotel::forms.amenities',
                        compact('selectedAmenities', 'amenities')
                    )->render(),
                    'priority' => 1,
                ],
            ])
            ->addMetaBoxes([
                'features' => [
                    'title' => trans('plugins/hotel::room.features'),
                    'content' => view(
                        'plugins/hotel::forms.features',
                        compact('selectedFeatures', 'features')
                    )->render(),
                    'priority' => 1,
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
