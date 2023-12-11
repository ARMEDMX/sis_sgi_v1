@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE CARRERAS: </h1>
<hr>
<ul>
    <li>ID: {{ $carrera->id }}</li>
    <li>Nombre: {{ $carrera->nombre }}</li>
    <li>Nombre Corto: {{ $carrera->nombrecorto }}</li>
    <li>Departamento: {{ $carrera->depto->nombre }}</li>
    <li>{{ $carrera->created_at }}</li>
    <li>{{ $carrera->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection