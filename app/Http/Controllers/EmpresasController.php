<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Socios;
use App\Models\empresas_socio;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas= Empresas::all();
        return view('empresa.empresa',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome= $request->nome;
        $razao_social= $request->razao_social;
        $cnpj=$request->cnpj;
        $telefone=$request->telefone;

        $empresa= Empresas::create([
            'nome'=> $nome,
            'razao_social'=> $razao_social,
            'cnpj'=>$cnpj,
            'telefone'=>$telefone,
        ]);
        $id_empresa = $empresa->id;
        return redirect()->route('editar_empresa', ['id' => $id_empresa]);
    }
    
  


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $empresa = Empresas::findOrFail($id);    
    $empresa_socios = empresas_socio::where('id_empresa', $id)->get();
    $socios= Socios::all();
    
    return view('empresa.editar_empresa', compact('empresa','socios','empresa_socios'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas)
    {
        $id= $request->id;
        
        $empresa= Empresas::findOrFail($id); 
        $nome= $request->nome;
        $razao_social= $request->razao_social;
        $cnpj=$request->cnpj;
        $telefone=$request->telefone;

        $empresa->nome= $nome;
        $empresa->razao_social= $razao_social;
        $empresa->cnpj=$cnpj;
        $empresa->telefone=$telefone;

        $empresa->save();
        return redirect()->back()->with('success','Dados Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas $id)
    {
        $empresa= Empresas::findOrFail($id->id);
        $empresa->delete();
        return redirect()->back()->with('success','Unidade deletado com sucesso');   
    }
}
