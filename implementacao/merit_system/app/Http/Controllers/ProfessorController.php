<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Transacao;
use App\Models\Professor;
use App\Notifications\MoedaRecebida;
use Illuminate\Support\Facades\Notification;




class ProfessorController extends Controller
{
    public function loginForm()
    {
        return view('login_professor');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('professor')->attempt($credentials)) {
            session(['professor_id' => Auth::guard('professor')->user()->id]);
            return redirect()->intended('index_professor');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout()
    {
        Auth::guard('professor')->logout();

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Recupere o professor autenticado
    $professor = Auth::guard('professor')->user();

    // Retorne a view 'index_professor' e passe o professor para ela
    return view('index_professor', ['professor' => $professor]);
}


public function transacoes()
{
    $alunos = Aluno::all();
    $transacoes = Transacao::where('professor_id', session('professor_id'))->get();
    $professor = Professor::find(session('professor_id')); // Busque o professor do banco de dados
    return view('professores_transacoes', ['alunos' => $alunos, 'transacoes' => $transacoes, 'professor' => $professor]);
}


public function enviarMoedas(Request $request)
{
    $request->validate([
        'aluno_id' => 'required|exists:alunos,id',
        'quantidade' => 'required|integer|min:1|max:1000',
        'mensagem' => 'nullable|string',
    ]);

    $professor = Professor::find(session('professor_id'));

    if ($request->quantidade > $professor->saldo) {
        return back()->withErrors([
            'quantidade' => 'Você não tem saldo suficiente para enviar essa quantidade de moedas.',
        ]);
    }

    Transacao::create([
        'professor_id' => $professor->id,
        'aluno_id' => $request->aluno_id,
        'quantidade' => $request->quantidade,
        'mensagem' => $request->mensagem,
    ]);

    // Busque o aluno do banco de dados
    $aluno = Aluno::find($request->aluno_id);

    // Adicione a quantidade de moedas ao saldo do aluno
    $aluno->saldo += $request->quantidade;

    // Salve o aluno
    $aluno->save();

    $professor->saldo -= $request->quantidade;
    $professor->save();

     // Notifique o aluno
     $detalhes = [
        'quantidade' => $request->quantidade,
        'professor' => $professor->nome,
        'mensagem' => $request->mensagem,
    ];
    Notification::send($aluno, new MoedaRecebida($detalhes));

    return redirect()->route('professores.transacoes')->with('success', 'Moedas enviadas com sucesso');
}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
