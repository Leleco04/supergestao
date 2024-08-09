@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{route('produto-detalhe.store')}}" method="POST">
        @csrf
@endif
{{-- Em $fornecedor->produto_id ?? old('produto_id'), é verificado se $fornecedor tem um produto_id e é exibido (vem de editar), se não, o old é exibido --}}
<input type="text" name="produto_id" placeholder="ID do Produto" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
<input type="text" name="comprimento" placeholder="Comprimento" class="borda-preta"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
<input type="number" name="largura" placeholder="Largura" class="borda-preta" value="{{ $produto_detalhe->largura ?? old("largura") }}">
{{ $errors->has("largura") ? $errors->first("largura") : '' }}
<input type="number" name="altura" placeholder="Altura" class="borda-preta" value="{{ $produto_detalhe->altura ?? old("altura") }}">
{{ $errors->has("altura") ? $errors->first("altura") : '' }}

<select name="unidade_id">
    <option>-- Selecione a unidade de medida --</option>

    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
    @endforeach

</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar Produto</button>

</form>
