<?php

namespace App\Services;

use App\Models\Karyawan;
use App\Models\Meja;

class MejaService
{
    /**
     * Create a new table and its corresponding auth Karyawan record.
     */
    public function create(array $data): Meja
    {
        $meja = Meja::create($data);
        $this->syncAuthKaryawan($meja, $data['kodemasuk']);

        return $meja;
    }

    /**
     * Update a table and keep its auth Karyawan record in sync.
     */
    public function update(Meja $meja, array $data): Meja
    {
        $oldId = $meja->id_meja;
        $meja->fill($data)->save();
        $this->updateAuthKaryawan($oldId, $meja);

        return $meja;
    }

    /**
     * Delete a table and its auth Karyawan record.
     */
    public function delete(Meja $meja): void
    {
        Karyawan::where('name', $meja->id_meja)->where('role', 'Meja')->delete();
        $meja->delete();
    }

    // ─── Private ─────────────────────────────────────────────────────────────

    /**
     * Each table has a Karyawan record (role=Meja) used for authentication.
     * name = id_meja, email = kodemasuk, password = bcrypt(kodemasuk).
     */
    private function syncAuthKaryawan(Meja $meja, string $kodemasuk): void
    {
        Karyawan::create([
            'name'     => $meja->id_meja,
            'email'    => $kodemasuk,
            'password' => bcrypt($kodemasuk),
            'role'     => 'Meja',
        ]);
    }

    private function updateAuthKaryawan(int $oldMejaId, Meja $meja): void
    {
        $karyawan = Karyawan::where('name', $oldMejaId)->where('role', 'Meja')->first();

        if ($karyawan) {
            $karyawan->name     = $meja->id_meja;
            $karyawan->email    = $meja->kodemasuk;
            $karyawan->password = bcrypt($meja->kodemasuk);
            $karyawan->save();
        }
    }
}
