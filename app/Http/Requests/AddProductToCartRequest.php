<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductToCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
