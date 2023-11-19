<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    @include('layouts.navigation')
    <div class="container mx-auto px-4 mt-4"> <!-- Adicionado margem superior -->
       <h1 class="text-2xl font-bold mb-4">Minhas Vantagens</h1>

       <div class="mb-4 float-right"> <!-- Movido para a direita -->
           <i class="fas fa-coins"></i> <!-- Ícone de moedas adicionado -->
           {{ $aluno->saldo }} moedas
       </div>

       <div class="grid grid-cols-3 gap-4">
       @if ($vantagens->count())
            @foreach ($vantagens as $vantagem)
                <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-500 ease-in-out hover:scale-105 max-w-sm mx-auto h-[500px] w-[400px] flex flex-col justify-between">
                    <div class="flex flex-col justify-center">
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ asset('images/' . $vantagem->imagem) }}" alt="{{ $vantagem->nome }}" class="object-cover rounded h-[350px] w-[350px]">
                        </div>
                        <h2 class="text-xl font-bold mb-2">{{ $vantagem->nome }}</h2>
                        <p class="text-gray-700 text-sm">{{ $vantagem->descricao }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhuma vantagem encontrada.</p>
        @endif


   </div>

   <div class="flex justify-center mt-4">
    <a href="{{ route('vantagens.disponiveis') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adquirir mais vantagens</a>
</div>

</body>
</html>
