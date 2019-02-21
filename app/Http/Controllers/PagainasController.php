<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagainasController extends Controller
{
    public function info()
    {
        return view('paginas.informacion');
    }

    public function contacto()
    {
        return view('paginas.contacto');
    }

    public function bienvenida($nombre, $apellido = null)
    {
        return view('paginas.bienvenida', compact('nombre', 'apellido'))
          ->with([
            'nombre_completo' => $nombre . ' ' . $apellido
          ]);
    }
}
