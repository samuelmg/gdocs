{!! Form::open(['route' => 'archivo.store', 'files' => true, 'id' => 'form-archivo-upload']) !!}
<div class="form-group"> 
    <label for="archivos" class="col-form-label">Seleccione los archivos a cargar:</label>
    {!! Form::file('archivos[]', ['multiple' => true], ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}

@if (isset($modelo_id) && isset($modelo_type))
    {!! Form::hidden('modelo_id', $modelo_id) !!}
    {!! Form::hidden('modelo_type', $modelo_type) !!}
@endif

{!! Form::close() !!}
