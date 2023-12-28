<?php

namespace Botble\Hotel\Http\Controllers;

use Botble\Base\Facades\Assets;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Hotel\Forms\RoomOptionCategoryForm;
use Botble\Hotel\Forms\RoomOptionForm;
use Botble\Hotel\Http\Requests\RoomOptionCategoryRequest;
use Botble\Hotel\Http\Requests\RoomOptionRequest;
use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionInterface;
use Botble\Hotel\Tables\RoomOptionCategoryTable;
use Botble\Hotel\Tables\RoomOptionTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Facades\PageTitle;

class RoomOptionController extends BaseController
{
    public function __construct(protected RoomOptionInterface $roomOptionRepository)
    {
    }

    public function index(RoomOptionTable $table)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.name'));

        Assets::addScripts(['bootstrap-editable'])
            ->addStyles(['bootstrap-editable']);

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.create'));

        return $formBuilder->create(RoomOptionForm::class)->renderForm();
    }

    public function store(RoomOptionRequest $request, BaseHttpResponse $response)
    {
        $request->merge([
            'images' => json_encode(array_filter($request->input('images', []))),
        ]);

        $roomOption = $this->roomOptionRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOption));

        return $response
            ->setPreviousUrl(route('room-option.index'))
            ->setNextUrl(route('room-option.edit', $roomOption->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $roomOption = $this->roomOptionRepository->findOrFail($id);

        PageTitle::setTitle(trans('plugins/hotel::room.edit') . ' "' . $roomOption->name . '"');

        return $formBuilder->create(RoomOptionForm::class, ['model' => $roomOption])->renderForm();
    }

    public function update(int|string $id, RoomOptionRequest $request, BaseHttpResponse $response)
    {
        $roomOption = $this->roomOptionRepository->findOrFail($id);

        $roomOption->fill($request->input());

        $this->roomOptionRepository->createOrUpdate($roomOption);

        event(new UpdatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOption));

        return $response
            ->setPreviousUrl(route('room-option.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $roomOption = $this->roomOptionRepository->findOrFail($id);

            $this->roomOptionRepository->delete($roomOption);

            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOption));

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
            $roomOption = $this->roomOptionRepository->findOrFail($id);
            $this->roomOptionRepository->delete($roomOption);
            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOption));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
