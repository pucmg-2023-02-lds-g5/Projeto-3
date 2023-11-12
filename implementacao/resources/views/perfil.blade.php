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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 80%;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .profile-container h1 {
            font-size: 2em;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }
        .profile-container p {
            font-size: 1.2em;
            line-height: 1.6em;
            margin-top: 20px; /* Adicionado margem superior */
        }
        .profile-icon {
            position: relative;
            float: right;
            color: #aaa; /* Cor do ícone mais clara */
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <div class="profile-container">
        <!-- Profile Icon -->
        <div class="profile-icon">
            <i class="fas fa-user-circle fa-3x"></i>
        </div>

        <h1>Perfil</h1>

        @if(Auth::guard('professor')->check())
            <p><strong>Nome:</strong> {{ $user->nome }}</p>
            <p><strong>CPF:</strong> {{ $user->cpf }}</p>
            <p><strong>Departamento:</strong> {{ $user->departamento }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Instituição:</strong> {{ $user->instituicao }}</p>
        @elseif(Auth::guard('aluno')->check())
            <p><strong>Nome:</strong> {{ $user->nome }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>CPF:</strong> {{ $user->cpf }}</p>
            <p><strong>RG:</strong> {{ $user->rg }}</p>
            <p><strong>Endereço:</strong> {{ $user->endereco }}</p>
            <p><strong>Instituição:</strong> {{ $user->instituicao }}</p>
            <p><strong>Curso:</strong> {{ $user->curso }}</p>
        @elseif(Auth::guard('empresa')->check())
            <p><strong>Nome:</strong> {{ $user->nome }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        @endif
    </div>
</body>
</html>
