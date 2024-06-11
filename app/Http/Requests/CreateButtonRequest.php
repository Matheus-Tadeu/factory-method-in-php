<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateButtonRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'label' => 'required|string',
            'platform' => 'required|string|in:windows,ios',
        ];
    }
}
