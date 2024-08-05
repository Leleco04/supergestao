<?php

// Importa os controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;

// Rota usando os controllers e suas classes / name = nome da rota
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

// Agrupa as rotas utilizando o ::prefix -> group, ou seja, para acessar alguma rota é preciso colocar "/app" antes, (/app/clientes)
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {

    Route::get('/cliente', [ClienteController::class, 'index']
    )->name('app.cliente');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])
    ->name('app.fornecedor');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])
    ->name('app.fornecedor');

    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])
    ->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])
    ->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])
    ->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])
    ->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])
    ->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])
    ->name('app.fornecedor.excluir');

    Route::resource('produto', App\Http\Controllers\ProdutoController::class);

    Route::get('/home', [HomeController::class, 'index'])
    ->name('app.home');
    
    Route::get('/sair', [LoginController::class, 'sair']
    )->name('app.sair');
});

// Rota com 2 parâmetros e o controller "TesteController" com a função "teste"
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

// Redireciona de uma rota para outra, assim, ao acessar a rota2, o usuário é direcionado a rota 1
// Route::get('/rota2', function () {
//     return redirect() -> route('site.rota1');
// })->name('site.rota2');

// Redireciona de uma rota para outra, assim, ao acessar a rota2, o usuário é direcionado a rota 1
// Route::redirect('/rota2', '/rota1');

// Define a rota de fallback *Quando um usuário tenta acessar uma rota que não existe*, exibindo uma mensagem e opção de voltar a tela principal
Route::fallback(function () {
    echo 'A rota acessada não existe, <a href="' . route('site.index') . '">Clique</a> para voltar a página inicial';
});

// // Rota /contato com parâmetros
// Route::get(
//     '/contato/{nome}/{categoria}',
//     function (
//         // Adiciona os parâmetros as variáveis
//         string $nome,
//         int $categoria
//     ) {
//         // Mostra os parâmetros
//         echo "Informações: $nome, $categoria";
//     }
// // Verifica se em "categoria_id" o valor é inteiro (entre 0 e 9 (0-9)) e pelo menos 1 número (+)
// ) -> where('categoria_id', '[0-9]+') 
// // Verifica se em "nome" o valor é uma string de pelos menos 1 caractere e está entre a e z (maiúsculo ou minúsculo)
// -> where('nome', '[A-Za-z]+');