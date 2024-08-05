@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Visualizar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div> 
                <table border="1" align="center" style="margin-top: 5rem; text-align: left;">
                    <tr>
                        <td>ID: </td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome: </td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descrição: </td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso: </td>
                        <td>{{$produto->peso}}</td>
                    </tr>
                    <tr>
                        <td>Unidade ID: </td>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </table>
            </div>    
        </div>

    </div>
@endsection