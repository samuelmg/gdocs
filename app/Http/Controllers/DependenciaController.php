<?php

namespace App\Http\Controllers;

use App\Dependencia;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencia::all();
        return view('dependencias.dependenciasIndex', compact('dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependencias.dependenciaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dependencia' => 'required|max:255',
            'clave' => 'required|min:3|max:10',
        ]);

        $dep = new Dependencia();
        $dep->dependencia = $request->input('dependencia');
        $dep->clave = $request->clave;
        $dep->save();

        return redirect()->route('dependencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    //
    public function show(Dependencia $dependencia)
    {
        return view('dependencias.dependenciaShow', compact('dependencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependencia $dependencia)
    {
        return view('dependencias.dependenciaForm', compact('dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependencia $dependencia)
    {
        $request->validate([
            'dependencia' => 'required|max:255',
            'clave' => 'required|min:3|max:10',
        ]);
        
        $dependencia->dependencia = $request->input('dependencia');
        $dependencia->clave = $request->clave;
        $dependencia->save();
        
        return redirect()->route('dependencias.show', $dependencia->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependencia  $dependencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependencia $dependencia)
    {
        $dependencia->delete();
        return redirect()->route('dependencias.index');
    }
}
