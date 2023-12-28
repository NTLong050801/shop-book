<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Http\Requests\RoomRequest;
use Botble\Hotel\Http\Requests\TourRequest;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\Tour;
use Botble\Hotel\Repositories\Eloquent\FeatureRepository;
use Botble\Hotel\Repositories\Eloquent\PlaceRepository;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\FeatureInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Testimonial\Repositories\Interfaces\TestimonialInterface;

class TourForm extends FormAbstract
{
    public function __construct(
        protected FeatureInterface     $featureRepository,
        protected PlaceInterface       $placeRepository,
        protected TestimonialInterface $testimonialRepository
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
        $selectedWeekdays  = [];
        if ($this->getModel()) {
            $selectedWeekdays = $this->getModel()->weekdays ?? [];
        }
        $weekdays = [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday',
        ];
        $repeaterPlan = $this->getModel() ? ($this->getModel()->plan ?? []) : [];
        $this
            ->setupModel(new Tour())
            ->setValidatorClass(TourRequest::class)
            ->withCustomFields()
            ->add('code', 'text', [
                'label' => trans('plugins/hotel::tour.form.code'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('tag', 'text', [
                'label' => trans('plugins/hotel::tour.form.tag'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
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
            ->add('address', 'text', [
                'label' => trans('plugins/hotel::tour.form.address'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
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
            ->add('more_content', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.more_content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 10,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
            ])
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('price_old', 'text', [
                'label' => trans('plugins/hotel::tour.form.price_old'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'attr' => [
                    'id' => 'price-old-number',
                    'placeholder' => trans('plugins/hotel::room.form.price_old'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('price', 'text', [
                'label' => trans('plugins/hotel::tour.form.price'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::tour.form.price'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('price_child', 'text', [
                'label' => trans('plugins/hotel::tour.form.price_child'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('price_baby', 'text', [
                'label' => trans('plugins/hotel::tour.form.price_baby'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ])
            ->add('rowOpen2', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('trip', 'text', [
                'label' => trans('plugins/hotel::tour.form.trip'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('duration', 'text', [
                'label' => trans('plugins/hotel::tour.form.duration'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('schedule', 'text', [
                'label' => trans('plugins/hotel::tour.form.schedule'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('rowClose2', 'html', [
                'html' => '</div>',
            ])
            ->add('rowOpen3', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('vehicle', 'text', [
                'label' => trans('plugins/hotel::tour.form.vehicle'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('departure_location', 'text', [
                'label' => trans('plugins/hotel::tour.form.departure_location'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
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
            ->add('rowClose3', 'html', [
                'html' => '</div>',
            ])
            ->add('images[]', 'mediaImages', [
                'label' => trans('plugins/hotel::room.images'),
                'label_attr' => ['class' => 'control-label'],
                'values' => $this->getModel()->id ? $this->getModel()->images : [],
            ])
            ->add('rowOpen4', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('services_include', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.services_include'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('services_exclude', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.services_exclude'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-6',
                ],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('rowClose4', 'html', [
                'html' => '</div>',
            ])
            ->add('registration_conditions', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.registration_conditions'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('cancel_conditions', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.cancel_conditions'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('checkout_description', 'textarea', [
                'label' => trans('plugins/hotel::tour.form.checkout_description'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                ],
            ])
            ->add('plan', 'repeater', [
                'label' => trans('plugins/hotel::tour.form.plan'),
                'label_attr' => ['class' => 'control-label'],
                'id' => 'social_links',
                'name' => 'plan',
                'fields' => [
                    [
                        'type' => 'text',
                        'label' => trans('plugins/hotel::tour.form.title'),
                        'label_attr' => ['class' => 'control-label required'],
                        'attributes' => [
                            'name' => 'title',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                                'data-counter' => 255,
                            ],
                        ],
                    ],
                    [
                        'type' => 'editor',
                        'label' => trans('plugins/hotel::tour.form.content'),
                        'label_attr' => ['class' => 'control-label'],
                        'attributes' => [
                            'name' => 'content',
                            'value' => null,
                            'options' => [
                                'class' => 'form-control',
                                'rows' => 3,
                                'with-short-code' => false,
                                'without-buttons' => false,
                            ],
                        ],
                    ],
                ],
                'value' => $repeaterPlan,
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('place_id', 'customSelect', [
                'label' => trans('plugins/hotel::tour.form.place'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $places,
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
                'weekdays' => [
                    'title' => trans('plugins/hotel::tour.form.weekdays'),
                    'content' => view(
                        'plugins/hotel::forms.weekdays',
                        compact('weekdays','selectedWeekdays')
                    )->render(),
                    'priority' => 1,
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
