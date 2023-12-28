<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Http\Requests\RoomOptionCategoryRequest;
use Botble\Hotel\Http\Requests\RoomRequest;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\RoomOptionCategory;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\FeatureInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;

class RoomOptionCategoryForm extends FormAbstract
{
    public function __construct(
        protected RoomInterface $roomRepository
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

        $rooms = $this->roomRepository->pluck('name', 'id');

        $this
            ->setupModel(new RoomOptionCategory())
            ->setValidatorClass(RoomOptionCategoryRequest::class)
            ->withCustomFields()
            ->add('room_id', 'customSelect', [
                'label' => trans('plugins/hotel::room-option-category.room'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $rooms,
            ])
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('beds', 'text', [
                'label' => trans('plugins/hotel::room-option-category.form.beds'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('size', 'text', [
                'label' => trans('plugins/hotel::room-option-category.form.size'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('max_adults', 'text', [
                'label' => trans('plugins/hotel::room-option-category.form.max_adults'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('max_children', 'text', [
                'label' => trans('plugins/hotel::room-option-category.form.max_children'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ])
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'attr' => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('images[]', 'mediaImages', [
                'label' => trans('plugins/hotel::room.images'),
                'label_attr' => ['class' => 'control-label'],
                'values' => $this->getModel()->id ? $this->getModel()->images : [],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
