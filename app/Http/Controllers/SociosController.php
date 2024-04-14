<?php

namespace App\Http\Controllers;

use App\Models\Socios;
use App\Models\Empresas;
use App\Models\empresas_socio;
use Illuminate\Http\Request;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            $socios= Socios::all();
            return view('socio.socio',compact('socios'));
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
        $nome= $request->nome;
        $email=$request->email;
        $telefone=$request->telefone;

        $socio= Socios::create([
            'nome'=> $nome,
            'email'=> $email,
            'telefone'=>$telefone,
        ]);
        $id_socio = $socio->id;
        return redirect()->route('editar_socio', ['id' => $id_socio]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Socios  $socios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socio = Socios::findOrFail($id);    
        $empresa_socios = empresas_socio::where('id_socio', $id)->get();
        $empresas= Empresas::all();
        
        // Carregue a view de edição e passe a socio para ela
        return view('socio.editar_socio', compact('socio','empresas','empresa_socios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socios  $socios
     * @return \Illuminate\Http\Response
     */
    public function edit(Socios $socios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socios  $socios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socios $socios)
    {
        $id= $request->id;
        
        $socio= Socios::findOrFail($id); 
        $nome= $request->nome;
        $email=$request->email;
        $telefone=$request->telefone;

        $socio->nome= $nome;
        $socio->email=$email;
        $socio->telefone=$telefone;

        $socio->save();
        return redirect()->back()->with('success','Dados Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socios  $socios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socios $id)
    {
        $socios= Socios::findOrFail($id->id);
        $socios->delete();
        return redirect()->back()->with('success','Unidade deletado com sucesso');   
    }
}
