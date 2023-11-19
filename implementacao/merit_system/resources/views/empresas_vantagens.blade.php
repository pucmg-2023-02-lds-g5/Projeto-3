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

        <style>
    /* The rest of your styles... */

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

    button.editar, button.excluir {
    align-items: flex-start !important;
    appearance: button !important;
    background-color: rgb(66, 153, 225) !important;
    background-image: none !important;
    border-bottom-color: rgb(255, 255, 255) !important;
    border-bottom-left-radius: 12px !important;
    border-bottom-right-radius: 12px !important;
    border-bottom-style: none !important;
    border-bottom-width: 0px !important;
    border-collapse: collapse !important;
    border-image-outset: 0 !important;
    border-image-repeat: stretch !important;
    border-image-slice: 100% !important;
    border-image-source: none !important;
    border-image-width: 1 !important;
    border-left-color: rgb(255, 255, 255) !important;
    border-left-style: none !important;
    border-left-width: 0px !important;
    border-right-color: rgb(255, 255, 255) !important;
    border-right-style: none !important;
    border-right-width: 0px !important;
    border-top-color: rgb(255, 255, 255) !important;
    border-top-left-radius: 12px !important;
    border-top-right-radius: 12px !important;
    border-top-style: none !important;
    border-top-width: 0px !important;
    box-sizing: border-box !important;
    color: rgb(255, 255, 255) !important;
    cursor: pointer !important;
    display: inline-block !important; /* Change this to 'block' if you want the buttons to take up the full width of their container */
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
    font-feature-settings: normal !important;
    font-kerning: auto !important;
    font-optical-sizing: auto !important;
    font-size: 16px !important; /* Change this to match the desired font size */
    font-stretch: 100% !important;
    font-style: normal !important;
    font-variant-alternates: normal !important;
    font-variant-caps: normal !important;
    font-variant-east-asian: normal !important;
    font-variant-ligatures: normal !important;
    font-variant-numeric: normal !important;
    font-variant-position: normal !important;
    font-variation-settings: normal !important;
    font-weight: 400 !important; /* Change this to match the desired font weight */
}

button.editar:hover {
   background-color : #2b6cb0!important; 
   color : white!important; 
}

button.excluir:hover {
   background-color : #c53030!important; 
   color : white!important; 
}

button.excluir {
    align-items: flex-start !important;
    appearance: button !important;
    background-color: rgb(66, 153, 225) !important;
    background-image: none !important;
    border-bottom-color: rgb(255, 255, 255) !important;
    border-bottom-left-radius: 12px !important;
    border-bottom-right-radius: 12px !important;
    border-bottom-style: none !important;
    border-bottom-width: 0px !important;
    border-collapse: collapse !important;
    border-image-outset: 0 !important;
    border-image-repeat: stretch !important;
    border-image-slice: 100% !important;
    border-image-source: none !important;
    border-image-width: 1 !important;
    border-left-color: rgb(255, 255, 255) !important;
    border-left-style: none !important;
    border-left-width: 0px !important;
    border-right-color: rgb(255, 255, 255) !important;
    border-right-style: none !important;
    border-right-width: 0px !important;
    border-top-color: rgb(255, 255, 255) !important;
    border-top-left-radius: 12px !important;
    border-top-right-radius: 12px !important;
    border-top-style: none !important;
    border-top-width: 0px !important;
    box-shadow: none !important;
    box-sizing: border-box !important;
    color: rgb(255, 255, 255) !important;
    cursor: pointer !important;
    display: block !important; /* Change this to 'inline-block' if you want the buttons to take up less space */
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
    font-feature-settings: normal !important;
    font-kerning: auto !important;
    font-optical-sizing: auto !important;
    font-size: 16px !important; /* Change this to match the desired font size */
    font-stretch: 100% !important;
    font-style: normal !important;
    font-variant-alternates: normal !important;
    font-variant-caps: normal !important;
    font-variant-east-asian: normal !important;
    font-variant-ligatures: normal !important;
    font-variant-numeric: normal !important;
    font-variant-position: normal !important;
    font-variation-settings: normal !important;
}


.btn {
        font-size: 16px !important;
        padding: 15px 32px !important;
        border-radius: 12px !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .btn.editar {
        background-color: #4299e1 !important;
    }

    .btn.editar:hover {
        background-color: #2b6cb0 !important;
        color: white !important;
    }

    .btn.excluir {
        background-color: #f56565 !important;
    }

    .btn.excluir:hover {
        background-color: #c53030 !important;
        color: white !important;
    }

</style>

</head>
<body class="bg-gray-200">
    @include('layouts.navigation')
    
   <div class="container mx-auto px-4 mt-4"> <!-- Adicionado margem superior -->
       <h1 class="text-2xl font-bold mb-4">Vantagens</h1>

       <button id="criarVantagemBtn" class="btn btn-primary">Criar Vantagem</button> <!-- Botão para criar vantagem -->
       <div id="criarVantagemModal" class="modal"> <!-- Modal para criar vantagem -->
           <div class="modal-content">
               <span id="closeModalCriar" class="close">×</span>
               <form method="POST" action="{{ route('vantagens.store') }}" enctype="multipart/form-data">
                   @csrf
                   <label for="nome">Nome:</label>
                   <input id="nome" type="text" name="nome">
                   <label for="descricao">Descrição:</label>
                   <textarea id="descricao" name="descricao"></textarea>
                   <label for="custo_em_moedas">Custo em Moedas:</label>
                   <input id="custo_em_moedas" type="number" name="custo_em_moedas">
                   <label for="imagem">Imagem:</label>
                   <input id="imagem" type="file" name="imagem">
                   <button type="submit">Criar Vantagem</button>
               </form>
           </div>
       </div>

       <table class="w-full text-md bg-white shadow-md rounded mb-4">
           <tbody>
               <tr class="border-b">
                   <th class="text-left p-3 px-5">Nome</th>
                   <th class="text-left p-3 px-5">Descrição</th>
                   <th class="text-left p-3 px-5">Custo em Moedas</th>
                   <th></th>
               </tr>
               @foreach ($vantagens as $vantagem)
                   <tr class="border-b hover:bg-orange-100 bg-gray-100">
                       <td class="p-3 px-5">{{ $vantagem->nome }}</td>
                       <td class="p-3 px-5">{{ $vantagem->descricao }}</td>
                       <td class="p-3 px-5">{{ $vantagem->custo_em_moedas }}</td>
                       <td class="p-3 px-5 flex justify-end">
                           <!-- Botão para editar vantagem -->
                           <button class="btn editar" id="{{ 'editarVantagemBtn' . $vantagem->id }}">Editar</button> 
                           <!-- Modal para editar vantagem -->
                           <div id="{{ 'editarVantagemModal' . $vantagem->id }}" class="modal">
                               <div class="modal-content">
                                   <span id="{{ 'closeModalEditar' . $vantagem->id }}" class="close">×</span>
                                   <form method="POST" action="{{ route('vantagens.update', $vantagem->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="{{ 'nome' . $vantagem->id }}">Nome:</label>
                                        <input id="{{ 'nome' . $vantagem->id }}" type="text" name="nome" value="{{ $vantagem->nome }}">
                                        <label for="{{ 'descricao' . $vantagem->id }}">Descrição:</label>
                                        <textarea id="{{ 'descricao' . $vantagem->id }}" name="descricao">{{ $vantagem->descricao }}</textarea>
                                        <label for="{{ 'custo_em_moedas' . $vantagem->id }}">Custo em Moedas:</label>
                                        <input id="{{ 'custo_em_moedas' . $vantagem->id }}" type="number" name="custo_em_moedas" value="{{ $vantagem->custo_em_moedas }}">
                                        <label for="{{ 'imagem' . $vantagem->id }}">Imagem Atual:</label>
                                        <img id="{{ 'imagemAtual' . $vantagem->id }}" src="{{ asset('images/' . $vantagem->imagem) }}" alt="Imagem Atual">
                                        <label for="{{ 'imagemNova' . $vantagem->id }}">Alterar Imagem:</label>
                                        <input id="{{ 'imagemNova' . $vantagem->id }}" type="file" name="imagem">
                                        <button type="submit">Salvar Alterações</button> 
                                    </form>
                               </div>
                           </div>

                           <!-- Formulário para excluir vantagem -->
                           <form action="{{ route('vantagens.destroy', $vantagem->id) }}" method="POST">
                               @csrf
                               @method('DELETE')
                               <!-- Botão para excluir vantagem -->
                               <button type="submit" class="excluir">Excluir</button>

                           </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>

   </div>

   <!-- Código JavaScript para manipular os modais -->
   <script>
       var criarModal = document.getElementById("criarVantagemModal");
var criarBtn = document.getElementById("criarVantagemBtn");
var closeModalCriar = document.getElementById("closeModalCriar");

criarBtn.onclick = function() {
    criarModal.style.display = "block";
}
closeModalCriar.onclick = function() {
    criarModal.style.display = "none";
}

@foreach ($vantagens as $vantagem)
    var editarModal{{ $vantagem->id }} = document.getElementById("editarVantagemModal{{ $vantagem->id }}");
    var editarBtn{{ $vantagem->id }} = document.getElementById("editarVantagemBtn{{ $vantagem->id }}");
    var closeModalEditar{{ $vantagem->id }} = document.getElementById("closeModalEditar{{ $vantagem->id }}");

    editarBtn{{ $vantagem->id }}.onclick = function() {
        editarModal{{ $vantagem->id }}.style.display = "block";
    }
    closeModalEditar{{ $vantagem->id }}.onclick = function() {
        editarModal{{ $vantagem->id }}.style.display = "none";
    }
@endforeach

window.onclick = function(event) {
    if (event.target == criarModal) {
        event.target.style.display = "none";
    }
    @foreach ($vantagens as $vantagem)
        if (event.target == editarModal{{ $vantagem->id }}) {
            event.target.style.display = "none";
        }
    @endforeach
}

   </script>

</body>
</html>

