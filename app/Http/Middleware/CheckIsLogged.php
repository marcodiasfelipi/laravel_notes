<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //CHECAR SE O USUÁRIO ESTÁ LOGADO ANTES DE CADA PASSO DENTRO DA APLICAÇÃO
        if(!session('user')){
            return redirect(('/login'));
        }
        return $next($request);
    }
}
