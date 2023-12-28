<?php

namespace Botble\Member\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseQueryBuilder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Member\Models\Member;
use Botble\Member\Tables\Traits\ForMember;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\ImageColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Relations\Relation as EloquentRelation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class PostTable extends TableAbstract
{
    use ForMember;

    public function setup(): void
    {
        $this
            ->model(Post::class)
            ->addActions([
                EditAction::make()->route('public.member.posts.edit'),
                DeleteAction::make()->route('public.member.posts.destroy'),
            ]);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('categories_name', function (Post $item) {
                return implode(', ', $item->categories->pluck('name')->all());
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this->getModel()
            ->query()
            ->with(['categories'])
            ->select([
                'id',
                'name',
                'image',
                'created_at',
                'status',
                'updated_at',
            ])
            ->where([
                'author_id' => auth('member')->id(),
                'author_type' => Member::class,
            ]);

        return $this->applyScopes($query);
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('public.member.posts.create'));
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()
                ->beforeDispatch(function (Post $model, array $ids) {
                    foreach ($ids as $id) {
                        $post = Post::query()->findOrFail($id);

                        if (auth('member')->id() !== $post->author_id) {
                            abort(403);
                        }
                    }
                }),
        ];
    }

    public function columns(): array
    {
        return [
            CreatedAtColumn::make(),
            ImageColumn::make(),
            NameColumn::make()->route('public.member.posts.edit'),
            Column::make('categories_name')
                ->title(trans('plugins/blog::posts.categories'))
                ->width(150)
                ->orderable(false)
                ->searchable(false),
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function getFilters(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'customSelect',
                'choices' => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'category' => [
                'title' => trans('plugins/blog::posts.category'),
                'type' => 'select-search',
                'validate' => 'required|string',
                'callback' => fn () => Category::query()->pluck('name', 'id')->all(),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
                'validate' => 'required|string|date',
            ],
        ];
    }

    public function applyFilterCondition(
        EloquentBuilder|QueryBuilder|EloquentRelation $query,
        string $key,
        string $operator,
        string|null $value
    ): EloquentRelation|EloquentBuilder|QueryBuilder {
        if ($key === 'category' && $value) {
            return $query->whereHas('categories', fn (BaseQueryBuilder $query) => $query->where('categories.id', $value));
        }

        return parent::applyFilterCondition($query, $key, $operator, $value);
    }
}
