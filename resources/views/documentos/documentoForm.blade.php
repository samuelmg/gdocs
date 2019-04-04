@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Documento</h3>
          </div>
          <div class="card-body">

            @if(isset($documento))
                <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @else
                <form action="{{ route('documentos.store') }}" method="POST">
            @endif
                @csrf

                <div class="form-group">
                  <label class="form-label">Usuario que Recibe:</label>
                  <select name="user_id" class="form-control">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ isset($documento) && $documento->user_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Envía:</label>
                  <input type="text" class="form-control" name="envia" value="{{ isset($documento) ? $documento->envia : '' }}{{ old('envia') }}" placeholder="Nombre de persona que envía">
                </div>

                <div class="form-group">
                  <label class="form-label">No. de Oficio:</label>
                  <input type="text" class="form-control" name="no_oficio" value="{{ isset($documento) ? $documento->no_oficio : '' }}{{ old('no_oficio') }}" placeholder="Número de Oficio">
                </div>

                <div class="form-group">
                  <label class="form-label">Fecha del Oficio:</label>
                  <input type="date" class="form-control" name="fecha_oficio" value="{{ isset($documento) ? $documento->fecha_oficio : '' }}{{ old('fecha_oficio') }}">
                </div>

                <div class="form-group">
                  <label class="form-label">Funcionarios a Notificar</label>
                  <select name="funcionarios_id[]" class="form-control" multiple>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ isset($documento) && array_search($funcionario->id, $documento->funcionarios->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $funcionario->nombre }} - {{ $funcionario->cargo }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection