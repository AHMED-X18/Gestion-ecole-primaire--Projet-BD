<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si un administrateur est connecté
        if(Auth::guard('admin')->check()) {
            $admin=Auth::guard("admin")->user();
            View::share('admin',$admin);//Partage l'admin avec les autres vues
        }
        
        return $next($request);
    }
}
