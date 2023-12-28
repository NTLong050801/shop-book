<?php

namespace Botble\Partner\Http\Controllers;

use Botble\Partner\Http\Requests\PartnerRequest;
use Botble\Partner\Models\Partner;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Partner\Tables\PartnerTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Partner\Forms\PartnerForm;
use Botble\Base\Forms\FormBuilder;

class PartnerController extends BaseController
{
    public function index(PartnerTable $table)
    {
        PageTitle::setTitle(trans('plugins/partner::partner.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/partner::partner.create'));

        return $formBuilder->create(PartnerForm::class)->renderForm();
    }

    public function store(PartnerRequest $request, BaseHttpResponse $response)
    {
        $partner = Partner::query()->create($request->input());

        event(new CreatedContentEvent(PARTNER_MODULE_SCREEN_NAME, $request, $partner));

        return $response
            ->setPreviousUrl(route('partner.index'))
            ->setNextUrl(route('partner.edit', $partner->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Partner $partner, FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $partner->name]));

        return $formBuilder->create(PartnerForm::class, ['model' => $partner])->renderForm();
    }

    public function update(Partner $partner, PartnerRequest $request, BaseHttpResponse $response)
    {
        $partner->fill($request->input());

        $partner->save();

        event(new UpdatedContentEvent(PARTNER_MODULE_SCREEN_NAME, $request, $partner));

        return $response
            ->setPreviousUrl(route('partner.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Partner $partner, Request $request, BaseHttpResponse $response)
    {
        try {
            $partner->delete();

            event(new DeletedContentEvent(PARTNER_MODULE_SCREEN_NAME, $request, $partner));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
