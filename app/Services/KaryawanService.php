<?php

namespace App\Services;

use App\Models\Karyawan;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class KaryawanService
{
    /**
     * Create a new employee, upload photo, and send welcome email.
     */
    public function create(array $data, UploadedFile $photo): Karyawan
    {
        $karyawan = new Karyawan($data);
        $karyawan->password = bcrypt($data['password']);
        $this->storePhoto($karyawan, $photo);
        $karyawan->save();

        $this->sendWelcomeEmail($karyawan, $data['password']);

        return $karyawan;
    }

    /**
     * Update an existing employee, optionally replacing photo or password.
     */
    public function update(Karyawan $karyawan, array $data, ?UploadedFile $photo = null): Karyawan
    {
        $karyawan->fill($data);

        if (! empty($data['password'])) {
            $karyawan->password = bcrypt($data['password']);
        }

        if ($photo) {
            $this->storePhoto($karyawan, $photo);
        }

        $karyawan->save();

        return $karyawan;
    }

    /**
     * Update own profile (non-password fields).
     */
    public function updateProfil(Karyawan $karyawan, array $data, ?UploadedFile $photo = null): Karyawan
    {
        $karyawan->name    = $data['name'];
        $karyawan->email   = $data['email'];
        $karyawan->telepon = $data['telepon'];
        $karyawan->alamat  = $data['alamat'];

        if ($photo) {
            $this->storePhoto($karyawan, $photo);
        }

        $karyawan->save();

        return $karyawan;
    }

    /**
     * Change password after verifying the current one.
     *
     * @throws \InvalidArgumentException when old password is wrong.
     */
    public function changePassword(Karyawan $karyawan, string $oldPassword, string $newPassword): void
    {
        if (! \Hash::check($oldPassword, $karyawan->password)) {
            throw new \InvalidArgumentException('Kata sandi lama tidak sesuai.');
        }

        $karyawan->password = bcrypt($newPassword);
        $karyawan->save();
    }

    /**
     * Delete an employee.
     */
    public function delete(Karyawan $karyawan): void
    {
        $karyawan->delete();
    }

    // ─── Private ─────────────────────────────────────────────────────────────

    private function storePhoto(Karyawan $karyawan, UploadedFile $photo): void
    {
        $filename = $photo->hashName();
        Storage::disk('local')->putFileAs('', $photo, $filename);

        $karyawan->mime              = $photo->getClientMimeType();
        $karyawan->original_photoname = $photo->getClientOriginalName();
        $karyawan->photoname          = $filename;
    }

    private function sendWelcomeEmail(Karyawan $karyawan, string $plainPassword): void
    {
        try {
            Mail::send(
                'emails.password',
                ['newPassword' => $plainPassword, 'name' => $karyawan->name, 'role' => $karyawan->role],
                function ($message) use ($karyawan) {
                    $message->to($karyawan->email, $karyawan->name)->subject('Selamat datang di Order Up!');
                }
            );
        } catch (\Exception $e) {
            // Non-fatal — log and continue; the user was already created.
            \Log::warning('Welcome email failed for ' . $karyawan->email . ': ' . $e->getMessage());
        }
    }
}
