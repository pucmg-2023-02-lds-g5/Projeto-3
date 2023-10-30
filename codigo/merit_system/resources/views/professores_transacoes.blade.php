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

    <!-- Modal Styles -->
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%; /* Reduced width */
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styles */
        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select, input[type="number"] {
            max-width: 200px; /* Reduced width */
        }

        button {
             background-color : #008CBA; 
             border : none; 
             color : white; 
             padding : 15px 32px; 
             text-align : center; 
             text-decoration : none; 
             display : inline-block; 
             font-size : 16px; 
             margin : 4px 2px; 
             cursor : pointer;

             border-radius : 12px; 
             transition : all 0.3s ease-in-out;

             margin-bottom : 20px; 
         }
         button:hover{
             transform : scale(1.06);
         }

         button[type="submit"]{
    color : white !important ; /* Change text color */
    background-color : #008CBA; /* Blue background */
    border : none; /* Remove borders */
    padding : 10px 20px; /* Some padding */
    text-align : center; /* Centered text */
    text-decoration : none; /* Remove underline */
    display : inline-block; /* Get it to display inline */
    font-size : 14px; /* Change text size */
    margin-top : 10px; /* Add some top margin for submit button */

    border-radius : 12px; 
    transition : all 0.3s ease-in-out;

    margin-bottom : 20px; 
}
button[type="submit"]:hover{
    transform : scale(1.06);
}

     </style>
 </head>
 <body class="bg-gray-200">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 mt-4"> <!-- Adicionado margem superior -->
       <h1 class="text-2xl font-bold mb-4">Transações</h1>

       <div class="mb-4 float-right"> <!-- Movido para a direita -->
           <i class="fas fa-coins"></i> <!-- Ícone de moedas adicionado -->
           {{ $professor->saldo }} moedas
       </div>

       <button id="enviarMoedasBtn" class="btn btn-primary">Enviar moedas</button> <!-- Estilização do botão adicionada -->

       <div id="enviarMoedasModal" class="modal"> <!-- Modal adicionado -->
           <div class="modal-content">
               <span id="closeModal" class="close">×</span>
               <form method="POST" action="{{ route('professores.enviarMoedas') }}">
                   @csrf
                   <label for="aluno_id">Aluno:</label>
                   <select id="aluno_id" name="aluno_id">
                       <option value="" disabled selected>Selecione o aluno</option> <!-- Placeholder option -->
                       @foreach ($alunos as $aluno)
                           <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                       @endforeach
                   </select>
                   <label for="quantidade">Quantidade:</label>
                   <input id="quantidade" type="number" name="quantidade" min="1" max="{{ $professor->saldo }}">
                   <label for="mensagem">Mensagem:</label>
                   <textarea id="mensagem" name="mensagem"></textarea>
                   <button type="submit">Enviar moedas</button> <!-- Estilização do botão adicionada -->
               </form>
           </div>
       </div>

       <table class="w-full text-md bg-white shadow-md rounded mb-4">
           <tbody>
               <tr class="border-b">
                   <th class="text-left p-3 px-5">Enviado para</th>
                   <th class="text-left p-3 px-5">Quantidade</th>
                   <th class="text-left p-3 px-5">Mensagem</th>
                   <th class="text-left p-3 px-5">Data</th>
               </tr>

               @foreach ($transacoes as $transacao)
                   <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">
                            @if($transacao->aluno)
                                {{ $transacao->aluno->nome }}
                            @else
                                Aluno excluído
                            @endif
                        </td>
                       <td class="p-3 px-5">{{ $transacao->quantidade }}</td>
                       <td class="p-3 px-5">{{ $transacao->mensagem }}</td>
                       <td class="p-3 px-5">{{ $transacao->created_at }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>

   </div>

   <!-- Código JavaScript para manipular o modal -->
   <script>
       var modal = document.getElementById("enviarMoedasModal");
       var btn = document.getElementById("enviarMoedasBtn");
       var span = document.getElementById("closeModal");

       btn.onclick = function() {
           modal.style.display = "block";
       }

       span.onclick = function() {
           modal.style.display = "none";
       }

       window.onclick = function(event) {
           if (event.target == modal) {
               modal.style.display = "none";
           }
       }
   </script>
</body>
</html>
