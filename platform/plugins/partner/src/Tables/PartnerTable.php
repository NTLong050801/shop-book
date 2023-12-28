<?php

namespace Botble\Partner\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\Html;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Partner\Models\Partner;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class PartnerTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Partner::class)
            ->addActions([
                EditAction::make()
                    ->route('partner.edit'),
                DeleteAction::make()
                    ->route('partner.destroy'),
            ]);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function (Partner $item) {
                if (! $this->hasPermission('partner.edit')) {
                    return BaseHelper::clean($item->name);
                }
                return Html::link(route('partner.edit', $item->getKey()), BaseHelper::clean($item->name));
            })
            ->editColumn('partner_category_id', function ($item) {
                return $item->partnerCategory->id ? \Collective\Html\HtmlFacade::link(
                    route('partner-category.edit',$item->partnerCategory->id),
                    BaseHelper::clean($item->partnerCategory->name),
                    ['target' => '_blank']
                ) : '&mdash;';
            })
            ->editColumn('logo', function ($item) {
                return $this->displayThumbnail($item->logo);
            });


        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this
            ->getModel()
            ->query()
            ->select([
               'id',
               'partner_category_id',
               'name',
               'logo',
               'order',
               'created_at',
               'status',
           ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            'partner_category_id' => [
                'title' => trans('plugins/partner::partner.partner_category_id'),
                'class' => 'text-start col-2',
                'width' => '100px',
            ],
            NameColumn::make(),
            'logo' => [
                'title' => trans('plugins/partner::partner.logo'),
                'width' => '60px',
                'class' => 'no-sort col-2',
                'orderable' => false,
                'searchable' => false,
            ],
            'order' => [
                'title' => trans('core/base::tables.order'),
                'width' => '50px',
                'class' => 'text-center',
            ],
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('partner.create'), 'partner.create');
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('partner.destroy'),
        ];
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
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'date',
            ],
        ];
    }

    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
