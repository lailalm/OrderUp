<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isManajer() ?? false;
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'regex:/^[A-Za-z0-9\- ]+$/'],
            'email'         => ['required', 'email', 'unique:karyawan,email'],
            'password'      => ['required', 'min:8'],
            'role'          => ['required', 'in:Koki,Pelayan'],
            'telepon'       => ['required', 'numeric'],
            'foto'          => ['required', 'image', 'max:2048'],
            'alamat'        => ['required', 'string'],
            'tanggal_mulai' => ['required', 'date'],
        ];
    }
}
