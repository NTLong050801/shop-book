<?php

namespace Botble\Hotel\Tables;

use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Illuminate\Support\Facades\Auth;
use Botble\Base\Facades\BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Table\Abstracts\TableAbstract;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Botble\Table\DataTables;

class RoomOptionCategoryTable extends TableAbstract
{
    protected $hasActions = true;

    protected $hasFilter = true;

    public function __construct(DataTables $table, UrlGenerator $urlGenerator, RoomOptionCategoryInterface $roomOptionCategoryRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $roomOptionCategoryRepository;

        if (!Auth::user()->hasAnyPermission(['room-option-category.edit', 'room-option-category.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('room_id', function ($item) {
                return $item->room->id ? Html::link(
                    $item->room->url,
                    BaseHelper::clean($item->room->name),
                    ['target' => '_blank']
                ) : '&mdash;';
            })
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('room-option-category.edit')) {
                    return BaseHelper::clean($item->name);
                }
                return Html::link(route('room-option-category.edit', $item->id), BaseHelper::clean($item->name));
            })
            ->editColumn('image', function ($item) {
                return $this->displayThumbnail($item->image);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('order', function ($item) {
                return view('plugins/hotel::partials.sort-order', compact('item'))->render();
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('room-option-category.edit', 'room-option-category.destroy', $item);
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this->repository->getModel()->select([
            'id',
            'room_id',
            'name',
            'images',
            'created_at',
            'order',
            'status',
        ])->with(['room']);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'image' => [
                'title' => trans('core/base::tables.image'),
                'width' => '60px',
                'class' => 'no-sort',
                'orderable' => false,
                'searchable' => false,
            ],
            'room_id' => [
                'title' => trans('plugins/hotel::room-option-category.room'),
                'class' => 'text-start',
                'orderable' => false,
                'searchable' => false,
            ],
            'name' => [
                'title' => trans('core/base::tables.name'),
                'class' => 'text-start',
            ],
            'order' => [
                'title' => trans('core/base::tables.order'),
                'width' => '50px',
                'class' => 'text-center',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('room-option-category.create'), 'room-option-category.create');
    }

    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('room-option-category.deletes'), 'room-option-category.destroy', parent::bulkActions());
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'select',
                'choices' => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'order' => [
                'title' => trans('core/base::tables.order'),
                'type' => 'number',
                'validate' => 'required|min:0',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }

    public function htmlDrawCallbackFunction(): ?string
    {
        return parent::htmlDrawCallbackFunction() . '$(".editable").editable({mode: "inline"});';
    }
}
