<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isManajer() ?? false;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'name'          => ['required', 'string'],
            'email'         => ['required', 'email', Rule::unique('karyawan', 'email')->ignore($id, 'id_karyawan')],
            'password'      => ['nullable', 'min:8'],
            'role'          => ['required', 'in:Koki,Pelayan'],
            'telepon'       => ['required', 'numeric'],
            'foto'          => ['nullable', 'image', 'max:2048'],
            'alamat'        => ['required', 'string'],
            'tanggal_mulai' => ['required', 'date'],
        ];
    }
}
