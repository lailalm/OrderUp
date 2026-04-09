<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'old_pw'      => ['required', 'min:8'],
            'new_pw'      => ['required', 'min:8', 'different:old_pw'],
            'new_pw_conf' => ['required', 'same:new_pw'],
        ];
    }

    public function messages(): array
    {
        return [
            'new_pw_conf.same' => 'Konfirmasi kata sandi baru tidak cocok.',
            'new_pw.different' => 'Kata sandi baru harus berbeda dari kata sandi lama.',
        ];
    }
}
