@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Listado de Funcionarios</h3>
          </div>
          <div class="card-body">

            <form action="{{ route('funcionarios.index') }}" method="POST">
                @csrf
                <lable for="filtro_nombre">Buscar Funcionario:</lable>
                <input type="text" name="filtro_nombre">
                <input type="submit" value="Filtrar">
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre y Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->nombre_cargo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $funcionarios->links() }}

          </div>
        </div>
    </div>
</div>

@endsection
