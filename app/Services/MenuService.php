<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    /**
     * Store a new menu item including its photo.
     */
    public function create(array $data, UploadedFile $photo): Menu
    {
        $menu = new Menu($data);
        $this->storePhoto($menu, $photo);
        $menu->save();

        return $menu;
    }

    /**
     * Update an existing menu item, optionally replacing its photo.
     */
    public function update(Menu $menu, array $data, ?UploadedFile $photo = null): Menu
    {
        $menu->fill($data);

        if ($photo) {
            $this->storePhoto($menu, $photo);
        }

        $menu->save();

        return $menu;
    }

    /**
     * Delete a menu item (does not remove the uploaded photo file).
     */
    public function delete(Menu $menu): void
    {
        $menu->delete();
    }

    /**
     * Toggle the recommendation flag on a menu item.
     */
    public function toggleRekomendasi(Menu $menu, bool $value): Menu
    {
        $menu->is_rekomendasi = $value;
        $menu->save();

        return $menu;
    }

    /**
     * Set menu availability status.
     */
    public function setStatus(Menu $menu, bool $available): Menu
    {
        $menu->status = $available;
        $menu->save();

        return $menu;
    }

    // ─── Private ─────────────────────────────────────────────────────────────

    private function storePhoto(Menu $menu, UploadedFile $photo): void
    {
        $filename = $photo->hashName();

        Storage::disk('local')->putFileAs('', $photo, $filename);

        $menu->mime              = $photo->getClientMimeType();
        $menu->original_photoname = $photo->getClientOriginalName();
        $menu->photoname          = $filename;
    }
}
