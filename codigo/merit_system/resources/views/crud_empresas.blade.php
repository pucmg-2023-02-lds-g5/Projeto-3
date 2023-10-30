<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Empresas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    @include('layouts.navigation')

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Empresas</h1>

        <a href="{{ route('empresas.cadastro') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Cadastrar Empresa</a>

        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Nome</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th></th>
                </tr>

                @foreach ($empresas as $empresa)
                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">
                            {{ $empresa->nome }}
                        </td>
                        <td class="p-3 px-5">
                            {{ $empresa->email }}
                        </td>
                        <td class="p-3 px-5 flex justify-end">
                            <a href="{{ route('empresas.edit', $empresa) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
