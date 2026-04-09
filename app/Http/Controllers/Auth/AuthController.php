<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // ─── Meja (table) login ───────────────────────────────────────────────────

    public function showMejaLoginForm(): mixed
    {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                'Meja'    => redirect()->route('customer.home'),
                'Manajer' => redirect()->route('manajer.menu.index', 'utama'),
                'Koki'    => redirect()->route('koki.pesanan'),
                'Pelayan' => redirect()->route('pelayan.pemanggilan'),
                default   => redirect()->route('customer.home'),
            };
        }

        return view('auth.login_meja');
    }

    public function mejaLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'kode' => ['required', 'string'],
        ]);

        $kode = $request->input('kode');

        if (Auth::attempt(['email' => $kode, 'password' => $kode])) {
            $request->session()->regenerate();
            return redirect()->route('customer.home');
        }

        return back()->withErrors([
            'kode' => 'Kode meja tidak valid.',
        ]);
    }

    // ─── Staff login ──────────────────────────────────────────────────────────

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return match (Auth::user()->role) {
                'Manajer' => redirect()->route('manajer.menu.index', 'utama'),
                'Koki'    => redirect()->route('koki.pesanan'),
                'Pelayan' => redirect()->route('pelayan.pemanggilan'),
                'Meja'    => redirect()->route('customer.home'),
                default   => redirect('/'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi tidak sesuai.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
