<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Checks that the authenticated user carries one of the allowed roles.
 *
 * Usage in routes:
 *   Route::middleware('role:Manajer')->group(…)
 *   Route::middleware('role:Koki,Manajer')->group(…)
 */
class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, $roles)) {
            return $this->redirectForUser($user);
        }

        return $next($request);
    }

    private function redirectForUser(mixed $user): \Illuminate\Http\RedirectResponse
    {
        if (! $user) {
            return redirect()->route('login');
        }

        return match ($user->role) {
            'Manajer' => redirect()->route('manajer.menu.index', 'utama'),
            'Koki'    => redirect()->route('koki.pesanan'),
            'Pelayan' => redirect()->route('pelayan.pesanan'),
            'Meja'    => redirect()->route('customer.home'),
            default   => redirect()->route('login'),
        };
    }
}
