<?php

namespace Botble\Hotel\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class RoomOptionCategoryRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
