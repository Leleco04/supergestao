@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Adicionar Detalhes do Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="margin-top: 5rem;">Nome: {{$produto_detalhe->produto->nome}}</div>
            <br>
            <div>Descrição: {{$produto_detalhe->produto->nome}}</div>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])                    
                @endcomponent
            </div>
        </div>

    </div>
@endsection
