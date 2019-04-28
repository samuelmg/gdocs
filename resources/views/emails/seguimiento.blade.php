<h3>Documentos Recibidos para Seguimiento</h3>
@if($documentos->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Envia</th>
                <th>No. Oficio</th>
                <th>Fecha Oficio</th>
                <th>Fecha Recibido</th>
                <th>Funcionarios</th>
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
                    <td>{{ $doc->fecha_oficio }}</td>
                    <td>{{ $doc->recibido }}</td>
                    <td>
                        <ul>
                            @foreach($doc->funcionarios as $funcionario)
                                <li>{{ $funcionario->nombre }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <span class="alert alert-warning">No hay documentos para seguimiento</span>
@endif