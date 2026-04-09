<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UlasanMakanan extends Model
{
    protected $table = 'review_makanan';

    protected $primaryKey = 'id_review';

    public $timestamps = false;

    protected $fillable = [
        'id_meja',
        'id_menu',
        'tanggal',
        'nilai',
        'komentar',
    ];

    protected $casts = [
        'nilai'   => 'integer',
        'tanggal' => 'date',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function meja(): BelongsTo
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }
}
