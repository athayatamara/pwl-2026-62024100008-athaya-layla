<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna sudah login
        if (!auth()->check()) {
            abort(401);
        }

        // Periksa apakah role pengguna diizinkan
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke fitur ini.');
        }

        // Jika role sesuai, lanjutkan ke halaman tujuan
        return $next($request);
    }
}
