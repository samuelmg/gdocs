@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR DEPENDENCIA
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Dependencia</h3>
          </div>
          <div class="card-body">

            <form action="{{ route('dependencias.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                  <label class="form-label">Dependencia</label>
                  <input type="text" class="form-control" name="dependencia" placeholder="Nombre de la dependencia">
                </div>

                <div class="form-group">
                  <label class="form-label">Clave</label>
                  <input type="text" class="form-control" name="clave" placeholder="Clave de la dependencia">
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection