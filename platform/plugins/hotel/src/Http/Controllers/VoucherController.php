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
use Botble\Hotel\Forms\VoucherForm;
use Botble\Hotel\Http\Requests\RoomOptionCategoryRequest;
use Botble\Hotel\Http\Requests\VoucherRequest;
use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\VoucherInterface;
use Botble\Hotel\Tables\RoomOptionCategoryTable;
use Botble\Hotel\Tables\VoucherTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Facades\PageTitle;

class VoucherController extends BaseController
{
    public function __construct(protected VoucherInterface $voucherRepository)
    {
    }

    public function index(VoucherTable $table)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.name'));

        Assets::addScripts(['bootstrap-editable'])
            ->addStyles(['bootstrap-editable']);

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/hotel::room.create'));

        return $formBuilder->create(VoucherForm::class)->renderForm();
    }

    public function store(VoucherRequest $request, BaseHttpResponse $response)
    {
        $request->merge([
            'images' => json_encode(array_filter($request->input('images', []))),
        ]);

        $voucher = $this->voucherRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $voucher));

        return $response
            ->setPreviousUrl(route('voucher.index'))
            ->setNextUrl(route('voucher.edit', $voucher->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $voucher = $this->voucherRepository->findOrFail($id);

        PageTitle::setTitle(trans('plugins/hotel::room.edit') . ' "' . $voucher->name . '"');

        return $formBuilder->create(VoucherForm::class, ['model' => $voucher])->renderForm();
    }

    public function update(int|string $id, VoucherRequest $request, BaseHttpResponse $response)
    {
        $voucher = $this->voucherRepository->findOrFail($id);

        $voucher->fill($request->input());

        $this->voucherRepository->createOrUpdate($voucher);

        event(new UpdatedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $voucher));

        return $response
            ->setPreviousUrl(route('voucher.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $voucher = $this->voucherRepository->findOrFail($id);

            $this->voucherRepository->delete($voucher);

            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $voucher));

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
            $voucher = $this->voucherRepository->findOrFail($id);
            $this->voucherRepository->delete($voucher);
            event(new DeletedContentEvent(ROOM_MODULE_SCREEN_NAME, $request, $voucher));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
