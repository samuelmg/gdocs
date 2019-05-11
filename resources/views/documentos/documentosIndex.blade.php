@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Documentos</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Envia</th>
                        <th>No. Oficio</th>
                        <th>Fecha Oficio</th>
                        <th>Fecha Recibido</th>
                        <th>Usuario Recibe</th>
                        <th>Funcionarios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $doc)
                        <tr>
                            <td>
                                <a href="{{ route('documentos.show', $doc->id) }}" class="btn btn-sm btn-info">
                                    {{ $doc->id }}
                                </a>
                            </td>
                            <td>{{ $doc->envia }}</td>
                            <td>{{ $doc->no_oficio }}</td>
                            <td>{{ $doc->fecha_oficio->format('d/m/Y') }}</td>
                            <td>{{ $doc->recibido }}</td>
                            <td>{{ $doc->user->name }} ({{ $doc->user->email }})</td>
                            <td>
                                <ul>
                                    @foreach($doc->funcionarios as $funcionario)
                                        <li>{{ $funcionario->nombre }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{-- Aplca DocumentoPolicy@update --}}
                                @can('update', $doc)
                                <a href="{{ route('documentos.edit', $doc->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                @endcan
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
