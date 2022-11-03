<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if ($request->user() == null) {
            return redirect('/login')->with('authorization', 'maaf akses ditolak');
        }

        if ($request->user()->type != $type) {
            // return redirect('/login')->with('gagal', 'gagal!');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('gagal', 'Maaf anda tidak memiliki hak akses!');
        }

        return $next($request);
    }
}
