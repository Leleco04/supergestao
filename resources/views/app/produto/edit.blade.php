@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Editar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
                <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="POST"">
                    @csrf
                    @method('PUT');
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{$produto->nome ?? old('nome')}}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{$produto->descricao ?? old('descricao')}}">
                    {{$errors->has('descricao') ? $errors->first('nome') : ''}}
                    <input type="number" name="peso" placeholder="Peso" class="borda-preta" value="{{$produto->peso ?? old('peso')}}">
                    {{$errors->has('peso') ? $errors->first('peso') : ''}}
                    <select name="unidade_id">
                        <option>-- Selecione a unidade de medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                    <button type="submit" class="borda-preta">Cadastrar Produto</button>
                </form>
            </div>    
        </div>

    </div>
@endsection