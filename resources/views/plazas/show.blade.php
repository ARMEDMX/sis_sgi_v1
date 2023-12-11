@extends('plantillas.plantilla1')

@section('contenido1')
    
<h1 class="display-5">DATOS DE PLAZA: </h1>
<hr>
<ul>
    <li>{{ $plaza->id }}</li>
    <li>{{ $plaza->nombrePlaza }}</li>
    <li>{{ $plaza->created_at }}</li>
    <li>{{ $plaza->updated_at }}</li>
</ul>
<hr>
{{-- <a name="" id="" class="btn btn-danger" href="{{ route('alumnos.destroy', ['alumno'=>$alumno->id]) }}" role="button">Eliminar Alumno</a> --}}

@endsection