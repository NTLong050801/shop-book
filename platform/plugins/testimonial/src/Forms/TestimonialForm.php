<?php

namespace Botble\Testimonial\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Testimonial\Http\Requests\TestimonialRequest;
use Botble\Testimonial\Models\Testimonial;

class TestimonialForm extends FormAbstract
{
    public function __construct(
        protected RoomInterface $roomRepository,
        protected TourInterface $tourRepository,
    )
    {
        parent::__construct();
    }

    public function buildForm(): void
    {
        $rooms = $this->roomRepository->allBy([], [], ['id', 'name']);

        $selectedRooms = [];
        if ($this->getModel()) {
            $selectedRooms = $this->getModel()->rooms()->pluck('ht_rooms.id')->all();
        }

        $tours = $this->tourRepository->allBy([], [], ['id', 'name']);

        $selectedTours = [];
        if ($this->getModel()) {
            $selectedTours = $this->getModel()->tours()->pluck('ht_tours.id')->all();
        }

        $this
            ->setupModel(new Testimonial())
            ->setValidatorClass(TestimonialRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('company', 'text', [
                'label' => trans('plugins/testimonial::testimonial.company'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => trans('plugins/testimonial::testimonial.company'),
                    'data-counter' => 120,
                ],
            ])
            ->add('content', 'editor', [
                'label' => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'rows' => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                ],
            ])
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->addMetaBoxes([
                'rooms' => [
                    'title' => trans('plugins/testimonial::testimonial.rooms'),
                    'content' => view(
                        'plugins/hotel::forms.rooms',
                        compact('selectedRooms', 'rooms')
                    )->render(),
                    'priority' => 1,
                ],
            ])
            ->addMetaBoxes([
                'tours' => [
                    'title' => trans('plugins/testimonial::testimonial.tours'),
                    'content' => view(
                        'plugins/hotel::forms.tours',
                        compact('selectedTours', 'tours')
                    )->render(),
                    'priority' => 1,
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
