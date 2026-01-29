<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AbstractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    public function attributes()
    {
        return [
            'category_id' => "Kategoriya",
            'name' => "Mahsulot nomi",
            'description' => "Tavsifi",
            'price' => "Narxi",
            'stock' => "Ombordagi soni",
            'image' => "Tasviri"
        ];
    }
}
