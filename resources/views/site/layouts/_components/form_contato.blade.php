{{ $slot }}

<form action={{ route('site.contato') }} method="post">
    @csrf

    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    {{-- Verifica se tem algum erro (has) em uma coluna específica (nome) --}}
    @if ($errors->has('nome'))
        {{-- Pega a primeira mensagem de erro (first) do campo específicado (nome) --}}
        {{ $errors->first('nome') }}
    @endif
    <br>

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{-- Se tiver um erro em telefone, então (?) pega o primeiro erro do campo, se não (:), fica vazio --}}
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{-- Se tiver um erro em email, então (?) pega o primeiro erro do campo, se não (:), fica vazio --}}
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{-- Se tiver um erro em motivo_contatos_id, então (?) pega o primeiro erro do campo, se não (:), fica vazio --}}
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>

    <textarea name="mensagem" class="{{ $classe }}"> 
        @if (old('mensagem') != '') 
            {{ old('mensagem') }}
        @else
            
        @endif 
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>

    <button type="submit" class="{{ $classe }}">ENVIAR</button>

</form>

    {{-- Verifica se tem algum erro no array de erros (ANY) --}}
    @if ($errors->any())
        <div style="width: 100%; background: red; position: absolute; top: 0px; left: 0px;">
            {{-- Adiciona todos os erros (ALL) na variável erro --}}
            @foreach ($errors->all() as $erro)
                {{ $erro }}
                <br>
            @endforeach
        </div>
    @endif