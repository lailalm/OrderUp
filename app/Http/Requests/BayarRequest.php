<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BayarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isMeja() ?? false;
    }

    public function rules(): array
    {
        return [
            'nominal' => ['required', 'integer', 'min:1'],
        ];
    }
}
