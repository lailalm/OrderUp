<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Models\Karyawan;
use App\Services\KaryawanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManajerKaryawanController extends Controller
{
    public function __construct(private readonly KaryawanService $karyawanService) {}

    public function index(): RedirectResponse
    {
        return redirect()->route('manajer.karyawan.byRole', 'koki');
    }

    public function indexByRole(string $role): View
    {
        return view('manajer.DaftarKaryawanUI', [
            'daftar_karyawan' => Karyawan::byRole($role)->get(),
            'role'            => $role,
        ]);
    }

    public function createKoki(): View
    {
        return view('manajer.FormKaryawanUI', ['role' => 'Koki']);
    }

    public function createPelayan(): View
    {
        return view('manajer.FormKaryawanUI', ['role' => 'Pelayan']);
    }

    public function store(StoreKaryawanRequest $request): RedirectResponse
    {
        $karyawan = $this->karyawanService->create(
            $request->except('foto'),
            $request->file('foto')
        );

        session()->flash('message', "{$karyawan->name} berhasil ditambahkan.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.karyawan.byRole', strtolower($karyawan->role));
    }

    public function edit(int $id): View
    {
        return view('manajer.EditKaryawanUI', ['karyawan' => Karyawan::findOrFail($id)]);
    }

    public function update(UpdateKaryawanRequest $request, int $id): RedirectResponse
    {
        $karyawan = $this->karyawanService->update(
            Karyawan::findOrFail($id),
            $request->except('foto'),
            $request->file('foto')
        );

        session()->flash('message', "{$karyawan->name} berhasil diubah.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.karyawan.byRole', strtolower($karyawan->role));
    }

    public function destroy(int $id): RedirectResponse
    {
        $karyawan = Karyawan::findOrFail($id);
        $role     = strtolower($karyawan->role);
        $name     = $karyawan->name;

        $this->karyawanService->delete($karyawan);

        session()->flash('message', "Berhasil menghapus {$name}.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.karyawan.byRole', $role);
    }
}
