<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Services\PemesananService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KokiController extends Controller
{
    public function __construct(private readonly PemesananService $pemesananService) {}

    public function index(): View
    {
        $pemesanan = $this->pemesananService->getAllActiveOrders();
        $view      = auth()->user()->isKoki() ? 'koki.DaftarPesananUI' : 'pelayan.DaftarPesananUI';

        return view($view, compact('pemesanan'));
    }

    public function getStatusMenu(string $kategori): View
    {
        return view('koki.StatusMenuUI', [
            'list_menu' => Menu::bySlug($kategori)->get(),
            'kategori'  => $kategori,
        ]);
    }

    public function makeAvailable(int $id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        $menu->update(['status' => true]);

        session()->flash('message', "{$menu->name} menjadi tersedia.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('koki.statusmenu', $menu->categorySlug());
    }

    public function makeUnavailable(int $id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        $menu->update(['status' => false]);

        session()->flash('message', "{$menu->name} menjadi tidak tersedia.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('koki.statusmenu', $menu->categorySlug());
    }

    public function changeStatus(string $status, int $id): RedirectResponse
    {
        $pemesanan = $this->pemesananService->changeStatus($id, $status);
        $namaMenu  = $pemesanan->menu?->name ?? '—';
        $nomorMeja = $pemesanan->meja?->nomormeja ?? '—';

        $label = match ($pemesanan->status) {
            'Queued'     => 'Waiting',
            'On Process' => 'On Process',
            'Done'       => 'Done',
            default      => $pemesanan->status,
        };

        session()->flash('message', "Pesanan {$namaMenu} pada meja {$nomorMeja} di-set \"{$label}\".");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('koki.pesanan');
    }
}
