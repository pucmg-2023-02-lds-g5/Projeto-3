<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do empresa</title>
</head>
<body>
    @if(is_object($empresa))
        <h1>Logado: {{ $empresa->nome }}</h1>
    @else
        <h1>Por favor, faça login</h1>
    @endif
</body>
</html>