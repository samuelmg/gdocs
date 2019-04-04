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
                            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                            </form>
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

@endsection
