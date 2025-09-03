<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk memastikan hanya admin yang dapat mengakses route tertentu.
 * Komentar ini dibuat secara otomatis oleh AI.
 */
class EnsureAdmin
{
    /**
     * Handle an incoming request.
     * Komentar ini dibuat oleh AI.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin()) {
            abort(403);
        }
        return $next($request);
    }
}
