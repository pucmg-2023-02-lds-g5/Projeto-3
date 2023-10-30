<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShareUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('professor')->check()) {
        $user = Auth::guard('professor')->user();
        view()->share('professor', $user);
    } elseif (Auth::guard('aluno')->check()) {
        $user = Auth::guard('aluno')->user();
        view()->share('aluno', $user);
    } elseif (Auth::guard('empresa')->check()) {
        $user = Auth::guard('empresa')->user();
        view()->share('empresa', $user);
    }

    return $next($request);
}

}
