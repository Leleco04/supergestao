<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    // Define o request como parâmetro e cria uma variável
    public function contato(Request $request) {

        // Pega todo o array do $request
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        // $contato = new SiteContato();

        // Salva os dados na variável contato utilizando o método request -> input('(name)')
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // Salva o array no banco de dados

        // if (!empty($contato)) {
        //     $contato -> save();
        // }

        // $contato = new SiteContato();
        // $contato -> fill($request->all());
        
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        // Define as regras e mensagens para a validação de campos
        $regras = [
            // Name do input => Característica do campo (único, max de carac, min, etc)
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            // Name do input.Caracteristica => Mensagem
            'nome.min' => 'O campo "nome" precisa conter no mínimo 3 caracteres.',
            'nome.max' => 'O campo "nome" deve conter no máximo 20 caracteres.',
            'nome.unique' => 'O campo "nome" já está em uso.',

            'email.email' => 'O email não é válido.',

            'motivo_contatos_id' => 'Selecione o motivo do contato.',

            'mensagem.max' => 'A mensagem deve conter no máximo 2000 caracteres.',

            // Pega todos os campos .required e adiciona a mensagem + nome do campo
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        // Faz a validação dos campos utilizando as regras definidas acima
        $request->validate($regras, $feedback);
        // Faz a inserção dos dados no banco utilizando o método create
        SiteContato::create($request->all());
        // Redireciona para a página principal
        return redirect()->route('site.index');
    }

}