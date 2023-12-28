<?php

namespace Botble\Hotel\Http\Controllers;

use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Hotel\Forms\BookingForm;
use Botble\Hotel\Http\Requests\UpdateBookingRequest;
use Botble\Hotel\Repositories\Interfaces\BookingInterface;
use Botble\Hotel\Tables\Booking\BookingTourTable;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Facades\PageTitle;

class BookingTourController extends BaseController
{
    public function __construct(protected BookingInterface $bookingRepository)
    {
    }

    public function index(BookingTourTable $table)
    {
        PageTitle::setTitle(trans('plugins/hotel::booking.name') . ' ' . trans('plugins/hotel::booking.tour'));

        return $table->renderTable();
    }

    public function edit(int|string $id, FormBuilder $formBuilder)
    {
        $booking = $this->bookingRepository->findOrFail($id);

        PageTitle::setTitle(trans('plugins/hotel::booking.edit') . ' "' . $booking->tour->tour->name . '"');

        return $formBuilder->create(BookingForm::class, ['model' => $booking])->renderForm();
    }

    public function update(int|string $id, UpdateBookingRequest $request, BaseHttpResponse $response)
    {
        $booking = $this->bookingRepository->findOrFail($id);

        $booking->fill($request->input());

        $this->bookingRepository->createOrUpdate($booking);

        event(new UpdatedContentEvent(BOOKING_MODULE_SCREEN_NAME, $request, $booking));

        return $response
            ->setPreviousUrl(route('booking.tour.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $booking = $this->bookingRepository->findOrFail($id);

            $this->bookingRepository->delete($booking);

            event(new DeletedContentEvent(BOOKING_MODULE_SCREEN_NAME, $request, $booking));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $booking = $this->bookingRepository->findOrFail($id);
            $this->bookingRepository->delete($booking);
            event(new DeletedContentEvent(BOOKING_MODULE_SCREEN_NAME, $request, $booking));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
