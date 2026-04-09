<?php

namespace App\Http\Controllers;

use App\Http\Requests\BayarRequest;
use App\Http\Requests\CancelPemesananRequest;
use App\Http\Requests\StorePemesananRequest;
use App\Models\Menu;
use App\Models\Pemanggilan;
use App\Models\UlasanMakanan;
use App\Models\UlasanRestoran;
use App\Services\PemesananService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function __construct(private readonly PemesananService $pemesananService) {}

    // ─── Home & Menu browsing ─────────────────────────────────────────────────

    public function index(): View
    {
        return view('pelanggan.menu', [
            'menu_promosi' => Menu::where('is_promosi', 1)->get(),
        ]);
    }

    public function indexByCat(string $kategori): View
    {
        return view('pelanggan.menu_utama', [
            'list_menu' => Menu::bySlug($kategori)->get(),
            'kategori'  => $kategori,
            'review'    => UlasanMakanan::all(),
        ]);
    }

    public function showTutorial(): View
    {
        return view('pelanggan.caraPenggunaanUI');
    }

    public function ulasanMenu(int $id): View
    {
        $menu = Menu::findOrFail($id);

        return view('pelanggan.detailUlasanUI', [
            'menu'       => $menu->name,
            'ulasanmknn' => $menu->ulasanMakanan()->get(),
        ]);
    }

    // ─── Orders ───────────────────────────────────────────────────────────────

    public function addPemesanan(StorePemesananRequest $request): RedirectResponse
    {
        $idMeja = (int) Auth::user()->name;

        $this->pemesananService->create(
            $idMeja,
            $request->integer('id_menu'),
            $request->integer('porsi'),
            $request->input('deskripsi')
        );

        session()->flash('message', 'Berhasil menambahkan pesanan.');
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('menu.kategori', $request->input('kategori', 'utama'));
    }

    public function getMyPesanan(): View
    {
        $idMeja = (int) Auth::user()->name;

        return view('pelanggan.listPesananUI', [
            'list_pesanan' => $this->pemesananService->getActiveOrdersForMeja($idMeja),
        ]);
    }

    public function cancelPemesanan(CancelPemesananRequest $request): RedirectResponse
    {
        $this->pemesananService->cancel(
            $request->integer('id_pemesanan'),
            $request->integer('countcancel')
        );

        session()->flash('message', 'Berhasil membatalkan pesanan.');
        session()->flash('alert-class', 'alert-success');

        return redirect()->route('customer.pesanan');
    }

    // ─── Payment ──────────────────────────────────────────────────────────────

    public function getMyPayment(): View
    {
        $idMeja = (int) Auth::user()->name;

        return view('pelanggan.pembayaranUI', [
            'list_pesanan' => $this->pemesananService->getActiveOrdersForMeja($idMeja),
        ]);
    }

    public function bayar(BayarRequest $request): View
    {
        return $this->processPayment('tunai', $request->integer('nominal'));
    }

    public function kredit(): View
    {
        return $this->processPayment('kredit');
    }

    public function debit(): View
    {
        return $this->processPayment('debit');
    }

    // ─── Customer calls ───────────────────────────────────────────────────────

    public function addPemanggilan(Request $request): RedirectResponse
    {
        $request->validate(['deskripsi' => 'nullable|string|max:500']);

        Pemanggilan::create([
            'id_meja'            => (int) Auth::user()->name,
            'pesan'              => $request->input('deskripsi', ''),
            'status_pemanggilan' => false,
        ]);

        return redirect()->route('customer.home');
    }

    // ─── Reviews ─────────────────────────────────────────────────────────────

    public function saveUlasan(Request $request): RedirectResponse
    {
        $idMeja  = (int) Auth::user()->name;
        $tanggal = now()->toDateString();

        if ($request->filled('nilailayanan')) {
            UlasanRestoran::create([
                'id_meja' => $idMeja,
                'tanggal' => $tanggal,
                'review'  => $request->input('deskripsiRestoran', ''),
                'nilai'   => $request->integer('nilailayanan'),
            ]);
        }

        $total = $request->integer('total', 0);
        for ($i = 1; $i <= $total; $i++) {
            if ($request->filled("nilaimenu{$i}")) {
                UlasanMakanan::create([
                    'id_meja'  => $idMeja,
                    'tanggal'  => $tanggal,
                    'id_menu'  => $request->integer("id{$i}"),
                    'komentar' => $request->input("deskripsi{$i}", ''),
                    'nilai'    => $request->integer("nilaimenu{$i}"),
                ]);
            }
        }

        return redirect()->route('customer.logout');
    }

    // ─── Logout ───────────────────────────────────────────────────────────────

    public function logout(): View
    {
        Auth::logout();
        return view('pelanggan.logoutUI');
    }

    // ─── Private ─────────────────────────────────────────────────────────────

    private function processPayment(string $method, ?int $nominal = null): View
    {
        $idMeja = (int) Auth::user()->name;
        $orders = $this->pemesananService->processPayment($idMeja, $method, $nominal);

        $idName = $orders->pluck('menu.name', 'id_menu')->toArray();

        return view('pelanggan.AddUlasanUI', [
            'list_pesanan' => $orders,
            'id_name'      => $idName,
        ]);
    }
}
