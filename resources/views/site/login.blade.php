@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input type="text" name="usuario" value="{{old('usuario')}}" placeholder="Usuário" class="borda-preta">
                    <input type="password" name="senha" value={{old('senha')}} placeholder="Senha" class="borda-preta">
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>
    </div>

    @include('site.layouts._partials.rodape')

@endsection
