@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE PERSONAL PLAZAS: </h1>
<hr>
<ul>
    <li><strong>ID:</strong> {{ $personalplaza->id }}</li>
    <li><strong>Tipo de Nombramiento:</strong> {{ $personalplaza->tipoNombramiento }}</li>
    <li><strong>Nombres:</strong> {{ $personalplaza->personal->RFC }}</li>
    <li><strong>Apellido Paterno:</strong> {{ $personalplaza->plazas->nombrePlaza }}</li>

    <li><strong>Creado en:</strong> {{ $personalplaza->created_at }}</li>
    <li><strong>Actualizado en:</strong> {{ $personalplaza->updated_at }}</li>
</ul>
<hr>

@endsection
