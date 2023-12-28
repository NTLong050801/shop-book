<?php

namespace Botble\Hotel\Http\Controllers;

use Botble\Base\Facades\Assets;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Hotel\Forms\RoomForm;
use Botble\Hotel\Forms\TourForm;
use Botble\Hotel\Http\Requests\RoomRequest;
use Botble\Hotel\Http\Requests\RoomUpdateOrderByRequest;
use Botble\Hotel\Http\Requests\TourRequest;
use Botble\Hotel\Models\RoomDate;
use Botble\Hotel\Repositories\Interfaces\RoomDateInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Hotel\Tables\RoomTable;
use Botble\Hotel\Tables\TourTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Facades\PageTitle;

class TourController extends BaseController
{
    public function __construct(protected TourInterface $tourRepository)
    {
    }

    public function index(TourTable $table)
    {
        PageTitle::setTitle(trans('plugins/hotel::tour.name'));

        Assets::addScripts(['bootstrap-editable'])
            ->addStyles(['bootstrap-editable']);

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/hotel::tour.create'));

        return $formBuilder->create(TourForm::class)->renderForm();
    }

    public function store(TourRequest $request, BaseHttpResponse $response)
    {
        $request->merge([
            'images' => json_encode(array_filter($request->input('images', []))),
        ]);
        if (empty($request->input('weekdays'))){
            $request->merge(['weekdays' => []]);
        }
        $request->merge([
            'plan' => is_array($request->input('plan'))
                ? array_filter($request->input('plan'), function ($item) {
                    return is_array($item) && !empty($item[0]['value']);
                })
                : []
        ]);

        $tour = $this->tourRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $tour));

        if ($tour) {
            $tour->features()->sync($request->input('features', []));
        }

        return $response
            ->setPreviousUrl(route('tour.index'))
            ->setNextUrl(route('tour.edit', $tour->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $tour = $this->tourRepository->findOrFail($id);

        PageTitle::setTitle(trans('plugins/hotel::tour.edit') . ' "' . $tour->name . '"');

        return $formBuilder->create(TourForm::class, ['model' => $tour])->renderForm();
    }

    public function update(int|string $id, TourRequest $request, BaseHttpResponse $response)
    {
        if (empty($request->input('weekdays'))){
            $request->merge(['weekdays' => []]);
        }
        $request->merge([
            'plan' => is_array($request->input('plan'))
                ? array_filter($request->input('plan'), function ($item) {
                    return is_array($item) && !empty($item[0]['value']);
                })
                : []
        ]);
        $tour = $this->tourRepository->findOrFail($id);

        $tour->fill($request->input());
        $tour->images = json_encode(array_filter($request->input('images', [])));

        $this->tourRepository->createOrUpdate($tour);

        event(new UpdatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $tour));

        $tour->features()->sync($request->input('features', []));

        return $response
            ->setPreviousUrl(route('tour.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $tour = $this->tourRepository->findOrFail($id);

            $this->tourRepository->delete($tour);

            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $tour));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $tour = $this->tourRepository->findOrFail($id);
            $this->tourRepository->delete($tour);
            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $tour));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
