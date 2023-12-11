@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE LOS PERIODOS: </h1>
<hr>
<ul>
    <li>{{ $periodo->id }}</li>
    <li>{{ $periodo->periodo }}</li>
    <li>{{ $periodo->descCorta }}</li>
    <li>{{ $periodo->fechaIni }}</li>
    <li>{{ $periodo->fechaFin }}</li>
    <li>{{ $periodo->created_at }}</li>
    <li>{{ $periodo->updated_at }}</li>
</ul>
<hr>

@endsection