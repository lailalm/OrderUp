<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Pemanggilan;
use App\Models\Pemesanan;
use Illuminate\Support\Collection;

class PemesananService
{
    /**
     * Place a new order for the given table.
     */
    public function create(int $idMeja, int $idMenu, int $jumlah, ?string $keterangan = null): Pemesanan
    {
        return Pemesanan::create([
            'id_meja'    => $idMeja,
            'id_menu'    => $idMenu,
            'jumlah'     => $jumlah,
            'keterangan' => $keterangan ?? '',
            'status'     => Pemesanan::STATUS_QUEUED,
        ]);
    }

    /**
     * Reduce or delete an order.
     */
    public function cancel(int $idPemesanan, int $count): void
    {
        $pemesanan = Pemesanan::findOrFail($idPemesanan);

        if ($count >= $pemesanan->jumlah) {
            $pemesanan->delete();
        } else {
            $pemesanan->decrement('jumlah', $count);
        }
    }

    /**
     * Change the kitchen status of a single order.
     */
    public function changeStatus(int $idPemesanan, string $statusSlug): Pemesanan
    {
        $pemesanan = Pemesanan::findOrFail($idPemesanan);

        $pemesanan->status = match ($statusSlug) {
            'waiting' => Pemesanan::STATUS_QUEUED,
            'process' => Pemesanan::STATUS_ON_PROCESS,
            'done'    => Pemesanan::STATUS_DONE,
            default   => throw new \InvalidArgumentException("Unknown status: {$statusSlug}"),
        };

        $pemesanan->save();

        return $pemesanan;
    }

    /**
     * Mark all orders for a table as Paid and log a payment pemanggilan.
     */
    public function processPayment(int $idMeja, string $method, ?int $nominal = null): Collection
    {
        $orders = Pemesanan::active()->forMeja($idMeja)->get();

        $pesan = match ($method) {
            'tunai'  => 'Membayar pemesanan dengan uang tunai ' . ($nominal ?? 0),
            'kredit' => 'Membayar pemesanan dengan kartu kredit',
            'debit'  => 'Membayar pemesanan dengan kartu debit',
            default  => 'Membayar pemesanan',
        };

        Pemanggilan::create([
            'id_meja'            => $idMeja,
            'pesan'              => $pesan,
            'status_pemanggilan' => false,
        ]);

        // Mark every active order for this table as Paid
        Pemesanan::active()->forMeja($idMeja)->update(['status' => Pemesanan::STATUS_PAID]);

        return $orders;
    }

    /**
     * Get active (unpaid) orders for a specific table, with menu loaded.
     */
    public function getActiveOrdersForMeja(int $idMeja): Collection
    {
        return Pemesanan::with('menu')
            ->unpaid()
            ->forMeja($idMeja)
            ->orderBy('id_pemesanan')
            ->get();
    }

    /**
     * Get all unpaid orders across all tables (kitchen view).
     */
    public function getAllActiveOrders(): Collection
    {
        return Pemesanan::with(['menu', 'meja'])
            ->unpaid()
            ->orderBy('id_pemesanan')
            ->get();
    }
}
