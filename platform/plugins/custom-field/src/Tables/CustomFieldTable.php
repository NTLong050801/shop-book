<?php

namespace Botble\CustomField\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\CustomField\Models\FieldGroup;
use Botble\CustomField\Tables\Actions\ExportAction;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Validation\Rule;

class CustomFieldTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(FieldGroup::class)
            ->addActions([
                ExportAction::make()
                    ->route('custom-fields.export')
                    ->permission('custom-fields.index'),
                EditAction::make()->route('custom-fields.edit'),
                DeleteAction::make()->route('custom-fields.destroy'),
            ]);

        $this->view = 'plugins/custom-field::list';
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this
            ->getModel()
            ->query()
            ->select([
                'id',
                'title',
                'status',
                'order',
                'created_at',
            ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            NameColumn::make('title')->route('custom-fields.edit'),
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function buttons(): array
    {
        $buttons = $this->addCreateButton(route('custom-fields.create'), 'custom-fields.create');

        $buttons['import-field-group'] = [
            'link' => '#',
            'text' => view('plugins/custom-field::_partials.import')->render(),
        ];

        return $buttons;
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('custom-fields.destroy'),
        ];
    }

    public function getBulkChanges(): array
    {
        return [
            'title' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'customSelect',
                'choices' => BaseStatusEnum::labels(),
                'validate' => 'required|' . Rule::in(BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }
}
