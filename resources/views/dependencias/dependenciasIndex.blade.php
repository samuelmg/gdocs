@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        LISTADO DE DEPENDENCIAS
    </div>
</div>

<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Dependencias</h3>
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
                    @foreach($dependencias as $dep)
                        <tr>
                            <td>{{ $dep->id }}</td>
                            <td>{{ $dep->dependencia }}</td>
                            <td>{{ $dep->clave }}</td>
                            <td>
                                <a href="{{ route('dependencias.show', $dep->id) }}">Detalle</a>
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
