<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Http\Requests\RoomOptionCategoryRequest;
use Botble\Hotel\Http\Requests\RoomOptionRequest;
use Botble\Hotel\Http\Requests\RoomRequest;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\RoomOption;
use Botble\Hotel\Models\RoomOptionCategory;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\FeatureInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionInterface;

class RoomOptionForm extends FormAbstract
{
    public function __construct(
        protected RoomOptionCategoryInterface $roomOptionCategoryRepository
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

        $roomOptionCategories = $this->roomOptionCategoryRepository->allBy([], ['room'], ['id', 'name', 'room_id']);

        $roomOptionCategoriesArray = [];

        foreach ($roomOptionCategories as $roomOptionCategory) {
            $roomOptionCategoriesArray[$roomOptionCategory->id] = $roomOptionCategory->room->name . ' - ' . $roomOptionCategory->name;
        }

        $this
            ->setupModel(new RoomOption())
            ->setValidatorClass(RoomOptionRequest::class)
            ->withCustomFields()
            ->add('room_option_category_id', 'customSelect', [
                'label' => trans('plugins/hotel::room-option.room_option_category'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $roomOptionCategoriesArray,
            ])
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('is_outstanding_room_option', 'onOff', [
                'label' => trans('plugins/hotel::room-option.is_outstanding_room_option'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('content', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 10,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                ],
            ])
            ->add('price', 'text', [
                'label' => trans('plugins/hotel::room.form.price'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price-number',
                    'placeholder' => trans('plugins/hotel::room.form.price'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('price_child', 'text', [
                'label' => trans('plugins/hotel::room-option.form.price_child'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'id' => 'price-child',
                    'placeholder' => trans('plugins/hotel::room-option.form.price_child'),
                    'class' => 'form-control input-mask-number',
                ],
            ])
            ->add('price_description', 'text', [
                'label' => trans('plugins/hotel::room-option.form.price_description'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                ],
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
