<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch(Auth::user()->roles) {
            case 'superadmin':
                return $next($request);
            case 'admin':
                return $next($request);
            case 'user':
                if ($request->is('utilisateurs/*')) {
                    return redirect()->route('Utilisateurs');
                }
        }
        //return dd($request->path());
        return redirect()->route('Accueil');
    }
}
