<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSeguimientoController extends Controller
{
    /**
     * Muestra un listado de usuarios con enlaces para enviar correo.
     * @return type
     */
    public function listaUsuarios()
    {
        $usuarios = User::all();
        return view('seguimiento.lista-usuarios-correo', compact('usuarios'));
    }

    /**
     * Envía correo a usuario con documentos recibidos por dicho usuario.
     * @param User $user 
     * @return type
     */
    public function enviaCorreo(User $user)
    {
        Mail::to($user->email)->send(new Seguimiento($user->id));
        return redirect()->back()->with(['mensaje' => 'Correo Enviado']);
    }
}
