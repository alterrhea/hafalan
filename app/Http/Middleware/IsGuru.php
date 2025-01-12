<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGuru
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika pengguna yang sedang login adalah guru
        if (Auth::user() && Auth::user()->role === 'guru') {
            return $next($request);
        }

        // Jika bukan guru, redirect ke halaman lain
        return redirect('/');
    }
}

