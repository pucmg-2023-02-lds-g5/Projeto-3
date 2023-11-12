<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gradient-to-r from-blue-500 to-blue-700">
    <div class="container mx-auto min-h-screen flex flex-col justify-center items-center">
        <main class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl mb-6 text-center">Login do Professor</h1>
            <form method="POST" action="{{ route('login_professor') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block mb-2">Email:</label>
                    <input type="email" name="email" id="email" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2">Senha:</label>
                    <input type="password" name="password" id="password" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class='mb=4'>
                    <button type='submit' class='w-full px=10 py=2 rounded shadow bg-blue-500 text-white'>Entrar</button>
                </div>
            </form>
        </main>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>

