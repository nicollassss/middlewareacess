<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermissao
{
    public function handle(Request $request, Closure $next): Response
    {
        $usuarioTemPermissao = true;

        if (! $usuarioTemPermissao) {
            return redirect()->route('acesso.negado');
        }

        return $next($request);
    }
}
