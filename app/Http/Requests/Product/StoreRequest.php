<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\Product\AbstractRequest;

class StoreRequest extends AbstractRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'image' => ['required', 'image', 'max:5120'],
        ];
    }
}
