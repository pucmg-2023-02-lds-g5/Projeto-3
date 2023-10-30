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
</head>
<body class="font-sans antialiased bg-gradient-to-r from-blue-500 to-blue-700">
    <div class="container mx-auto min-h-screen flex flex-col justify-center items-center">

        <!-- Page Content -->
        <main class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl mb-6 text-center">Editar Aluno</h1>
            <form method="POST" action="{{ route('alunos.update', $aluno) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nome" class="block mb-2">Nome:</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}" required autofocus autocomplete="nome" class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $aluno->email) }}" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2">Senha:</label>
                    <input type="password" name="password" id="password" value="{{ old('password', $aluno->password) }}" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="cpf" class="block mb-2">CPF:</label>
                    <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $aluno->cpf) }}" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="rg" class="block mb-2">RG:</label>
                    <input type="text" name="rg" id="rg" value="{{ old('rg', $aluno->rg) }}" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="endereco" class="block mb-2">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $aluno->endereco) }}" required class="w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="instituicao_ensino" class="block mb-2">Instituição de Ensino:</label>
                    <select id="instituicao_ensino" name="instituicao" value="{{ old('instituicao', $aluno->instituicao) }}" required class='w-full px-3 py-2 rounded shadow border border-gray-300 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                        <option value='PUC Minas'>PUC Minas</option>
                        <option value='UFMG'>UFMG</option>
                        <option value='UNA'>UNA</option>
                    </select>
                </div>
                <div class='mb=4'>
                    <label for='curso' class='block mb=2'>Curso:</label>
                    <select id='curso' name='curso' value="{{ old('curso', $aluno->curso) }}" required class='w-full px=3 py=2 rounded shadow border border-gray=300 focus:outline-none focus:border-indigo=300 focus:ring focus:ring-indigo=200 focus:ring-opacity=50'>
                        <option value='Engenharia de Software'>Engenharia de Software</option>
                        <option value='Medicina'>Medicina</option>
                        <option value='Direito'>Direito</option>
                    </select>
                </div>

                <button type="submit" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-6'>Atualizar</button>

            </form> 
        </main>

    </div>
</body>
</html>
