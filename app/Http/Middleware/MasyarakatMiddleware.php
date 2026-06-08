<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MasyarakatMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $allowedRoles = [
            'admin',
            'petugas',
            'masyarakat'
        ];

        if (!in_array(Auth::user()->role, $allowedRoles)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}