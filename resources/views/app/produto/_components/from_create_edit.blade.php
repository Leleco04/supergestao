@if (isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
@endif
{{-- Em $fornecedor->nome ?? old('nome'), é verificado se $fornecedor tem um nome e é exibido (vem de editar), se não, o old é exibido --}}
<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}
<input type="text" name="descricao" placeholder="Descrição" class="borda-preta"
    value="{{ $produto->descricao ?? old('descricao') }}">
{{ $errors->has('descricao') ? $errors->first('nome') : '' }}
<input type="number" name="peso" placeholder="Peso" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}
<select name="unidade_id">
    <option>-- Selecione a unidade de medida --</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar Produto</button>

</form>
