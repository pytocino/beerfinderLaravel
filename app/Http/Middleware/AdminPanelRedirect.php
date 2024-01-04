<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->name === 'admin') {
            return redirect()->route('admin.dashboard'); // Cambia 'admin.panel' por el nombre de tu ruta de panel de administración
        }

        return $next($request);
    }
}
