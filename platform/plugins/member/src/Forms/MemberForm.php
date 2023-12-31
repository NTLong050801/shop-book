<?php

namespace Botble\Member\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Forms\FormAbstract;
use Botble\Member\Http\Requests\MemberCreateRequest;
use Botble\Member\Models\Member;
use Carbon\Carbon;

class MemberForm extends FormAbstract
{
    public function buildForm(): void
    {
        Assets::addScriptsDirectly(['/vendor/core/plugins/member/js/member-admin.js']);

        $this
            ->setupModel(new Member())
            ->setValidatorClass(MemberCreateRequest::class)
            ->withCustomFields()
            ->add('first_name', 'text', [
                'label' => trans('plugins/member::member.first_name'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('last_name', 'text', [
                'label' => trans('plugins/member::member.last_name'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('email', 'text', [
                'label' => trans('plugins/member::member.form.email'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('plugins/member::member.email_placeholder'),
                    'data-counter' => 60,
                ],
            ])
            ->add('phone', 'text', [
                'label' => trans('plugins/member::member.phone'),
                'attr' => [
                    'placeholder' => trans('plugins/member::member.phone_placeholder'),
                    'data-counter' => 20,
                ],
            ])
            ->add('dob', 'datePicker', [
                'label' => trans('plugins/member::member.dob'),
                'default_value' => BaseHelper::formatDate(Carbon::now()),
            ])
            ->add('description', 'textarea', [
                'label' => trans('core/base::forms.description'),
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('is_change_password', 'checkbox', [
                'label' => trans('plugins/member::member.form.change_password'),
                'value' => 1,
            ])
            ->add('password', 'password', [
                'label' => trans('plugins/member::member.form.password'),
                'required' => true,
                'attr' => [
                    'data-counter' => 60,
                ],
                'wrapper' => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ])
            ->add('password_confirmation', 'password', [
                'label' => trans('plugins/member::member.form.password_confirmation'),
                'required' => true,
                'attr' => [
                    'data-counter' => 60,
                ],
                'wrapper' => [
                    'class' => $this->formHelper->getConfig('defaults.wrapper_class') . ($this->getModel()->id ? ' hidden' : null),
                ],
            ])
            ->add('avatar_image', 'mediaImage', [
                'value' => $this->getModel()->avatar->url,
            ])
            ->setBreakFieldPoint('avatar_image');
    }
}
