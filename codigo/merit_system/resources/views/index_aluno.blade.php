<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main class='py-12'>
        <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
            <div class='bg-white overflow-hidden shadow-sm sm:rounded-lg'>
                <div class='p-6 bg-white border-b border-gray-200'>
                    Você está logado!
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 m-4 justify-center"> <!-- Alterado gap-4 para gap-2 -->
            <!-- Card Transações -->
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-500 ease-in-out hover:scale-105 max-w-sm mx-auto min-h-[300px] flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Transações</h2>
                    <p class="text-gray-700 text-sm">Visualize o histórico de suas transações.</p>
                </div>
                <a href="{{ route('alunos.transacoes') }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Acessar</a>
            </div>

            <!-- Card Vantagens -->
            <div class="bg-white shadow-lg rounded-lg p-6 transform transition duration-500 ease-in-out hover:scale-105 max-w-sm mx-auto min-h-[300px] flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Vantagens</h2>
                    <p class="text-gray-700 text-sm">Resgate vantagens com suas moedas.</p>
                </div>
                <!-- Substitua 'vantagens.index' pela rota correta para a página de vantagens -->
                <a href="#" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Acessar</a>
            </div>

        </div>

    </main>
</body>
</html>
