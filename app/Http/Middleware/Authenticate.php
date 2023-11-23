<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    public function handle($request, Closure $next, ...$guards){
        // ShouldPassThrough
        if ($this->shouldPassThrough($request)){
            return $next($request);// Pasa de middelware
        }
        return parent::handle($request,$next, ...$guards);
        }
        //verifica si pasa sin autenticación
        protected function shouldPassThrough($request){
            $allowedRoutes = ['bloqueado', 'login'];
            return in_array($request->route()->getName(),$allowedRoutes);//obtiene el nombre de la ruta
        }
}