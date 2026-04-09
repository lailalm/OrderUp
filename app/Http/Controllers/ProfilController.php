<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Services\KaryawanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Shared profile editing for Manajer, Koki, and Pelayan.
 */
class ProfilController extends Controller
{
    public function __construct(private readonly KaryawanService $karyawanService) {}

    public function edit(): View
    {
        $karyawan = auth()->user();

        $view = match ($karyawan->role) {
            'Manajer' => 'manajer.EditProfilUI',
            'Koki'    => 'koki.EditProfilUI',
            default   => 'pelayan.EditProfilUI',
        };

        return view($view, compact('karyawan'));
    }

    public function update(UpdateProfilRequest $request): RedirectResponse
    {
        $this->karyawanService->updateProfil(
            auth()->user(),
            $request->validated(),
            $request->file('foto')
        );

        session()->flash('message', 'Profil berhasil diubah.');
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('profil.edit');
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        try {
            $this->karyawanService->changePassword(
                auth()->user(),
                $request->input('old_pw'),
                $request->input('new_pw')
            );

            session()->flash('message', 'Kode login berhasil diubah.');
            session()->flash('alert-class', 'alert-success');
        } catch (\InvalidArgumentException $e) {
            session()->flash('message', $e->getMessage());
            session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->route('profil.edit');
    }
}
