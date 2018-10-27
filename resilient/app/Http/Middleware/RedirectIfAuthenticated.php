<?php

namespace App\Http\Middleware;

use const App\Http\Controllers\Auth\REGISTRO_SIN_DATOS_ACUDIENTE;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    const REGISTRO_SIN_DATOS_ACUDIENTE = 1;
    const REGISTRO_COMPLETO = 2;
    const REGISTRO_NINO_COMPLETO = 3;
    const EN_PRETEST = 4;
    const EN_DESARROLLO_ACTIVIDADES = 5;
    const EN_POSTEST = 6;
    const ACTIVO_SIN_REQUERIMIENTOS =7;
    const INACTIVO = 8;


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        return $next($request);
    }
}
