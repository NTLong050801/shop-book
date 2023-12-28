<?php

namespace Botble\Hotel\Http\Requests;

use Botble\Support\Http\Requests\Request;

class InitBookingRequest extends Request
{
    public function rules(): array
    {
        return [
            'type' => 'required',
            'room_id' => 'required',
            'date' => 'required',
            'adults' => 'required|min:1',
        ];
    }
}
