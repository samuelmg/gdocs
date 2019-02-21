@extends('layouts.app')

@section('content')
    <h1>Bienvenida</h1>
    <p>
        Hola {{ $nombre }} {{ $apellido }}
        <br>
        Nombre Completo: {{ $nombre_completo }}
    </p>
@endsection
