<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Session::get('user_id');

        if (empty($user_id)) {
            // La session user_id n'existe pas
            // Redirection vers la page de connexion ou toute autre action appropriée
            return redirect('/');
        }

        // La session user_id existe
        // Vous pouvez continuer à traiter la requête normalement
        return $next($request);
    }
}
