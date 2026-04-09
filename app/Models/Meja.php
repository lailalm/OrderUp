<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meja extends Model
{
    protected $table = 'meja';

    protected $primaryKey = 'id_meja';

    public $timestamps = false;

    protected $fillable = [
        'nomormeja',
        'kodemasuk',
        'deskripsi',
    ];

    protected $hidden = ['kodemasuk'];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_meja', 'id_meja');
    }

    public function pemanggilan(): HasMany
    {
        return $this->hasMany(Pemanggilan::class, 'id_meja', 'id_meja');
    }

    public function ulasanMakanan(): HasMany
    {
        return $this->hasMany(UlasanMakanan::class, 'id_meja', 'id_meja');
    }

    public function ulasanRestoran(): HasMany
    {
        return $this->hasMany(UlasanRestoran::class, 'id_meja', 'id_meja');
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────

    /**
     * The Karyawan record that authenticates this table.
     * Tables log in via a Karyawan row with role='Meja' and name=id_meja.
     */
    public function authKaryawan(): ?Karyawan
    {
        return Karyawan::where('name', $this->id_meja)
            ->where('role', 'Meja')
            ->first();
    }
}
