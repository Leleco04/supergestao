<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Gestão - @yield('titulo')</title>
    {{-- asset é referenciada automáticamente a pasta public --}}
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    @include('app.layouts._partials.topo')
    @yield('conteudo')
</body>

</html>