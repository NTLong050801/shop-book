<?php

namespace Botble\Member\Http\Controllers;

use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Media\Models\MediaFile;
use Botble\Member\Forms\MemberForm;
use Botble\Member\Http\Requests\MemberCreateRequest;
use Botble\Member\Http\Requests\MemberEditRequest;
use Botble\Member\Models\Member;
use Botble\Member\Tables\MemberTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends BaseController
{
    public function index(MemberTable $dataTable)
    {
        PageTitle::setTitle(trans('plugins/member::member.menu_name'));

        return $dataTable->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/member::member.create'));

        return $formBuilder
            ->create(MemberForm::class)
            ->remove('is_change_password')
            ->renderForm();
    }

    public function store(MemberCreateRequest $request, BaseHttpResponse $response)
    {
        $member = new Member();
        $member->fill($request->input());
        $member->confirmed_at = Carbon::now();
        $member->password = Hash::make($request->input('password'));

        if ($request->input('avatar_image')) {
            $image = MediaFile::query()->where('url', $request->input('avatar_image'))->first();
            if ($image) {
                $member->avatar_id = $image->getKey();
            }
        }

        $member->save();

        event(new CreatedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

        return $response
            ->setPreviousUrl(route('member.index'))
            ->setNextUrl(route('member.edit', $member->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Member $member, FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('core/base::forms.edit_item', ['name' => $member->name]));

        $member->password = null;

        return $formBuilder
            ->create(MemberForm::class, ['model' => $member])
            ->renderForm();
    }

    public function update(Member $member, MemberEditRequest $request, BaseHttpResponse $response)
    {
        $member->fill($request->except('password'));

        if ($request->input('is_change_password') == 1) {
            $member->password = Hash::make($request->input('password'));
        }

        if ($request->input('avatar_image')) {
            $image = MediaFile::query()->where('url', $request->input('avatar_image'))->first();
            if ($image) {
                $member->avatar_id = $image->id;
            }
        }

        $member->save();

        event(new UpdatedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

        return $response
            ->setPreviousUrl(route('member.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Member $member, Request $request, BaseHttpResponse $response)
    {
        try {
            $member->delete();
            event(new DeletedContentEvent(MEMBER_MODULE_SCREEN_NAME, $request, $member));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
}
