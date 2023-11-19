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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->

 </head>
 <body class="bg-gray-200">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 mt-4"> <!-- Adicionado margem superior -->
       <h1 class="text-2xl font-bold mb-4">Transações</h1>

       <div class="mb-4 float-right"> <!-- Movido para a direita -->
           <i class="fas fa-coins"></i> <!-- Ícone de moedas adicionado -->
           {{ $aluno->saldo }} moedas
       </div>

       <table class="w-full text-md bg-white shadow-md rounded mb-4">
           <tbody>
               <tr class="border-b">
                   <th class="text-left p-3 px-5">Enviado por</th>
                   <th class="text-left p-3 px-5">Quantidade</th>
                   <th class="text-left p-3 px-5">Mensagem</th>
                   <th class="text-left p-3 px-5">Data</th>
               </tr>

               @foreach ($transacoes as $transacao)
                   <tr class="border-b hover:bg-orange-100 bg-gray-100">
                       <td class="p-3 px-5">{{ $transacao->professor->nome }}</td>
                       <td class="p-3 px-5">{{ $transacao->quantidade }}</td>
                       <td class="p-3 px-5">{{ $transacao->mensagem }}</td>
                       <td class="p-3 px-5">{{ $transacao->created_at }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>

   </div>

</body>
</html>
