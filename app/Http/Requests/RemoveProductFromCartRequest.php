<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemoveProductFromCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:products,id'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
