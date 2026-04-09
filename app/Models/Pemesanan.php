<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    public $timestamps = false;

    protected $fillable = [
        'id_meja',
        'id_menu',
        'jumlah',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'waktu'  => 'datetime',
    ];

    // ─── Status constants ─────────────────────────────────────────────────────

    const STATUS_QUEUED     = 'Queued';
    const STATUS_ON_PROCESS = 'On Process';
    const STATUS_DONE       = 'Done';
    const STATUS_PAID       = 'Paid';

    // ─── Relationships ────────────────────────────────────────────────────────

    public function meja(): BelongsTo
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    // ─── Scopes ──────────────────────────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->whereIn('status', [
            self::STATUS_QUEUED,
            self::STATUS_ON_PROCESS,
            self::STATUS_DONE,
        ]);
    }

    public function scopeUnpaid(Builder $query): Builder
    {
        return $query->where('status', '!=', self::STATUS_PAID);
    }

    public function scopeForMeja(Builder $query, int $idMeja): Builder
    {
        return $query->where('id_meja', $idMeja);
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────

    public function subtotal(): int
    {
        return $this->jumlah * ($this->menu?->harga ?? 0);
    }
}
