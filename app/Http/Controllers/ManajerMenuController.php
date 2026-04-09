<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\UlasanMakanan;
use App\Models\UlasanRestoran;
use App\Services\MenuService;
use App\Services\StatistikService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManajerMenuController extends Controller
{
    public function __construct(
        private readonly MenuService $menuService,
        private readonly StatistikService $statistikService,
    ) {}

    // ─── Menu CRUD ────────────────────────────────────────────────────────────

    public function index(string $kategori = 'utama'): View
    {
        return view('manajer.DaftarMenuUI', [
            'list_menu' => Menu::bySlug($kategori)->get(),
            'kategori'  => $kategori,
            'review'    => UlasanMakanan::all(),
        ]);
    }

    public function dasar(): RedirectResponse
    {
        return redirect()->route('manajer.menu.index', 'utama');
    }

    public function create(bool $promosi = false): View
    {
        return view('manajer.FormMenuUI', compact('promosi'));
    }

    public function createPromosi(): View
    {
        return $this->create(promosi: true);
    }

    public function store(StoreMenuRequest $request): RedirectResponse
    {
        $menu = $this->menuService->create(
            $request->except('foto'),
            $request->file('foto')
        );

        session()->flash('message', "{$menu->name} berhasil ditambahkan.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.menu.index', $menu->categorySlug());
    }

    public function edit(int $id): View
    {
        return view('manajer.EditMenuUI', ['menu' => Menu::findOrFail($id)]);
    }

    public function update(UpdateMenuRequest $request, int $id): RedirectResponse
    {
        $menu = $this->menuService->update(
            Menu::findOrFail($id),
            $request->except('foto'),
            $request->file('foto')
        );

        session()->flash('message', "Berhasil mengubah menu {$menu->name}.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.menu.index', $menu->categorySlug());
    }

    public function destroy(int $id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        $slug = $menu->categorySlug();

        $this->menuService->delete($menu);

        session()->flash('message', "{$menu->name} berhasil dihapus.");
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.menu.index', $slug);
    }

    // ─── Recommendation toggle ────────────────────────────────────────────────

    public function toggleRekomendasi(string $action, int $id): RedirectResponse
    {
        $menu    = Menu::findOrFail($id);
        $aktif   = ($action === 'rekomendasi');
        $this->menuService->toggleRekomendasi($menu, $aktif);

        $pesan = $aktif
            ? "Berhasil menambahkan {$menu->name} sebagai menu rekomendasi."
            : "Berhasil menghapus rekomendasi pada {$menu->name}.";

        session()->flash('message', $pesan);
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('manajer.menu.index', $menu->categorySlug());
    }

    // ─── Reviews & Statistics ─────────────────────────────────────────────────

    public function lihatLayanan(): View
    {
        return view('manajer.UlasanLayananUI', [
            'ulasan' => UlasanRestoran::latest()->get(),
        ]);
    }

    public function ulasanMenuDetail(int $id): View
    {
        $menu = Menu::findOrFail($id);

        return view('manajer.UlasanMenuDetailUI', [
            'menu'       => $menu->name,
            'ulasanmknn' => $menu->ulasanMakanan()->get(),
        ]);
    }

    public function statistikBulanan(string $namaBulan = 'now'): View
    {
        if ($namaBulan === 'now') {
            $namaBulan = now()->format('M Y');
        }

        return view('manajer.StatistikBulananUI', [
            'bulans'    => $this->statistikService->perBulan(),
            'namaBulan' => $namaBulan,
        ]);
    }

    public function statistikMingguan(string $namaMinggu = 'now'): View
    {
        if ($namaMinggu === 'now') {
            $namaMinggu = 'Minggu ' . (now()->weekOfYear - now()->startOfMonth()->weekOfYear + 1);
        }

        return view('manajer.StatistikMingguanUI', [
            'minggus'    => $this->statistikService->perMinggu(),
            'namaMinggu' => $namaMinggu,
        ]);
    }

    public function rangkuman(): View
    {
        return view('manajer.RangkumanStatistikUI', [
            'bulans' => $this->statistikService->rangkuman(),
        ]);
    }
}
