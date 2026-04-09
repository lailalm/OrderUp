<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Models\Meja;
use App\Services\MejaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManajerMejaController extends Controller
{
    public function __construct(private readonly MejaService $mejaService) {}

    public function index(): View
    {
        return view('manajer.DaftarMejaUI', ['daftar_meja' => Meja::all()]);
    }

    public function create(): View
    {
        return view('manajer.FormMejaUI');
    }

    public function store(StoreMejaRequest $request): RedirectResponse
    {
        $meja = $this->mejaService->create($request->validated());

        session()->flash('message', "Berhasil menambahkan {$meja->nomormeja}.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.meja.index');
    }

    public function edit(int $id): View
    {
        return view('manajer.EditMejaUI', ['meja' => Meja::findOrFail($id)]);
    }

    public function update(UpdateMejaRequest $request, int $id): RedirectResponse
    {
        $meja = $this->mejaService->update(Meja::findOrFail($id), $request->validated());

        session()->flash('message', "Berhasil mengubah {$meja->nomormeja}.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.meja.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $meja = Meja::findOrFail($id);
        $nama = $meja->nomormeja;

        $this->mejaService->delete($meja);

        session()->flash('message', "Berhasil menghapus {$nama}.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.meja.index');
    }
}
