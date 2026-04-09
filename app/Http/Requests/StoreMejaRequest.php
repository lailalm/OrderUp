<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMejaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isManajer() ?? false;
    }

    public function rules(): array
    {
        return [
            'nomormeja' => ['required', 'string', 'max:5'],
            'kodemasuk' => ['required', 'string', 'max:5'],
            'deskripsi' => ['required', 'string'],
        ];
    }
}
