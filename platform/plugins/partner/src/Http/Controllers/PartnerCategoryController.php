<?php

namespace Botble\Partner\Http\Controllers;

use Botble\Partner\Http\Requests\PartnerCategoryRequest;
use Botble\Partner\Models\PartnerCategory;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Partner\Tables\PartnerCategoryTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Partner\Forms\PartnerCategoryForm;
use Botble\Base\Forms\FormBuilder;

class PartnerCategoryController extends BaseController
{
    public function index(PartnerCategoryTable $table)
    {
        PageTitle::setTitle(trans('plugins/partner::partner-category.name'));

        return $table->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/partner::partner-category.create'));

        return $formBuilder->create(PartnerCategoryForm::class)->renderForm();
    }

    public function store(PartnerCategoryRequest $request, BaseHttpResponse $response)
    {
        $partnerCategory = PartnerCategory::query()->create($request->input());

        event(new CreatedContentEvent(PARTNER_CATEGORY_MODULE_SCREEN_NAME, $request, $partnerCategory));

        return $response
            ->setPreviousUrl(route('partner-category.index'))
            ->setNextUrl(route('partner-category.edit', $partnerCategory->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(PartnerCategory $partnerCategory, FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $partnerCategory->name]));

        return $formBuilder->create(PartnerCategoryForm::class, ['model' => $partnerCategory])->renderForm();
    }

    public function update(PartnerCategory $partnerCategory, PartnerCategoryRequest $request, BaseHttpResponse $response)
    {
        $partnerCategory->fill($request->input());

        $partnerCategory->save();

        event(new UpdatedContentEvent(PARTNER_CATEGORY_MODULE_SCREEN_NAME, $request, $partnerCategory));

        return $response
            ->setPreviousUrl(route('partner-category.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(PartnerCategory $partnerCategory, Request $request, BaseHttpResponse $response)
    {
        try {
            $partnerCategory->delete();

            event(new DeletedContentEvent(PARTNER_CATEGORY_MODULE_SCREEN_NAME, $request, $partnerCategory));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
