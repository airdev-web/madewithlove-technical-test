<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuantityFromCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id',
            'quantity' => 'required|min:1'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
