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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    @include('layouts.navigation')
    <div class="container mx-auto px-4 mt-4"> <!-- Adicionado margem superior -->
       <h1 class="text-2xl font-bold mb-4">Vantagens Disponíveis</h1>

       @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Ops!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Fechar</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
@endif

       <div class="mb-4 float-right"> <!-- Movido para a direita -->
           <i class="fas fa-coins"></i> <!-- Ícone de moedas adicionado -->
           {{ $aluno->saldo }} moedas
       </div>

       <div class="grid grid-cols-3 gap-4">
       @if ($vantagens->count())
            @foreach ($vantagens as $vantagem)
                <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-500 ease-in-out hover:scale-105 max-w-sm mx-auto min-h-[300px] flex flex-col justify-between">
                    <div>
                        <div class="w-full h-32 overflow-hidden">
                        <img src="{{ asset('images/' . $vantagem->imagem) }}" alt="{{ $vantagem->nome }}" class="w-full h-full object-cover object-center mb-2 rounded">
                        </div>
                        <h2 class="text-xl font-bold mb-2">{{ $vantagem->nome }}</h2>
                        <p class="text-gray-700 text-sm">{{ $vantagem->descricao }}</p>
                    </div>
                    <div class="flex justify-between items-end">
                        <p class="font-bold text-lg">{{ $vantagem->custo_em_moedas }} moedas</p>
                        <a href="{{ route('vantagens.resgatar', $vantagem) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Resgatar</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhuma vantagem encontrada.</p>
        @endif


   </div>

   <div class="flex justify-center mt-4">
    <a href="{{ route('vantagens.alunos') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute top-0 left-0 mt-8">Voltar para Minhas Vantagens</a>

</div>

</body>
</html>
