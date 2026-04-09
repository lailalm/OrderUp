<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): mixed
    {
        if (Auth::check()) {
            $user = Auth::user();
            return match ($user->role) {
                'Manajer' => redirect()->route('manajer.menu.index', 'utama'),
                'Koki'    => redirect()->route('koki.pesanan'),
                'Pelayan' => redirect()->route('pelayan.pesanan'),
                'Meja'    => redirect()->route('customer.home'),
                default   => redirect('/'),
            };
        }

        return $next($request);
    }
}
