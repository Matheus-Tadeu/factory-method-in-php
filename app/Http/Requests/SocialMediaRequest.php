<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'platform' => 'required|string|in:facebook,linkedin',
        ];
    }

    public function validationData(): array
    {
        return array_merge($this->request->all(), [
            'platform' => $this->route('platform'),
        ]);
    }
}
