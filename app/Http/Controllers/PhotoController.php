<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function karyawan(string $photoname): Response
    {
        return $this->serve($photoname);
    }

    public function menu(string $photoname): Response
    {
        return $this->serve($photoname);
    }

    private function serve(string $photoname): Response
    {
        abort_unless(Storage::disk('local')->exists($photoname), 404);

        return response(
            Storage::disk('local')->get($photoname),
            200,
            ['Content-Type' => Storage::disk('local')->mimeType($photoname)]
        );
    }
}
