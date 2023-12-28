<?php

namespace Botble\Partner\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Partner\Http\Requests\PartnerRequest;
use Botble\Partner\Models\Partner;
use Botble\Partner\Models\PartnerCategory;

class PartnerForm extends FormAbstract
{
    public function buildForm(): void
    {
        $categoriesPartner = PartnerCategory::all()->pluck('name','id')->toArray();

        $this
            ->setupModel(new Partner)
            ->setValidatorClass(PartnerRequest::class)
            ->withCustomFields()
            ->add('partner_category_id', 'customSelect', [
                'label' => trans('plugins/partner::partner.partner_category_id'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => $categoriesPartner,
            ])
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('logo', 'mediaImage')
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper' => [
                    'class' => 'form-group',
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
