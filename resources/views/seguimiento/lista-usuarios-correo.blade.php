@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Usuarios para Enviar Correo de Seguimiento</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Enviar Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{-- Enlace hacia ruta que envia correo electrónico a usuario --}}
                                <a href="{{ action('MailSeguimientoController@enviaCorreo', $user->id) }}" class="btn btn-sm btn-success">
                                    Enviar Correo
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>

@endsection
