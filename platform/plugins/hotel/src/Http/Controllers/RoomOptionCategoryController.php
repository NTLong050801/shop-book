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
use Botble\Hotel\Http\Requests\RoomOptionCategoryRequest;
use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Botble\Hotel\Tables\RoomOptionCategoryTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Facades\PageTitle;

class RoomOptionCategoryController extends BaseController
{
    public function __construct(protected RoomOptionCategoryInterface $roomOptionCategoryRepository)
    {
    }

    public function index(RoomOptionCategoryTable $table)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.name'));

        Assets::addScripts(['bootstrap-editable'])
            ->addStyles(['bootstrap-editable']);

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.create'));

        return $formBuilder->create(RoomOptionCategoryForm::class)->renderForm();
    }

    public function store(RoomOptionCategoryRequest $request, BaseHttpResponse $response)
    {
        $request->merge([
            'images' => json_encode(array_filter($request->input('images', []))),
        ]);

        $roomOptionCategory = $this->roomOptionCategoryRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOptionCategory));

        return $response
            ->setPreviousUrl(route('room.index'))
            ->setNextUrl(route('room-option-category.edit', $roomOptionCategory->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $roomOptionCategory = $this->roomOptionCategoryRepository->findOrFail($id);

        PageTitle::setTitle(trans('plugins/hotel::room.edit') . ' "' . $roomOptionCategory->name . '"');

        return $formBuilder->create(RoomOptionCategoryForm::class, ['model' => $roomOptionCategory])->renderForm();
    }

    public function update(int|string $id, RoomOptionCategoryRequest $request, BaseHttpResponse $response)
    {
        $roomOptionCategory = $this->roomOptionCategoryRepository->findOrFail($id);

        $roomOptionCategory->fill($request->input());
        $roomOptionCategory->images = json_encode(array_filter($request->input('images', [])));

        $this->roomOptionCategoryRepository->createOrUpdate($roomOptionCategory);

        event(new UpdatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOptionCategory));

        return $response
            ->setPreviousUrl(route('room-option-category.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $roomOptionCategory = $this->roomOptionCategoryRepository->findOrFail($id);

            $this->roomOptionCategoryRepository->delete($roomOptionCategory);

            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOptionCategory));

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
            $roomOptionCategory = $this->roomOptionCategoryRepository->findOrFail($id);
            $this->roomOptionCategoryRepository->delete($roomOptionCategory);
            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $roomOptionCategory));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
