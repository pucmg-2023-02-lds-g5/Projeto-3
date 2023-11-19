<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Transacao;
use App\Models\Aluno;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CupomNotification;

class AlunoController extends Controller
{
    public function create()
    {
        return view('cadastro_alunos');
    }

    public function store(Request $request)
{
    // Valide os dados do formulário
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'endereco' => 'required',
        'instituicao' => 'required',
        'curso' => 'required',
    ]);

    // Crie um novo registro de aluno no banco de dados
    Aluno::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Aqui a senha é hasheada antes de ser armazenada
        'cpf' => $request->cpf,
        'rg' => $request->rg,
        'endereco' => $request->endereco,
        'instituicao' => $request->instituicao,
        'curso' => $request->curso
    ]);

    // Redirecione o usuário após o cadastro
    return redirect('/')->with('success', 'Cadastro realizado com sucesso');
}

public function loginForm()
    {
        return view('login_alunos');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('aluno')->attempt($credentials)) {
            session(['aluno_id' => Auth::guard('aluno')->user()->id]);
            return redirect()->intended('index_aluno');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout()
    {
        Auth::guard('aluno')->logout();

        return redirect('/');
    }

    public function index()
{
    // Recupere o aluno autenticado
    $aluno = Auth::guard('aluno')->user();

    // Retorne a view 'index_aluno' e passe o aluno para ela
    return view('index_aluno', ['aluno' => $aluno]);
}

public function crud()
{
    // Recupere todos os alunos
    $alunos = Aluno::all();

    // Retorne a view 'crud_alunos' e passe os alunos para ela
    return view('crud_alunos', ['alunos' => $alunos]);
}

public function resgatarVantagem(Request $request, Vantagem $vantagem)
{
    $aluno = Auth::guard('aluno')->user();

    if ($aluno->moedas < $vantagem->custo_em_moedas) {
        return back()->withErrors([
            'moedas' => 'Você não tem moedas suficientes para resgatar esta vantagem.',
        ]);
    }

    $aluno->moedas -= $vantagem->custo_em_moedas;
    $aluno->save();

    // Aqui você pode adicionar a lógica para enviar o email do cupom
    $codigo = $this->gerarCodigoUnico(); // Substitua isso pela sua lógica de geração de código

    Notification::send($aluno, new CupomNotification($codigo));
    Notification::send($vantagem->empresa, new CupomNotification($codigo));

    return redirect()->route('aluno.dashboard')->with('success', 'Vantagem resgatada com sucesso!');
}

public function gerarCodigoUnico($length = 6)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $codigo = '';
    for ($i = 0; $i < $length; $i++) {
        $codigo .= $characters[rand(0, $charactersLength - 1)];
    }
    return $codigo;
}

public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        return view('editar_aluno', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
{
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'endereco' => 'required',
        'instituicao' => 'required',
        'curso' => 'required',
    ]);

    $aluno->update([
        'nome' => $request->nome,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Aqui a senha é hasheada antes de ser armazenada
        'cpf' => $request->cpf,
        'rg' => $request->rg,
        'endereco' => $request->endereco,
        'instituicao' => $request->instituicao,
        'curso' => $request->curso
    ]);

    return redirect()->route('alunos.crud')->with('success', 'Aluno atualizado com sucesso');
}


    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.crud')->with('success', 'Aluno excluído com sucesso');
    }

    public function transacoes()
{
    $transacoes = Transacao::where('aluno_id', session('aluno_id'))->get();
    $aluno = Aluno::find(session('aluno_id')); // Busque o aluno do banco de dados
    return view('alunos_transacoes', ['transacoes' => $transacoes, 'aluno' => $aluno]);
}



}


