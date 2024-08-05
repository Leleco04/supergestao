<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao): Response
    {
        // Inicia a sessão
        session_start();

        // Se o campo email da sessão estiver preenchido e não estiver vazio
        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            // Passa para a próxima etapa
            return $next($request);
        // Caso contrário, volta para a tela de login com o erro = 2
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
