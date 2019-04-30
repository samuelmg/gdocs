@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Info de Documento</h3>
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $documento->id }}</td>
                        <td>{{ $documento->envia }}</td>
                        <td>{{ $documento->no_oficio }}</td>
                        <td>{{ $documento->fecha_oficio }}</td>
                        <td>{{ $documento->recibido }}</td>
                        <td>{{ $documento->user->name }} ({{ $documento->user->email }})</td>
                        <td>
                            {{-- Aplica gate editar-documento --}}
                            @can('editar-documento', $documento)
                            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                            @endcan

                            {{-- Aplica DocumentoPolicy@delete --}}
                            @can('delete', $documento)
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                </tbody>
            </table>

            <p>
                <ul>
                    Funcionarios:
                    <table class="table">
                        @foreach($documento->funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->nombre }}</td>
                            <td>
                                <form action="{{ route('documentos.eliminaFuncionario', $documento->id) }}" method="POST">
                                    <input type="hidden" name="funcionario_id" value="{{ $funcionario->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </ul>
            </p>

          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Carga de Archivos</h3>
            </div>
            <div class="card-body">
                @include('archivos.archivoUpload', ['modelo_id' => $documento->id, 'modelo_type' => 'Documento'])
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Archivos</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach($documento->archivos as $archivo)
                        <tr>
                            <td>
                                <a href="{{ route('archivo.show', $archivo->id) }}">{{ $archivo->nombre }}</a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['archivo.destroy', $archivo->id], 'method' => 'delete']) !!}
                                    <input type="hidden" name="accion" value="borrar">
                                    <button class="btn btn-sm btn-danger form-pill borrar-archivo" type="submit" id="archivo_{{ $archivo->id }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Borrar
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
