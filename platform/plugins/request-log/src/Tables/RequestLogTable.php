<?php

namespace Botble\RequestLog\Tables;

use Botble\Base\Facades\Html;
use Botble\RequestLog\Models\RequestLog;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\IdColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;

class RequestLogTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(RequestLog::class)
            ->addActions([
                DeleteAction::make()->route('request-log.destroy'),
            ]);
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('url', function (RequestLog $item) {
                return Html::link($item->url, $item->url, ['target' => '_blank'])->toHtml();
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
                'url',
                'status_code',
                'count',
            ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            Column::make('url')
                ->title(trans('core/base::tables.url'))
                ->alignLeft(),
            Column::make('status_code')
                ->title(trans('plugins/request-log::request-log.status_code')),
            Column::make('count')
                ->title(trans('plugins/request-log::request-log.count')),
        ];
    }

    public function buttons(): array
    {
        return [
            'empty' => [
                'link' => route('request-log.empty'),
                'text' => Html::tag('i', '', ['class' => 'fa fa-trash'])->toHtml() .
                    ' ' . trans('plugins/request-log::request-log.delete_all'),
            ],
        ];
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('request-log.destroy'),
        ];
    }
}
