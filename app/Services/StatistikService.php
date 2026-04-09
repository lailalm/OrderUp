<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Pemesanan;
use Carbon\Carbon;

class StatistikService
{
    /**
     * Aggregate paid orders by calendar month.
     * Returns an array keyed by 'M Y', ordered chronologically.
     *
     * Each value: ['nama', 'tahun', 'tanggal', 'jumlah', 'menu' => [...]]
     */
    public function perBulan(): array
    {
        return $this->aggregateOrders(
            fn(Pemesanan $p) => Carbon::parse($p->waktu)->format('M Y'),
            fn(Carbon $dt) => [
                'nama'    => $dt->format('M'),
                'tahun'   => $dt->format('Y'),
                'tanggal' => $dt->toDateTimeString(),
            ],
            sortAsc: true
        );
    }

    /**
     * Aggregate paid orders for the current calendar month, grouped by week-of-month.
     */
    public function perMinggu(): array
    {
        $currentMonth = Carbon::now()->format('M Y');
        $currentWeekStart = Carbon::now()->startOfMonth()->weekOfYear;

        $filtered = Pemesanan::where('status', Pemesanan::STATUS_PAID)->get()
            ->filter(fn(Pemesanan $p) => Carbon::parse($p->waktu)->format('M Y') === $currentMonth);

        $minggus = [];

        foreach ($filtered as $pemesanan) {
            $dt       = Carbon::parse($pemesanan->waktu);
            $weekNum  = $dt->weekOfYear - $currentWeekStart + 1;
            $weekKey  = "Minggu {$weekNum}";

            if (! isset($minggus[$weekKey])) {
                $minggus[$weekKey] = [
                    'nama'    => $dt->format('M'),
                    'tanggal' => $dt->toDateTimeString(),
                    'jumlah'  => 0,
                    'menu'    => [],
                ];
            }

            $minggus[$weekKey]['jumlah'] += $pemesanan->jumlah;
            $this->addMenuToGroup($minggus[$weekKey], $pemesanan);
        }

        // Sort weeks chronologically, top menus by quantity
        uasort($minggus, fn($a, $b) => $a['tanggal'] <=> $b['tanggal']);
        foreach ($minggus as $key => $nilai) {
            uasort($minggus[$key]['menu'], fn($a, $b) => $b['jumlah'] <=> $a['jumlah']);
        }

        return $minggus;
    }

    /**
     * Aggregate revenue (jumlah × harga) by month, sorted newest-first.
     */
    public function rangkuman(): array
    {
        $bulans = [];

        foreach (Pemesanan::where('status', Pemesanan::STATUS_PAID)->with('menu')->get() as $pemesanan) {
            $key = Carbon::parse($pemesanan->waktu)->format('M Y');

            if (! isset($bulans[$key])) {
                $dt = Carbon::parse($pemesanan->waktu);
                $bulans[$key] = [
                    'nama'    => $dt->format('M'),
                    'tahun'   => $dt->format('Y'),
                    'tanggal' => $dt->toDateTimeString(),
                    'jumlah'  => 0,
                ];
            }

            $harga = $pemesanan->menu?->harga ?? 0;
            $bulans[$key]['jumlah'] += $pemesanan->jumlah * $harga;
        }

        uasort($bulans, fn($a, $b) => $b['tanggal'] <=> $a['tanggal']);

        return $bulans;
    }

    // ─── Private ─────────────────────────────────────────────────────────────

    private function aggregateOrders(callable $keyFn, callable $metaFn, bool $sortAsc = true): array
    {
        $groups = [];

        foreach (Pemesanan::where('status', Pemesanan::STATUS_PAID)->with('menu')->get() as $pemesanan) {
            $dt  = Carbon::parse($pemesanan->waktu);
            $key = $keyFn($pemesanan);

            if (! isset($groups[$key])) {
                $groups[$key] = array_merge($metaFn($dt), ['jumlah' => 0, 'menu' => []]);
            }

            $groups[$key]['jumlah'] += $pemesanan->jumlah;
            $this->addMenuToGroup($groups[$key], $pemesanan);
        }

        uasort($groups, fn($a, $b) => $sortAsc
            ? $a['tanggal'] <=> $b['tanggal']
            : $b['tanggal'] <=> $a['tanggal']
        );

        foreach ($groups as $key => $val) {
            uasort($groups[$key]['menu'], fn($a, $b) => $b['jumlah'] <=> $a['jumlah']);
        }

        return $groups;
    }

    private function addMenuToGroup(array &$group, Pemesanan $pemesanan): void
    {
        $id = $pemesanan->id_menu;

        if (isset($group['menu'][$id])) {
            $group['menu'][$id]['jumlah'] += $pemesanan->jumlah;
        } else {
            $group['menu'][$id] = [
                'id_menu' => $id,
                'nama'    => $pemesanan->menu?->name ?? '—',
                'jumlah'  => $pemesanan->jumlah,
                'image'   => $pemesanan->menu?->photoname ?? '',
            ];
        }
    }
}
