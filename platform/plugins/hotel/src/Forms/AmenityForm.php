<?php

namespace Botble\Hotel\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Http\Requests\AmenityRequest;
use Botble\Hotel\Models\Amenity;

class AmenityForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->setupModel(new Amenity())
            ->setValidatorClass(AmenityRequest::class)
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
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
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
