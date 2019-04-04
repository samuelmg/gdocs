<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Funcionario;
use App\User;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::all();

        //Realiza una consulta de los documentos del usuario logeado
        //$documentos = \Auth::user()->documentos;
        
        return view('documentos.documentosIndex', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $funcionarios = Funcionario::all();
        return view('documentos.documentoForm', compact('usuarios', 'funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Agrega el campo 'recibido' al $request
        $request->merge([
            'recibido' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        //Guarda todos los campos del formualrio (que están en $request)
        //Documento::create($request->all());

        /*
         * Guarda $request en documentos, excepto 'funcionarios_id' 
         * que no es parte de la tabla 'documentos' pero la enviamos en el formulario
         * para realizar la relación muchos a muchos entre Documento y Funcionario.
         * Una vez creado el Documento, lo asigna a $doc
         */
        $documento = Documento::create($request->except('funcionarios_id'));

        /*
         * Crea la relación entre el documento y los funcionarios
         * Desde la instancia de $documento, se llama al métod funcionarios (del Modelo Documento)
         * para crear la realción con el método attach() que recibe uno o muchos IDs de los funcionarios.
         */
        $documento->funcionarios()->attach($request->funcionarios_id);

        /*
         * Crea un nuevo documento utilizando todo el contenido de $request y lo asocia con un usuario
         */
        // $documento = new Documento($request->all()); //Crea un nuevo documento en memoria
        // $user = User::find($request->user_id); //Crea una instancia del usuario
        // $user->documentos()->save($documento); //Guarda el documento ($documento) asociandolo con el usuario

        /*
         * Crea un nuevo documento en memoria asignando los valores de cada columna
         */
        // $documento = new Documento([
        //     'envia' => $request->envia,
        //     'no_oficio' => $request->no_oficio,
        //     'fecha_oficio' => $request->fecha_oficio,
        //     'recibido' => \Carbon\Carbon::now()->toDateTimeString()
        // ]);

    
        /*
         * Crea un nuevo documento creando una nueva instancia de Documento
         * y asignando cada propiedad. Guarda a la base de datos utilizando el método save()
         */
        // $documento = new Documento;
        // $documento->user_id = $request->user_id;
        // $documento->envia = $request->envia;
        // $documento->no_oficio = $request->no_oficio;
        // $documento->fecha_oficio = $request->fecha_oficio;
        // $documento->recibido = \Carbon\Carbon::now()->toDateTimeString();          
        // $documento->save();

        //Redirecciona hacia ruta doumentos.index
        return redirect()->route('documentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return view('documentos.documentoShow', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        $usuarios = User::all();
        $funcionarios = Funcionario::all();

        return view('documentos.documentoForm', compact('documento', 'usuarios', 'funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //Actualiza el documento
        $documento->update($request->except('funcionarios_id'));

        //Sincroniza los funcionarios relacionados con el documento
        $documento->funcionarios()->sync($request->funcionarios_id);

        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        /*
         * Elimina la relación entre documento y funcionarios.
         * No se requiere si se agregó un FK constraint con onDelete('cascade')
         */
        $documento->funcionarios()->detach();
        $documento->delete();

        return redirect()->route('documentos.index')
            ->with([
                'mensaje' => 'Documento eliminado',
                'alert-class' => 'alert-warning',
            ]);
    }

    /**
     * Elimina la relación de un funcionario con el documento
     * @param Request $request 
     * @param Documento $documento 
     * @return \Illuminate\Http\Response
     */
    public function eliminaFuncionario(Request $request, Documento $documento)
    {
        $documento->funcionarios()->detach($request->funcionario_id);
        return redirect()->route('documentos.show', $documento->id);
    }
}
