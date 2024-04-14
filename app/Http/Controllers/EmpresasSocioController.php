<?php

namespace App\Http\Controllers;

use App\Models\empresas_socio;
use Illuminate\Http\Request;

class EmpresasSocioController extends Controller
{
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_empresa= $request->id_empresa;
        $id_socio= $request->id_socio;

        $empresas_socio= empresas_socio::create(
            ['id_empresa'=>$id_empresa,
            'id_socio'=>$id_socio,]
        );
        return redirect()->back()->with('success', 'Inclusão realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresas_socio  $empresas_socio
     * @return \Illuminate\Http\Response
     */
    public function show(empresas_socio $empresas_socio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresas_socio  $empresas_socio
     * @return \Illuminate\Http\Response
     */
    public function edit(empresas_socio $empresas_socio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresas_socio  $empresas_socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empresas_socio $empresas_socio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresas_socio  $empresas_socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(empresas_socio $empresas_socio)
    {
        //
    }
}
