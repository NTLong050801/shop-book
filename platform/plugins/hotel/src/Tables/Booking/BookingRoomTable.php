<?php

namespace Botble\Hotel\Tables\Booking;

use Botble\Hotel\Tables\BookingTable;
use Botble\Base\Facades\BaseHelper;
use Illuminate\Http\JsonResponse;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Facades\DB;

class BookingRoomTable extends BookingTable
{
    public function columns(): array
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'customer_id' => [
                'title' => trans('plugins/hotel::booking.customer'),
                'class' => 'text-start',
                'orderable' => false,
                'searchable' => false,
            ],
            'room_id' => [
                'title' => trans('plugins/hotel::booking.hotel'),
                'class' => 'text-start',
                'orderable' => false,
                'searchable' => false,
            ],
            'room_option_category_id' => [
                'title' => trans('plugins/hotel::booking.room'),
                'class' => 'text-start',
                'orderable' => false,
                'searchable' => false,
            ],
            'amount' => [
                'title' => trans('plugins/hotel::booking.amount'),
                'class' => 'text-start',
            ],
            'payment_method' => [
                'name' => 'payment_id',
                'title' => trans('plugins/hotel::booking.payment_method'),
                'class' => 'text-center',
                'orderable' => false,
                'searchable' => false,
            ],
            'payment_status' => [
                'name' => 'payment_id',
                'title' => trans('plugins/hotel::booking.payment_status_label'),
                'class' => 'text-center',
                'orderable' => false,
                'searchable' => false,
            ],
            'updated_at' => [
                'title' => trans('plugins/hotel::booking.booking_period'),
                'class' => 'text-start',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
                'class' => 'text-start',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
                'class' => 'text-start',
            ],
        ];
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query()->where('type', 'room'))
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('amount', function ($item) {
                return format_price($item->amount, $item->currency_id);
            })
            ->editColumn('payment_status', function ($item) {
                return $item->payment->status->label() ? BaseHelper::clean($item->payment->status->toHtml()) : '&mdash;';
            })
            ->editColumn('payment_method', function ($item) {
                return BaseHelper::clean($item->payment->payment_channel->label() ?: '&mdash;');
            })
            ->editColumn('customer_id', function ($item) {
                return $item->address->id ? BaseHelper::clean($item->address->first_name . ' ' . $item->address->last_name) : '&mdash;';
            })
            ->editColumn('room_id', function ($item) {
                return $item->room->room->room->id ? Html::link(
                    $item->room->room->room->url,
                    BaseHelper::clean($item->room->room->room->name),
                    ['target' => '_blank']
                ) : '&mdash;';
            })
            ->editColumn('room_option_category_id', function ($item) {
                return $item->room->roomOptionCategory->id ? BaseHelper::clean($item->room->roomOptionCategory->name) : '&mdash;';
            })
            ->editColumn('updated_at', function ($item) {
                return BaseHelper::formatDate($item->room->start_date) . ' -> ' . BaseHelper::formatDate($item->room->end_date);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('booking.edit', 'booking.destroy', $item);
            })
            ->filter(function ($query) {
                $keyword = $this->request->input('search.value');
                if ($keyword) {
                    return $query->whereHas('address', function ($subQuery) use ($keyword) {
                        return $subQuery
                            ->where('ht_booking_addresses.first_name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('ht_booking_addresses.last_name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere(DB::raw('CONCAT(ht_booking_addresses.first_name, " ", ht_booking_addresses.last_name)'), 'LIKE', '%' . $keyword . '%')
                            ->orWhere(DB::raw('CONCAT(ht_booking_addresses.last_name, " ", ht_booking_addresses.first_name)'), 'LIKE', '%' . $keyword . '%');
                    });
                }

                return $query;
            });

        return $this->toJson($data);
    }
}
