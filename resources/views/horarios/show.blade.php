@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE LOS HORARIOS: </h1>
<hr>
<ul>
    <li>{{ $horario->id }}</li>
    <li>{{ $horario->fecha }}</li>
    <li>{{ $horario->periodos->periodo }}</li>
    <li>{{ $horario->personal->RFC }}</li>
    <li>{{ $horario->created_at }}</li>
    <li>{{ $horario->updated_at }}</li>
</ul>
<hr>

@endsection