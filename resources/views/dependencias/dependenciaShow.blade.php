@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detalle de Dependencia</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dependencia</th>
                        <th>Clave</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $dependencia->id }}</td>
                        <td>{{ $dependencia->dependencia }}</td>
                        <td>{{ $dependencia->clave }}</td>
                        <td>
                            <a href="{{ route('dependencias.edit', $dependencia->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('dependencias.destroy', $dependencia->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>

@endsection
