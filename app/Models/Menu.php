<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'id_menu';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'harga',
        'kategori',
        'photoname',
        'mime',
        'original_photoname',
        'is_rekomendasi',
        'end_date_rekomendasi',
        'is_promosi',
        'end_date_promosi',
        'diskon',
        'durasi_penyelesaian',
        'status',
        'deskripsi',
    ];

    protected $casts = [
        'harga'              => 'integer',
        'is_rekomendasi'     => 'boolean',
        'is_promosi'         => 'boolean',
        'status'             => 'boolean',
        'diskon'             => 'integer',
        'durasi_penyelesaian' => 'integer',
        'end_date_rekomendasi' => 'date',
        'end_date_promosi'   => 'date',
    ];

    // ─── Category slug map ───────────────────────────────────────────────────

    const CATEGORY_MAP = [
        'utama'     => 'Menu Utama',
        'pembuka'   => 'Menu Pembuka',
        'sampingan' => 'Menu Sampingan',
        'penutup'   => 'Menu Penutup',
        'minuman'   => 'Menu Minuman',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_menu', 'id_menu');
    }

    public function ulasanMakanan(): HasMany
    {
        return $this->hasMany(UlasanMakanan::class, 'id_menu', 'id_menu');
    }

    // ─── Scopes ──────────────────────────────────────────────────────────────

    /**
     * Filter by URL slug (utama, pembuka, rekomendasi, promosi, …).
     */
    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return match ($slug) {
            'rekomendasi' => $query->where('is_rekomendasi', 1),
            'promosi'     => $query->where('is_promosi', 1),
            default       => $query->where('kategori', self::CATEGORY_MAP[$slug] ?? 'Menu Utama'),
        };
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────

    /**
     * Returns the URL slug for this menu's category.
     */
    public function categorySlug(): string
    {
        $map = array_flip(self::CATEGORY_MAP);
        return $map[$this->kategori] ?? 'utama';
    }

    /**
     * Harga after applying discount.
     */
    public function hargaSetelahDiskon(): int
    {
        if ($this->is_promosi && $this->diskon > 0) {
            return (int) ($this->harga * (1 - $this->diskon / 100));
        }
        return $this->harga;
    }
}
