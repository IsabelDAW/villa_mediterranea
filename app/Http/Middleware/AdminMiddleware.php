<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        // Verificamos si existe el usuario Y si su rol es admin eliminando espacios y 
        //convirtiendo el rol a minúsculas
        if ($user && trim(strtolower($user->rol)) === 'admin') {

            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado: no eres administrador.');
    }
}
