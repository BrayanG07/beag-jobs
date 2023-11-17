<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Tenemos acceso a user en el request, porque antes de que se ejecute este middleware se ejecuta el middleware de AUTH
        if($request->user()->rol !== 2){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
