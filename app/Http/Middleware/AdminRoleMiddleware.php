<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->hasRole('admin')) {
            // Si el usuario es administrador, permite el acceso
            return $next($request);
        } elseif ($request->user()->hasRole('customer')) {
            // Si el usuario tiene el rol de customer, redirige a la ruta de dashboard del cliente
            return redirect()->route('user_area.index');
        } else {
            // Si el usuario no tiene ningun rol, redirige a la ruta de login
            return redirect()->route('login');
        }
    }
}