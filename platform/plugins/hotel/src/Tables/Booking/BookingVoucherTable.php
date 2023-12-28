<?php

namespace Botble\Hotel\Tables\Booking;

use Botble\Hotel\Tables\BookingTable;
use Botble\Base\Facades\BaseHelper;
use Illuminate\Http\JsonResponse;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Facades\DB;

class BookingVoucherTable extends BookingTable
{
    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query()->where('type', 'voucher'))
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
            ->editColumn('hotel', function ($item) {
                return $item->voucher->voucher->room->id ? Html::link(
                    $item->voucher->voucher->room->url,
                    BaseHelper::clean($item->voucher->voucher->room->name),
                    ['target' => '_blank']
                ) : '&mdash;';
            })
            ->editColumn('voucher', function ($item) {
                return $item->voucher->voucher->id ? BaseHelper::clean($item->voucher->voucher->name) : '&mdash;';
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
            'hotel' => [
                'title' => trans('plugins/hotel::booking.hotel'),
                'class' => 'text-start',
                'orderable' => false,
                'searchable' => false,
            ],
            'voucher' => [
                'title' => trans('plugins/hotel::booking.voucher'),
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
}
