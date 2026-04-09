<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isManajer() ?? false;
    }

    public function rules(): array
    {
        return [
            'name'                => ['required', 'string', 'max:40'],
            'harga'               => ['required', 'integer', 'min:1'],
            'kategori'            => ['required', 'in:Menu Pembuka,Menu Utama,Menu Sampingan,Menu Penutup,Menu Minuman'],
            'deskripsi'           => ['required', 'string'],
            'is_rekomendasi'      => ['required', 'boolean'],
            'end_date_rekomendasi' => ['nullable', 'date'],
            'is_promosi'          => ['required', 'boolean'],
            'end_date_promosi'    => ['nullable', 'date'],
            'diskon'              => ['nullable', 'integer', 'min:0', 'max:100'],
            'durasi_penyelesaian' => ['nullable', 'integer', 'min:1'],
            'status'              => ['required', 'boolean'],
            'foto'                => ['nullable', 'image', 'max:2048'],
        ];
    }
}
