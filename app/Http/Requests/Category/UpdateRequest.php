<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Category\AbstractRequest;

class UpdateRequest extends AbstractRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string']
        ];
    }
}
