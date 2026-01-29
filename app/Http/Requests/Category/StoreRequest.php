<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Category\AbstractRequest;

class StoreRequest extends AbstractRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
