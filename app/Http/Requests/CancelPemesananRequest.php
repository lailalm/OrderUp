<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancelPemesananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isMeja() ?? false;
    }

    public function rules(): array
    {
        return [
            'id_pemesanan' => ['required', 'integer', 'exists:pemesanan,id_pemesanan'],
            'countcancel'  => ['required', 'integer', 'min:1'],
        ];
    }
}
