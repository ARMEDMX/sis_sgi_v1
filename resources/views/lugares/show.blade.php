@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DEL LUGAR: </h1>
<hr>
<ul>
    <li>{{ $Lugares->id }}</li>
    <li>{{ $Lugares->nombreLugar }}</li>
    <li>{{ $Lugares->descripcion }}</li>
    <li>{{ $Lugares->edificio }}</li>
    <li>{{ $Lugares->created_at }}</li>
    <li>{{ $Lugares->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection