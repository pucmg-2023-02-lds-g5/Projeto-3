<?php

namespace App\Http\Controllers;

// EmpresaController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Empresa; // Substitua 'Empresa' pelo nome do modelo correspondente
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CupomNotification;


class EmpresaController extends Controller
{
    public function create()
    {
        return view('cadastro_empresas');
    }

    public function processCadastro(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // Adicione outros campos conforme necessário
        ]);

        // Criação de um novo registro de empresa no banco de dados
        Empresa::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Aqui a senha é hasheada antes de ser armazenada
            // Adicione outros campos conforme necessário
        ]);

        // Redirecionamento do usuário após o cadastro
        return redirect('/')->with('success', 'Cadastro realizado com sucesso');
    }

    public function loginForm()
    {
        return view('login_empresas');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('empresa')->attempt($credentials)) {
            return redirect()->intended('index_empresa');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout()
    {
        Auth::guard('empresa')->logout();

        return redirect('/');
    }

    public function index()
    {
        // Recupere a empresa autenticada
        $empresa = Auth::guard('empresa')->user();

        // Retorne a view 'index_empresa' e passe a empresa para ela
        return view('index_empresa', ['empresa' => $empresa]);
    }

    public function crud()
{
    // Recupere todos os empresas
    $empresas = Empresa::all();

    // Retorne a view 'crud_empresas' e passe os empresas para ela
    return view('crud_empresas', ['empresas' => $empresas]);
}

    public function createVantagem()
{
    return view('create_vantagem');
}

public function storeVantagem(Request $request)
{
    $request->validate([
        'descricao' => 'required',
        'custo_em_moedas' => 'required|integer',
        'imagem' => 'required|image',
    ]);

    $vantagem = new Vantagem;
    $vantagem->descricao = $request->descricao;
    $vantagem->custo_em_moedas = $request->custo_em_moedas;
    $vantagem->imagem = $request->file('imagem')->store('imagens');
    $vantagem->empresa_id = Auth::guard('empresa')->id();
    $vantagem->save();

    return redirect()->route('empresa.dashboard');
}


public function show(Empresa $empresa)
{
    return view('empresas.show', compact('empresa'));
}

public function edit(Empresa $empresa)
{
return view('editar_empresa', compact('empresa'));
}

public function update(Request $request, Empresa $empresa)
{
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        // Adicione validações para os outros campos
    ]);

    $empresa->update([
        'nome' => $request->nome,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Aqui a senha é hasheada antes de ser armazenada
        // Adicione outros campos conforme necessário
    ]);

    return redirect()->route('empresas.crud')->with('success', 'Empresa atualizada com sucesso');
}

public function destroy(Empresa $empresa)
{
$empresa->delete();

return redirect()->route('empresas.crud')->with('success', 'Empresa excluída com sucesso');
}
}
