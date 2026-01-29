<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Product\AbstractRequest;

class UpdateRequest extends AbstractRequest
{

    public function rules(): array
    {
        return [
            'category_id' => ['sometimes', 'integer', 'exists:categories,id'],
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'price' => ['sometimes', 'integer'],
            'stock' => ['sometimes', 'integer'],
            'image' => ['sometimes', 'image', 'max:5120'],
        ];
    }
}
