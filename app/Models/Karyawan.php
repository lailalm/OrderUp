<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Karyawan extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    protected $table = 'karyawan';

    protected $primaryKey = 'id_karyawan';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telepon',
        'photoname',
        'mime',
        'original_photoname',
        'alamat',
        'tanggal_mulai',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'tanggal_mulai' => 'date',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function pelayanan(): HasMany
    {
        return $this->hasMany(Pelayanan::class, 'id_karyawan', 'id_karyawan');
    }

    // ─── Scopes ──────────────────────────────────────────────────────────────

    public function scopeByRole($query, string $role)
    {
        return $query->where('role', $role);
    }

    public function scopeStaff($query)
    {
        return $query->whereIn('role', ['Manajer', 'Koki', 'Pelayan']);
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────

    public function isManajer(): bool
    {
        return $this->role === 'Manajer';
    }

    public function isKoki(): bool
    {
        return $this->role === 'Koki';
    }

    public function isPelayan(): bool
    {
        return $this->role === 'Pelayan';
    }

    public function isMeja(): bool
    {
        return $this->role === 'Meja';
    }

    public function hasRole(string ...$roles): bool
    {
        return in_array($this->role, $roles);
    }
}
