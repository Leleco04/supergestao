<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        // Declara a variável erro
        $erro = '';

        // Se o erro passado no parâmetro for = 1, signfica que o login está errado
        if($request->get('erro') == 1) {
            $erro = 'Usuario e/ou senha não existem';
        // Se o erro passado no parâmetro for = 2, significa que o login não foi feito ou precisa ser feito novamente
        } else if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        // Define as regras para validação de campos do login
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // Usa as regras definidas acima para executar a validação de campo
        $request->validate($regras, $feedback);

        // Guarda os valores dos inputs de login em variáveis
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Salva os campos do banco de dados (Model) em uma variável
        $user = new User();

        // Faz uma busca no banco por onde tem o email e a senha e pega o primeiro resultado
        $usuario = $user->where('email', $email)
        ->where('password', $password)
        ->get()->first();

        // Caso a busca encontre, irá voltar os valores como nome, senha, email, etc
        // Então, se tiver um nome o cliente foi autenticado
        if(isset($usuario->name)) {
            // Inicia a sessão e salva os dados nome e email
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // Redireciona para a tela de cliente
            return redirect()->route('app.cliente');
        // Se não tiver nome na busca, volta para a tela de login, com um erro = 1
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    // Função para sair = destruir a sessão (dados salvos - email e senha) e redirecionar a página inicial
    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}