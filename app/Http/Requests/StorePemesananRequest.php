<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isMeja() ?? false;
    }

    public function rules(): array
    {
        return [
            'id_menu'  => ['required', 'integer', 'exists:menu,id_menu'],
            'porsi'    => ['required', 'integer', 'min:1'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
        ];
    }
}
