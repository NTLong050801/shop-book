<?php

namespace Botble\Member\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Facades\EmailHandler;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Blog\Services\StoreCategoryService;
use Botble\Blog\Services\StoreTagService;
use Botble\Media\Facades\RvMedia;
use Botble\Member\Forms\PostForm;
use Botble\Member\Http\Requests\PostRequest;
use Botble\Member\Models\Member;
use Botble\Member\Models\MemberActivityLog;
use Botble\Member\Tables\PostTable;
use Botble\SeoHelper\Facades\SeoHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index(PostTable $postTable)
    {
        SeoHelper::setTitle(trans('plugins/blog::posts.posts'));

        return $postTable->renderTable();
    }

    public function create(FormBuilder $formBuilder)
    {
        SeoHelper::setTitle(trans('plugins/member::member.write_a_post'));

        return $formBuilder->create(PostForm::class)->renderForm();
    }

    public function store(
        PostRequest $request,
        StoreTagService $tagService,
        StoreCategoryService $categoryService,
        BaseHttpResponse $response
    ) {
        $this->processRequestData($request);

        $post = Post::query()->create(
            array_merge($request->except('status'), [
                'author_id' => auth('member')->id(),
                'author_type' => Member::class,
                'status' => BaseStatusEnum::PENDING,
            ])
        );

        event(new CreatedContentEvent(POST_MODULE_SCREEN_NAME, $request, $post));

        MemberActivityLog::query()->create([
            'action' => 'create_post',
            'reference_name' => $post->name,
            'reference_url' => route('public.member.posts.edit', $post->getKey()),
        ]);

        $tagService->execute($request, $post);

        $categoryService->execute($request, $post);

        EmailHandler::setModule(MEMBER_MODULE_SCREEN_NAME)
            ->setVariableValues([
                'post_name' => $post->name,
                'post_url' => route('posts.edit', $post->getKey()),
                'post_author' => $post->author->name,
            ])
            ->sendUsingTemplate('new-pending-post');

        return $response
            ->setPreviousUrl(route('public.member.posts.index'))
            ->setNextUrl(route('public.member.posts.edit', $post->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $post = Post::query()
            ->where([
                'id' => $id,
                'author_id' => auth('member')->id(),
                'author_type' => Member::class,
            ])
            ->firstOrFail();

        SeoHelper::setTitle(trans('core/base::forms.edit_item', ['name' => $post->name]));

        return $formBuilder
            ->create(PostForm::class, ['model' => $post])
            ->renderForm();
    }

    public function update(
        int|string $id,
        PostRequest $request,
        StoreTagService $tagService,
        StoreCategoryService $categoryService,
        BaseHttpResponse $response
    ) {
        $post = Post::query()
            ->where([
                'id' => $id,
                'author_id' => auth('member')->id(),
                'author_type' => Member::class,
            ])
            ->firstOrFail();

        $this->processRequestData($request);

        $post->fill($request->except('status'));
        $post->save();

        event(new UpdatedContentEvent(POST_MODULE_SCREEN_NAME, $request, $post));

        MemberActivityLog::query()->create([
            'action' => 'update_post',
            'reference_name' => $post->name,
            'reference_url' => route('public.member.posts.edit', $post->getKey()),
        ]);

        $tagService->execute($request, $post);

        $categoryService->execute($request, $post);

        return $response
            ->setPreviousUrl(route('public.member.posts.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    protected function processRequestData(Request $request): Request
    {
        $account = auth('member')->user();

        if ($request->hasFile('image_input')) {
            $result = RvMedia::handleUpload($request->file('image_input'), 0, $account->upload_folder);
            if (! $result['error']) {
                $file = $result['data'];
                $request->merge(['image' => $file->url]);
            }
        }

        $shortcodeCompiler = shortcode()->getCompiler();

        $request->merge([
            'content' => $shortcodeCompiler->strip(
                $request->input('content'),
                $shortcodeCompiler->whitelistShortcodes()
            ),
        ]);

        $except = [
            'status',
            'is_featured',
        ];

        foreach ($except as $item) {
            $request->request->remove($item);
        }

        return $request;
    }

    public function destroy(int|string $id, BaseHttpResponse $response)
    {
        $post = Post::query()
            ->where([
                'id' => $id,
                'author_id' => auth('member')->id(),
                'author_type' => Member::class,
            ])
            ->firstOrFail();

        $post->delete();

        MemberActivityLog::query()->create([
            'action' => 'delete_post',
            'reference_name' => $post->name,
        ]);

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function getAllTags()
    {
        return Tag::query()->pluck('name')->all();
    }
}
