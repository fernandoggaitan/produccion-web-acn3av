<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //Recuperamos el idioma que guardó el usuario en la sesión.
        $locale = $request->session()->get('lang', 'es');
        //Seteamos el idioma.
        App::setLocale($locale);

        return $next($request);

    }
}
