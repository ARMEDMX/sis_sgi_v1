@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL PUESTO: </h1>
<hr>
<ul>
    <li>{{ $puesto->id }}</li>
    <li>{{ $puesto->nombre }}</li>
    <li>{{ $puesto->tipo }}</li>
    <li>{{ $puesto->created_at }}</li>
    <li>{{ $puesto->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection