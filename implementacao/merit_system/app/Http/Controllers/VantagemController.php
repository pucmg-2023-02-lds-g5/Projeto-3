<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vantagem;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CupomNotification;
use App\Notifications\EmpresaNotification;


class VantagemController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'descricao' => 'required',
        'custo_em_moedas' => 'required|integer',
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->imagem->extension();  
    $request->imagem->move(public_path('images'), $imageName);

    $vantagem = new Vantagem;
    $vantagem->fill($request->all());
    $vantagem->id_empresa = Auth::guard('empresa')->user()->id;
    $vantagem->imagem = $imageName;
    $vantagem->save();

    return redirect()->route('vantagens.empresas');
}


    public function empresasVantagens()
{
    $empresa = Auth::guard('empresa')->user();
    $vantagens = Vantagem::where('id_empresa', $empresa->id)->get();
    return view('empresas_vantagens', ['vantagens' => $vantagens]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $vantagens = Vantagem::all();
    return view('vantagens', ['vantagens' => $vantagens]);
}


public function alunosVantagens()
{
    $aluno = Auth::guard('aluno')->user();
    $vantagens = $aluno->vantagens;
    return view('alunos_vantagens', ['vantagens' => $vantagens]);
}

public function resgatar($id)
{
    $vantagem = Vantagem::find($id);
    $aluno = Auth::guard('aluno')->user();

    // Verifique se o aluno tem moedas suficientes
    if ($aluno->saldo >= $vantagem->custo_em_moedas) {
        // Deduzir moedas do saldo do aluno
        $aluno->saldo -= $vantagem->custo_em_moedas;
        $aluno->save();

        // Adicionar a vantagem ao aluno
        $aluno->vantagens()->attach($vantagem->id);

        // Enviar e-mail para o aluno e o parceiro
        $codigo = $this->gerarCodigoUnico(); 

        Notification::send($aluno, new CupomNotification($codigo, $vantagem->nome, $vantagem->custo_em_moedas, $vantagem->empresa->nome));

        $empresa = $vantagem->empresa;

        Notification::send($empresa, new EmpresaNotification($aluno, $codigo, $vantagem));

        // Redirecionar de volta com sucesso
        return back()->with('success', 'Vantagem resgatada com sucesso!');
    }

    // Redirecionar de volta com erro
    return back()->with('error', 'Você não tem moedas suficientes para resgatar esta vantagem.');
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


public function vantagensDisponiveis()
{
    $aluno = Auth::guard('aluno')->user();
    $vantagens = Vantagem::whereNotIn('id', $aluno->vantagens->pluck('id'))->get();
    return view('vantagens', ['vantagens' => $vantagens]);
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
    $vantagem = Vantagem::find($id);
    return response()->json($vantagem);
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'descricao' => 'required',
        'custo_em_moedas' => 'required|integer',
        'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $vantagem = Vantagem::find($id);

    if ($request->hasFile('imagem')) {
        // Delete the old image from the storage
        Storage::delete('public/images/' . $vantagem->imagem);

        // Upload the new image
        $imageName = time().'.'.$request->imagem->extension();  
        $request->imagem->storeAs('images', $imageName, 'public');
        $vantagem->imagem = $imageName;
    }

    $vantagem->fill($request->all());
    $vantagem->save();

    return redirect()->route('vantagens.empresas');
}

public function destroy($id)
{
    $vantagem = Vantagem::find($id);

    // Delete the image from the storage
    Storage::delete('public/images/' . $vantagem->imagem);

    $vantagem->delete();

    return redirect()->route('vantagens.empresas');
}
}
