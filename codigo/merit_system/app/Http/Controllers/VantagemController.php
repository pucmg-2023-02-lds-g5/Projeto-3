<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vantagem;
use App\Models\Empresa;

class VantagemController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'descricao' => 'required',
            'custo_em_moedas' => 'required|integer',
            'imagem' => 'required|image',
        ]);

        // Criação da vantagem
        $vantagem = new Vantagem;
        $vantagem->descricao = $request->descricao;
        $vantagem->custo_em_moedas = $request->custo_em_moedas;
        
        // Armazenamento da imagem e obtenção do caminho
        $path = $request->file('imagem')->store('imagens');
        $vantagem->imagem = $path;

        // Associação da vantagem à empresa logada
        $vantagem->empresa()->associate(Auth::guard('empresa')->user());

        $vantagem->save();

        return redirect()->route('empresa.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
