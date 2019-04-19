<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
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
        if(\Auth::user()->rol != 'admin') {
            return redirect()->back()
                ->with(['mensaje' => 'Sin permiso']);
        }

        return $next($request);
    }
}
