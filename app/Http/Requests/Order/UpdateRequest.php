<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:pending,confirmed,delivered,cancelled'],
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $order = $this->route('order');

            if (!$order) {
                return;
            }

            if ($order->status === $this->input('status')) {
                $validator->errors()->add('status', "Buyurtma allaqachon shu holatda.");
            }

            if ($order->status === "delivered") {
                $validator->errors()->add('status', "Yetkazilgan buyurtma holatini o‘zgartirib bo‘lmaydi.");
            }
        });
    }
}