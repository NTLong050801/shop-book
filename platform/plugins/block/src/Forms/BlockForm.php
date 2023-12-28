<?php

namespace Botble\Block\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Block\Http\Requests\BlockRequest;
use Botble\Block\Models\Block;

class BlockForm extends FormAbstract
{
    public function buildForm(): void
    {
        $this
            ->setupModel(new Block())
            ->setValidatorClass(BlockRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('alias', 'text', [
                'label' => trans('core/base::forms.alias'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('core/base::forms.alias_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'required' => true,
                'choices' => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
