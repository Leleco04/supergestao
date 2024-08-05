@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Adicionar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
                <form action="{{route('produto.store')}}" method="POST">
                    @csrf
                    {{-- Em $fornecedor->nome ?? old('nome'), é verificado se $fornecedor tem um nome e é exibido (vem de editar), se não, o old é exibido --}}
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{old('nome')}}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta" value="{{old('descricao')}}">
                    {{$errors->has('descricao') ? $errors->first('nome') : ''}}
                    <input type="number" name="peso" placeholder="Peso" class="borda-preta" value="{{old('peso')}}">
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