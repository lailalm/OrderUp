<?php

namespace App\Http\Controllers;

use App\Models\Pemanggilan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PelayanController extends Controller
{
    public function getPemanggilan(): View
    {
        return view('pelayan.listPanggilanUI', [
            'panggilan' => Pemanggilan::pending()->orderBy('id_pemanggilan')->get(),
        ]);
    }

    public function removePemanggilan(Request $request): RedirectResponse
    {
        $request->validate(['id_pemanggilan' => 'required|integer|exists:pemanggilan,id_pemanggilan']);

        Pemanggilan::findOrFail($request->integer('id_pemanggilan'))->delete();

        return redirect()->route('pelayan.pemanggilan');
    }
}
