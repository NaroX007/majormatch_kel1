<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('akun')) {
            // Redirect to login page if user is not authenticated
            return redirect('/login')->withErrors(['message' => 'Anda belum login']);
        }

        return $next($request);
    }
}




