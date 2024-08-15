<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

use function PHPUnit\Framework\returnCallback;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);

        // if($request->input('_token') != '') {

        //     $nome = $request->get('nome');
        //     $site = $request->get('site');
        //     $uf = $request->get('uf');
        //     $email = $request->get('email');

        //     $fornecedores = new Fornecedor();

        //     $fornecedor = $fornecedores->where('nome', $nome)->where('site', $site)->where('uf', $uf)->where('email', $email)->get()->first();

        //     if(isset($fornecedor->nome)) {
        //         $msg = 'Achou';
        //     } else {
        //         $msg = 'Não';
        //     }
        // }
    }

    public function adicionar(Request $request)
    {

        $msg = '';
        $botao = 'Cadastrar';

        // Verifica se o token de request está vazio (SÓ É PREENCHIDO SE A FUNÇÃO FOR ACESSADA VIA MÉTODO POST)
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|max:2|min:2',
                'email' => 'email'
            ];

            $feedback = [
                'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O nome deve ter no máximo 40 caracteres',

                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',

                'email' => 'O campo email deve ser preenchido corretamente',

                'required' => 'O campo :attribute é obrigatório'
            ];

            // Faz a validação do request usando as regras definidas acima, caso não validar, não passa
            $request->validate($regras, $feedback);

            // Usa o model fornecedor para pegar os campos do banco
            $fornecedor = new Fornecedor();
            // Utiliza o método create para armazenar os dados em fornecedor
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        // Faz a edição do fornecedor
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Fornecedor atualizado com sucesso';
            } else {
                $msg = 'Erro ao atualizar o fornecedor';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg, 'botao' => $botao]);
    }

    public function editar($id, $msg = '')
    {
        // Utiliza o método '::find' para fazer a busca de um fornecedor pelo id
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }

    // public function index()
    // {
    //     // Salva uma array "fornecedores" com o campo "nome" (fornecedor1) e campo "status" (N)
    //     $fornecedores = [
    //         0 => [
    //             'nome' => 'fornecedor1',
    //             'status' => 'N',
    //             'cnpj' => '00.000.000/000-00',
    //             'ddd' => '',
    //             'telefone' => '0000-0000'
    //         ],
    //         1 => [
    //             'nome' => 'fornecedor2',
    //             'status' => 'S',
    //             'cpnj' => null,
    //             'ddd' => '85',
    //             'telefone' => '1111-1111'
    //         ],
    //         2 => [
    //             'nome' => 'fornecedor2',
    //             'status' => 'S',
    //             'cnpj' => null,
    //             'ddd' => '32',
    //             'telefone' => '2222-2222'
    //         ]
    //     ];
    //     // Usa o compact para encaminhar $fornecedores a view 
    //     return view('app.fornecedor.index', compact('fornecedores'));
    // }
}
