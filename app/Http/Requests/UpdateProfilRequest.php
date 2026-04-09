<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfilRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $id = $this->user()->id_karyawan;

        return [
            'name'    => ['required', 'string'],
            'email'   => ['required', 'email', Rule::unique('karyawan', 'email')->ignore($id, 'id_karyawan')],
            'telepon' => ['required', 'numeric'],
            'alamat'  => ['required', 'string'],
            'foto'    => ['nullable', 'image', 'max:2048'],
        ];
    }
}
