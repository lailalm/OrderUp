<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemanggilan extends Model
{
    protected $table = 'pemanggilan';

    protected $primaryKey = 'id_pemanggilan';

    public $timestamps = false;

    protected $fillable = [
        'id_meja',
        'pesan',
        'status_pemanggilan',
    ];

    protected $casts = [
        'status_pemanggilan' => 'boolean',
        'timestamp'          => 'datetime',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function meja(): BelongsTo
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }

    // ─── Scopes ──────────────────────────────────────────────────────────────

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status_pemanggilan', false);
    }
}
