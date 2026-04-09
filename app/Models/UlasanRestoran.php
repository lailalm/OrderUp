<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UlasanRestoran extends Model
{
    protected $table = 'review_restoran';

    protected $primaryKey = 'id_review';

    public $timestamps = true; // this table has created_at / updated_at

    protected $fillable = [
        'id_meja',
        'nama',
        'tanggal',
        'review',
        'nilai',
    ];

    protected $casts = [
        'nilai'   => 'integer',
        'tanggal' => 'date',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function meja(): BelongsTo
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }

    // ─── Scopes ──────────────────────────────────────────────────────────────

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('tanggal', 'desc');
    }
}
