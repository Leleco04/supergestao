@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Adicionar Fornecedor</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;"> 
                <form action="{{route('app.fornecedor.adicionar')}}" method="POST">
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                    @csrf
                    {{-- Em $fornecedor->nome ?? old('nome'), é verificado se $fornecedor tem um nome e é exibido (vem de editar), se não, o old é exibido --}}
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome')}}">
                    {{-- Mostra o erro definido em $feedbacks no controller --}}
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ $fornecedor->site ?? old('site')}}">
                    {{-- Mostra o erro definido em $feedbacks no controller --}}
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ $fornecedor->uf ?? old('uf')}}">
                    {{-- Mostra o erro definido em $feedbacks no controller --}}
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="email" name="email" placeholder="E-mail" class="borda-preta" value="{{ $fornecedor->email ?? old('email')}}">
                    {{-- Mostra o erro definido em $feedbacks no controller --}}
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">{{$botao ?? 'Atualizar'}}</button>
                </form>
            </div>    
        </div>

    </div>
@endsection